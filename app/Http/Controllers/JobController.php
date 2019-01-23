<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Ad as Ad;
use App\User as User;
use Mail as Mail;
use App\Company as Company;
use App\Application as Application;
use App\Conversation as Conversation;
use App\Message as Message;
use App\Favorite as Favorite;
use App\File as File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use App\Mail\NewAd;
use App\Language;
use App\CoverLetter;
use App\Cv;
use Share;

class JobController extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function getJobs()
    {   
        $ads = Ad::orderBy('ad_type','desc')->orderBy('reinforcement_date','desc')->orderBy('promotion_date','desc')->orderBy('salary_to','desc')->orderBy('created_at','desc')->where('approved',1)->simplePaginate(10);
        return view('ad.allAds', ['ads' => $ads]);
        //Ad::with('company.image')->where('approved', 1)->simplePaginate(10)
    }

    public function getUserFavorites()
    {
        $ads = Ad::with('company.image')->whereHas('favorites', function ($query){
            $query->where('user_id', Session::get('user')->id);
        })->simplePaginate(10);
        return view('user.favorites', ['ads' => $ads]);

    }

    public function getJob($jid)
    {  
        $ad = Ad::where('id', $jid)->with('company.image')->with('categories')->with('applications')->first();
        $ad->page_visits = $ad->page_visits + 1;
        $ad->save();
        $jobs = [];
        foreach($ad->categories as $category)
        {
            $jobs = $category->ads;
        }
        $similarJobs = [];
        $counter = 0;
        foreach($jobs as $job)
        {
            if($job->approved == 1)
            {
                if($counter < 5)
                {
                    $similarJobs[] = $job;
                    $counter++;
                }
            }
        }
        $similarJobs = collect($similarJobs);
        $share = Share::currentPage('Find your dream job!')
        ->facebook()
        ->twitter()
        ->googlePlus()
        ->linkedin();

        return view('ad.ad', ['ad' => $ad,'similarJobs' => $similarJobs,'share' => $share]);
    }

    public function getAllJobs()
    {
        $ads = Ad::where('company_id', Auth::user()->id)->with('company.image')->orderBy('created_at','desc')->simplePaginate(10);
        return view('company.myAds', ['ads' => $ads]);
    }

    public function getApplicants($aid)
    {
        // return '123';
        $ad = Ad::with('applications.user')->where('id', $aid)->get();
        return view('snippets.applicants', ['applicants' => $ad[0]->applications]);
    }

    public function getJobsByCategory($catid)
    {  
        $ads = Ad::with('company.image')->whereHas('categories', function ($query) use ($catid){
            $query->where('category_id', $catid);
        })->where('approved', 1)->simplePaginate(10);
        return view('user.favorites', ['ads' => $ads]);
    }

    public function getNewJob()
    {
        return view('company.new-job-add');
    }

    public function getNewJobStandard()
    {  
        return view('company.new-job-standard');
    }

    public function getNewJobCustom()
    {  
        $company = Auth::user();
        if($company->balance >= 2500){
            return view('company.new-job-custom');
        }else{
            return redirect()->back()->withErrors(['message' => "You don't have enough credit for this ad type"]);
        }
    }

    public function getNewJobVIP()
    {  
        $company = Auth::user();
        if($company->balance >= 10000){
            return view('company.new-job-vip');
        }else{
            return redirect()->back()->withErrors(['message' => "You don't have enough credit for this ad type"]);
        }
    }

    public function getNewJobPremium()
    {  
        $company = Auth::user();
        if($company->balance >= 10000){
            return view('company.new-job-premium');
        }else{
            return redirect()->back()->withErrors(['message' => "You don't have enough credit for this ad type"]);
        }
    }

    public function postNewJob(Request $request)
    {   
        $this->validate($request,[
            'description' => 'required',
            'ad_type' => 'required',
            'job_type' => 'required',
            'country' => 'required',
            'city' => 'required',
            'currency' => 'required',
            'position' => 'required',
        ]);
        $company = Company::findOrFail(Auth::user()->id);
        switch(Input::get('ad_type')){
            case '1':
                if(Input::get('external_url') !== null){
                    if($company->balance < 2500){
                        return redirect()->back()->withErrors(['message' => "You don't have enough credit to pay external link"]);
                    }else{
                        $company->balance -= 2500;
                        $company->save();
                        break;
                    }
                }
                break;
            case '2':
                if(Input::get('salary_from') !== null && Input::get('salary_to') !== null){
                    $amount = 2500;
                    $discount = ($amount*20)/100;
                    $amount -= $discount;
                    $company->balance -= $amount;
                    $company->save();
                    if(Input::get('external_url') !== null){
                        if($company->balance < 2500){
                            $company->balance += $amount;
                            return redirect()->back()->withErrors(['message' => "You don't have enough credit to pay external link"]);
                        }else{
                            $company->balance -= 2500;
                            $company->save();
                            break;
                        }
                    }
                    break;
                }else{
                    $company->balance -= 2500;
                    $company->save();
                    if(Input::get('external_url') !== null){
                        if($company->balance < 2500){
                            $company->balance += $amount;
                            return redirect()->back()->withErrors(['message' => "You don't have enough credit to pay external link"]);
                        }else{
                            $company->balance -= 2500;
                            $company->save();
                            break;
                        }
                    }
                    break;
                }
            case '3':
            if(Input::get('salary_from') !== null && Input::get('salary_to') !== null){
                $amount = 10000;
                $discount = ($amount*20)/100;
                $amount -= $discount;
                $company->balance -= $amount;
                $company->save();
                break;
            }else{
                $company->balance -= 10000;
                $company->save();
                break;
            }
            case '4':
            if(Input::get('salary_from') !== null && Input::get('salary_to') !== null){
                $amount = 20000;
                $discount = ($amount*20)/100;
                $amount -= $discount;
                $company->balance -= $amount;
                $company->save();
                break;
            }else{
                $company->balance -= 20000;
                $company->save();
                break;
            }
        }
        if(!empty(Input::get('confidential'))){
            $confidential = 1;
        }else{
            $confidential = 0;
        }
       
        if(!empty(Input::get('students'))){
            $students = Input::get('students');
        }else{
            $students = 0;
        }
        if(!empty(Input::get('low_experience'))){
            $low_experience = Input::get('low_experience');
        }else{
            $low_experience = 0;
        }
        
        $expiration_date = Carbon::now();
        $expiration_date = $expiration_date->addWeeks(4);
        $ad = Ad::create([
            'description' => Input::get('description'),
            'ad_type' => Input::get('ad_type'),
            'ref_number' => Input::get('ref_number'),
            'job_type' => Input::get('job_type'),
            'term' => Input::get('term'),
            'company_id' => Auth::user()->id,
            'career_level' => Input::get('career_level'),
            'students' => $students,
            'low_experience' =>  $low_experience,
            'country' => Input::get('country'),
            'city' => Input::get('city'),
            'salary_type' => Input::get('salary_type'),
            'salary_from' => Input::get('salary_from'),
            'salary_to' => Input::get('salary_to'),
            'currency' => Input::get('currency'),
            'external_url' => Input::get('external_url'),
            'position' => Input::get('position'),
            'approved' => 0,
            'expiration_date' =>  $expiration_date,
            'confidential' => $confidential
        ]);
        $language_id = Input::get('foreign_languages');
        if($language_id > 0){
            $language = Language::findOrFail($language_id);
            $ad->languages()->save($language);
        }
        if(!empty(Input::get('categories'))){
            if(count(Input::get('categories')) == 1){
                $category = Input::get('categories');
                \DB::table('ad_categories')->insert([
                    'ad_id'        => $ad->id,
                    'category_id'  => $category[0]
                ]);
            }elseif(count(Input::get('categories')) > 1){
                $categories = Input::get('categories');
                foreach ($categories as $category) {
                    \DB::table('ad_categories')->insert([
                        'ad_id'        => $ad->id,
                        'category_id'  => $category
                    ]);
                }
            }
    
        }
        /*$ad = new Ad(Input::all());
        $ad->approved = 0;
        $ad->company_id = Auth::user()->id;
        $ad->save();*/
        /*
        $admins = User::where('is_admin', 1)->get();
        foreach ($admins as $admin) {
            Mail::to($admin->email)->send(new NewAd($ad,'A new ad has been posted for your approval.'));
        }
        */
        return redirect()->route('getHome')->with('success','You successfully created a job.');
        
    }

    public function getJobApplication($jid, $cid,$uid)
    {  
        $cvs = Cv::where('user_id',$uid)->get();
        $coverLetters = CoverLetter::where('user_id',$uid)->get();
        return view('ad.application', ['jid' => $jid, 'cid' => $cid, 'coverLetters' => $coverLetters, 'cvs' => $cvs]);
    }

    public function getApplications()
    {
        $applications = Application::where('company_id', Auth::user()->id)->with('ad')->with('user')->get();
        
        return view('company.applications', ['applications' => $applications]);
    }

    public function postJobApplication(Request $request)
    {  
        //dd($request);
        $this->validate($request,[
            'text' => 'required',
        ]);
        if($request->file_input || $request->cv_id)
        {
            $application = new Application(Input::all());
            $application->save();

            // get current time and append the upload file extension to it,
            // then put that name to $fileName variable.
            if($request->file_input)
            {
                $file = $request->file('file_input');
                $fileName = time().'.'.$file->getClientOriginalExtension();
                $name = $file->getClientOriginalName();
                /*
                     talk the select file_input and move it public directory
                */
                $file->move(public_path('files'), $fileName);
                //$user = Session::get('user');
            }
            $company = Company::findOrFail($request->company_id);
            if($request->text)
            {
            $message = New Message;
            $message->application_id = $application->id;
            $message->text = Input::get('text');
            $message->first_name = Input::get('first_name');
            $message->last_name = Input::get('last_name');
            $message->user_id = Input::get('user_id');
            //$message->company_name = $company->company_name;
            $message->user_read = 1;
            $message->company_read = 0;
            if($request->cv_id){
                $message->cv_file_id = $request->cv_id;
            }
            $message->save();

            $coverLetter = New CoverLetter;
            $coverLetter->text = $request->text;
            $coverLetter->user_id = $request->user_id;
            $coverLetter->ad_id = $request->ad_id;
            $coverLetter->save();
            
        }
        if($request->file_input)
        {
            $file = New File;
            $file->message_id = $message->id;
            $file->application_id = $application->id;
            $file->name = $name;
            $file->path = '/files/' . $fileName;
            $file->save();
        }

            
            return redirect()->route('getJobs')->with('success', 'You successfully applied to the job.');
    }
    else
    {
        return redirect()->back()->withErrors(['CV is required!']);
    }
    }

    public function getConversation($aid)
    {  
        $application = Application::where('id', $aid)->with('messages')->orderBy('created_at')->with('user')->with('company')->first();
        $application->notification = 0;
        $application->update();
        foreach($application->messages as $message){
            $message->company_read = 1;
            $message->save();
        }
        
        return view('ad.conversation', ['conversation' => $application ]);
    }

    public function getToday()
    {  
        $ads =  Ad::with('company.image')->where('approved', '=', '1')->where('created_at', '>=', Carbon::today())->orderBy('ad_type','desc')->orderBy('reinforcement_date','desc')->orderBy('promotion_date','desc')->orderBy('salary_to','desc')->simplePaginate(10);
        return view('ad.allAds', ['ads' => $ads ]);
    }

    public function postSendMessage()
    {
        $message = New Message;
        $message->application_id = Input::get('application_id');
        $message->text = Input::get('text');
        $message->company_name = Input::get('company_name');
        //$message->first_name = Input::get('first_name');
        //$message->last_name = Input::get('last_name');
        $message->user_id = Input::get('user_id');
        $message->user_read = 0;
        $message->company_read = 1;
        $message->save();

        $application = Application::where('id', Input::get('application_id'))->first();
        $application->notification = 1;
        $application->update();
        return redirect()->back();
    }

    // chat 
    public function getRefresh()
    {
        $timestamp = Input::get('timestamp');
        $application_id = Input::get('application_id');
        $result = Message::find($application_id)->where('created_at', '>' , $timestamp)->get();
        return $result->toJson();

    }

        public function updateFav()
    {
        $user = Session::get('user');
        $ad = $_POST['id'];
        $favorite = new Favorite;
        $favorite->user_id = $user->id;
        $favorite->ad_id = $ad;
        $favorite->save();
        return 1;
    }

    public function removeFav()
    {
        $user = Session::get('user');
        $ad = $_POST['id'];
        $favorite = Favorite::where('user_id', $user->id)->where('ad_id',$ad)->delete();
    }

    public function deleteJob($jid){

        $ad = Ad::findOrFail($jid);
        $ad->delete();
        return redirect()->back();

    }

    public function promoteJob($jid){

        $ad = Ad::findOrFail($jid);
        $company = Company::findOrFail($ad->company_id);
        if($company->balance >= 4000){
            $company->balance -= 4000;
            $company->save();
            $ad->promotion_date = Carbon::now();
            $ad->save();
            return redirect()->back();
        }else{
            return redirect()->back()->withErrors(['message' => "You don't have enough credit to promote ad."]);
        }

    }

    public function reinforceJob($jid){

        $ad = Ad::findOrFail($jid);
        $company = Company::findOrFail($ad->company_id);
        if($ad->ad_type == 2){
            if($company->balance >= 1000){
                $company->balance -= 1000;
                $company->save();
                $ad->reinforcement_date = Carbon::now();
                $ad->save();
                return redirect()->back();
            }else{
                return redirect()->back()->withErrors(['message' => "You don't have enough credit to reinforce this ad."]);
            }
        }elseif($ad->ad_type == 3){
            if($company->balance >= 2000){
                $company->balance -= 2000;
                $company->save();
                $ad->reinforcement_date = Carbon::now();
                $ad->save();
                return redirect()->back();
            }else{
                return redirect()->back()->withErrors(['message' => "You don't have enough credit to reinforce this ad."]);
            }
        }elseif($ad->ad_type == 4){
            if($company->balance >= 3000){
                $company->balance -= 3000;
                $company->save();
                $ad->reinforcement_date = Carbon::now();
                $ad->save();
                return redirect()->back();
            }else{
                return redirect()->back()->withErrors(['message' => "You don't have enough credit to reinforce this ad."]);
            }
        }

    }

    public function companyEditAd($jid){

        $ad = Ad::findOrFail($jid);
        return view('company.editAd',compact('ad'));

    }

    public function postCompanyEditAd(Request $request){
        
        $strCategories = Input::get('categoriesArray');
        
        $categories = [];
        $categories = explode(',',$strCategories);
        
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

        foreach($ad->categories as $category){
            \DB::table('ad_categories')
            ->where('ad_id',$ad->id)
            ->where('category_id',$category->id)
            ->delete();
        }

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

    public function makeConfidential($jid){

        $ad = Ad::findOrFail($jid);
        $ad->confidential = 1;
        $ad->save();
        return redirect()->back();

    }

    public function makeUnconfidential($jid){

        $ad = Ad::findOrFail($jid);
        $ad->confidential = 0;
        $ad->save();
        return redirect()->back();

    }


}