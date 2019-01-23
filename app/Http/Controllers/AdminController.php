<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Ad as Ad;
use App\User as User;
use App\Report as Report;
use Mail as Mail;
use App\Company as Company;
use App\Application as Application;
use App\Conversation as Conversation;
use Illuminate\Support\Facades\Hash as Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use App\Language;
use App\Category;
use App\HostCompany;

class AdminController extends Controller {

    public function getAdminLogin()
    {
        return view('admin.login');
    }

    public function postAdminLogin()
    {
        $email = Input::get('email');
        $password = Input::get('password');
        $user = User::where('email', $email)->first();

        if ($user->is_admin === 1) {
            if ($user &&  Hash::check(Input::get('password'), $user->password)) {
                Session::put('user', $user);
                return redirect()->route('getAdminPanel');
            }
            return redirect()->back()->withErrors(['error', 'Wrong email or password!']);
        }
        return redirect()->back()->withErrors(['error', 'You are not an admin!']);
    }

    public function getAdminPanel()
    {

        return view('admin.panel');
    }

    public function getAdminAds()
    {
        $ads = Ad::with('company.image')->simplePaginate(10);
        return view('admin.allAds', ['ads' => $ads]);
    }

    public function getAdminCompanies()
    {
        $companies = Company::with('image')->simplePaginate(10);
        // return $companies;
        return view('admin.allCompanies', ['companies' => $companies]);
    }

    public function getAdminUsers()
    {
        $users = User::paginate(10);
        return view('admin.allUsers', ['users' => $users]);
    }

    public function getReports()
    {
        $reports = Report::with('ad')->with('user')->whereNull('company_id')->get();
        //return $reports;
        return view('admin.reports', ['reports' => $reports]);
    }

    public function getReportsCompanies()
    {
        $reports = Report::with('company')->with('user')->whereNull('ad_id')->get();
        //return $reports;
        return view('admin.companyReports', ['reports' => $reports]);
    }

    public function reportAd($aid,$uid)
    {
        $report = new Report;
        $report->text = Input::get('text');
        $report->ad_id = $aid;
        $report->user_id = $uid;
        $report->save();
        return redirect()->back();
    }

    public function reportCompany($cid,$uid){

        $report = new Report;
        $report->text = Input::get('text');
        $report->company_id = $cid;
        $report->user_id = $uid;
        $report->save();
        return redirect()->back();

    }

    public function adminEditAd($aid)
    {
        $ad = Ad::where('id', $aid)->with('company.image')->with('categories')->first();
        return view('admin.editAd',['ad' => $ad]);
    }

    public function postAdminEditAd(Request $request)
    {   
        $categories = Input::get('categories');

        $ad=Ad::where('id', $request->aid)->with('company.image')->with('categories')->first();
        $ad->position=$request->position;
        $ad->description=$request->description;
        $ad->job_type=$request->job_type;
        $ad->career_level=$request->career_level;
        if(!empty($request->students)){
            $ad->students=$request->students;
        }else{
            $ad->students=0;
        }
        if(!empty($request->low_experience)){
            $ad->low_experience=$request->low_experience;
        }else{
            $ad->low_experience=0;
        }
        $ad->country=$request->country;
        $ad->city=$request->city;
        $ad->salary_type=$request->salary_type;
        $ad->salary_from=$request->salary_from;
        $ad->salary_to=$request->salary_to;
        $ad->currency=$request->currency;
        // languages?
        $ad->external_url=$request->external_url;


        //fale kategorije
        if($categories)
        foreach ($categories as $category) {
        \DB::table('ad_categories')->insert([
            'ad_id'        => $ad->id,
            'category_id'  => $category
        ]);
        }

        $ad->save();

        return redirect()->route('getSpecificJob', ['aid' => $ad->id]);
    }

    public function deleteAd($aid, Request $request)
    {
        // return 123;
        $ad = Ad::where('id', $aid)->first();
        $ad->delete();
        if(!$request->ajax()){
            return redirect()->route('getAdminAds');
        }
        return 1;
    }

    public function updateAdStatus($aid)
    {
        $status = Input::get('status');
        $ad = Ad::where('id', $aid)->first();
        $ad->approved = $status;
        $ad->save();
        return 1;  
    }

    public function updateCompanyStatus($cid,$stat)
    {
        $status = $stat;
        $company = Company::findOrFail($cid);
        $company->blocked = $status;
        $company->save();
        return redirect()->back();  
    }

    public function updateUserStatus($uid){

        $status = Input::get('status');
        $user = User::where('id',$uid)->first();
        $user->active = $status;
        $user->save();
        return 1;

    }

    public function getEditCompanyAdmin($cid)
    {
        $company = Company::find($cid);
        //return $company;
        $businessCard = $company->businessCard;
        return view('company.edit', ['company' => $company , 'businesscard' => $businessCard , 'cid' => $cid ]);
    }

    public function postEditCompanyAdmin(Request $request)
    {
        // $categories = Company::where('id', Auth::user()->id)->pluck('sector');
        // return array_map('intval', explode(',', $categories[0]));
        
        $strSectors = $request->categoriesArray;
        $sectors = [];
        $sectors = explode(',',$strSectors);
        
        $company=Company::find($request->cid);
        $businessCard = $company->businessCard;

        $company->country = $request->country;
        $company->company_name  = $request->company_name;
        $company->company_website = $request->company_website;
        $company->company_address = $request->company_address;
        $company->company_phone = $request->company_phone;
        $company->about_us = $request->about_us;
        $company->career = $request->career;
        $businessCard->number_of_employees = $request->number_of_employees;

        //implode da se regulise
        //$company->sector = serialize($request->sectors);
        if(isset($request->categoriesArray))
        $company->sector = implode(',', $sectors);
        else $company->sector=0;

        $company->save();
        $businessCard->save();


        return redirect()->back();
    }

    public function deleteCompany($cid,Request $request)
    {
        $company = Company::where('id', $cid)->first();
        $company->delete();
        if(!$request->ajax()){
            return redirect()->route('getAdminCompanies');
        }
        return 1;
    }

    public function getAdminLanguages(){

        $languages = Language::paginate(10);

        return view('admin.allLanguages',compact('languages'));

    }

    public function adminDeleteLanguage($id){

        $language = Language::findOrFail($id);

        $language->delete();

        return redirect()->back();

    }

    public function adminAddLanguage(Request $request){

        if(!empty($request->language)){

            Language::create(['language' => $request->language]);

            return redirect()->back();

        }else{

            return back()->withErrors(['message' => 'You must give a name to language']);

        }

    }

    public function getAdminCategories(){

        $categories = Category::paginate(10);

        return view('admin.allCategories',compact('categories'));

    }

    public function adminDeleteCategory($id){

        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()->back();

    }

    public function adminAddCategory(Request $request){

        if(!empty($request->category)){

            Category::create(['name' => $request->category]);

            return redirect()->back();

        }else{

            return back()->withErrors(['message' => 'You must give a name to category']);

        }

    }

    public function adminEditUser($uid){

        $user = User::findOrFail($uid);

        return $user;

    }

    public function adminDeleteUser($uid){

        $user = User::findOrFail($uid);

        $user->delete();

        return redirect()->back();

    }

    public function adminActivateCompany($cid){

        $company = Company::findOrFail($cid);
        $company->active = 1;
        $company->save();
        return redirect()->back();

    }

    public function adminDeactivateCompany($cid){

        $company = Company::findOrFail($cid);
        $company->active = 0;
        $company->save();
        return redirect()->back();

    }

    public function getAdminInfo(){

        $info = HostCompany::all()->first();

        return view('admin.info',['info' => $info]);

    }

    public function updateAdminInfo(Request $request){

        $info = HostCompany::all()->first();

        $info->update($request->all());

    }

}