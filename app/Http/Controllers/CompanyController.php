<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Company as Company;
use App\Image as Image;
use App\Cover as Cover;
use App\BusinessCard as BusinessCard;
use App\Application as Application;
use App\User;
use App\Invoice;
use App\HostCompany;
use Carbon\Carbon;

use Illuminate\Support\Facades\Hash as Hash;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class CompanyController extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */


    public function getRegister()
    {
        return view('company.register');
    }
    public function getLogin()
    {
        return view('company.login');
    }

    public function authenticate()
    {
        $username = Input::get('username');
        $password = Input::get('password');
        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            // Authentication passed...
            return redirect()->route('getHome');
        } else {
            // Auth failed...
            return redirect()->back()->withErrors(['message' => 'Wrong username or password!']);
        }
    }

    public function getProfile($id)
    {
        $company = Company::find($id);
        $businessCard = $company->businessCard;
        $ads = $company->ads;
        $logo = $company->image;
        $cover = $company->cover;
        return view('company.profile', ['company' => $company, 'ads' => $ads, 'businessCard' => $businessCard, 'logo' => $logo['path'],'cover' => $cover['path'] , 'cid' => $id ]);
    }

    public function postRegister(Request $request)
    {

    $request->validate([
        'company_name'                             => 'required',
        'country'                                  => 'required',
        'foreign_name'                             => 'required',
        'email'                                    => 'required',
        'password'                                 => 'required',
        'username'                                 => 'required',
        'register_type'                            => 'required',
        'pib'                                      => 'required',
        'company_registered_office'                => 'required',
        'company_type'                             => 'required',
        'sector'                                   => 'required',
        //'newsletter'                               => 'required',
        'authorized_person'                        => 'required',
        // 'key'                                      => 'required',
        'company_website'                          => 'required',
        'company_phone'                            => 'required',
        'company_address'                          => 'required',
        'first_name'                               => 'required',
        'last_name'                                => 'required',
        'position'                                 => 'required',
        'business_phone'                           => 'required',
        'business_email'                           => 'required',
    ]);
    if(Company::where('username', '=', Input::get('username'))->count() > 0) {
        return Redirect::back()->withErrors(['error', 'User with this username already exists!']);
    }
    $company = new Company($request->all());
    $company->password = Hash::make(Input::get('password'));
    $company->token = app('App\Http\Controllers\UserController')->RandomString();
    $company->save();
    return redirect()->route('getCompanyRegisterStep2', ['id' => $company->id]);
    }

    public function getRegisterStep2()
    {
        $id = Input::get('id');
        return view('company.step-2', ['id' => $id]);
    }

    public function postRegisterStep2(Request $request)
    {
        $this->validate($request,[
            'company_logo' => 'required'
        ]);
    // get current time and append the upload file extension to it,
    // then put that name to $photoName variable.
    $photoName = time().'.'.$request->company_logo->getClientOriginalExtension();

    /*
        talk the select file and move it public directory and make avatars
        folder if doesn't exsit then give it that unique name.
    */
    $request->company_logo->move(public_path('photos'), $photoName);
    $image = new Image;
    $image->company_id = Input::get('id');
    $image->path = '/photos/' . $photoName;
    $image->save();
    return redirect()->route('getCompanyRegisterStep3', ['id' => Input::get('id')]);

    }

    public function postEditCompany(Request $request)
    {
        // $categories = Company::where('id', Auth::user()->id)->pluck('sector');
        // return array_map('intval', explode(',', $categories[0]));
        
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
        if(isset($request->sectors))
        $company->sector = implode(',', $request->sectors);
        else $company->sector=0;

        $company->save();
        $businessCard->save();


        return redirect()->back();
    }

    public function getRegisterStep3($cid)
    {
        $id = $cid;
        return view('company.step-3',['id' => $id]);
    }

    public function postRegisterStep3(Request $request)
    {
        $bcard = BusinessCard::valid($request);
        return redirect()->route('getCompanyLogin');
    }

    public function getControlPanel()
    {
        $company = Company::find(Auth::user()->id);
        $applications = Application::where('company_id', Auth::user()->id)->with('ad')->with('user')->get();
        return view('company.panel', ['applications' => $applications, 'company' => $company]);
    }

    public function getEditCompany($cid)
    {
        $company = Company::find(Auth::user()->id);
        $businessCard = $company->businessCard;
        return view('company.edit', ['company' => $company , 'businesscard' => $businessCard , 'cid' => $cid]);
    }

    public function updateAboutUs()
    {
        $about_us = Input::get('about_us');
        $company = Company::find(Auth::user()->id);
        $company->about_us = $about_us;
        $company->save();
        return 1;

    }

    public function updateCareer()
    {
        $career = Input::get('career');
        $company = Company::find(Auth::user()->id);
        $company->career = $career;
        $company->save();
        return 1;
    }

    public function editBuisnessCard()
    {
        $businessCard = BusinessCard::find(Auth::company()->id);
        $businessCard->career = $career;
        return $businessCard->save();
    }

    public function updateLogo(Request $request)
    {
        $photoName = time().'.'.$request->company_logo->getClientOriginalExtension();
        $company = Company::find($request->cid);
        $request->company_logo->move(public_path('photos'), $photoName);
        if(!$company->image)
        {
        $image = new Image;
        $image->company_id = $company->id;
        $image->path = '/photos/' . $photoName;
        $image->save();
        }else{
            $image = $company->image;
            $image->company_id = $company->id;
            $oldimage = public_path($company->image->path);
            $image->path = '/photos/' . $photoName;
            $image->save();

            if(file_exists($oldimage))
            {
                unlink($oldimage);
            }
        }
        return redirect()->back();

    }

    public function updateCover(Request $request)
    {
        $photoName = time().'.'.$request->company_cover->getClientOriginalExtension();
        $company = Company::find($request->cid);
        $request->company_cover->move(public_path('photos'), $photoName);
        if(!$company->cover)
        {
        $cover = new Cover;
        $cover->company_id = $company->id;
        $cover->path = '/photos/' . $photoName;
        $cover->save();
        }else{
            $cover = $company->cover;
            $cover->company_id = $company->id;
            $oldcover = public_path($company->cover->path);
            $cover->path = '/photos/' . $photoName;
            $cover->save();

            if(file_exists($oldcover))
            {
                unlink($oldcover);
            }
        }
        return redirect()->back();
    }

    public function getPayment()
    {
        return view('company.payment');
    }

    public function imageCrop()
    {
        return view('imageCrop');
    }

    public function imageCropPost(Request $request)
    {

        $data = $request->image;


        list($type, $data) = explode(';', $data);

        list(, $data)      = explode(',', $data);


        $data = base64_decode($data);

        $image_name= time().'.png';

        $path = public_path() . "/photos/" . $image_name;


        file_put_contents($path, $data);

        $company = Company::find(Auth::user()->id);

        if(!$company->image)
        {
        $image = new Image;
        $image->company_id = $company->id;
        $image->path = '/photos/' . $image_name;
        $image->save();
        }else{
            $image = $company->image;
            $image->company_id = $company->id;
            $oldimage = public_path($company->image->path);
            $image->path = '/photos/' . $image_name;
            $image->save();

            if(file_exists($oldimage))
            {
                unlink($oldimage);
            }
        }

      //  return redirect()->back();
        return response()->json(['success'=>'done']);

    }

    public function promoteCompany($cid){

        $company = Company::findOrFail($cid);
        
        if($company->balance >= 4000){
            $company->balance -= 4000;
            $company->promotion = Carbon::now()->addWeeks(4);
            $company->save();
            return redirect()->back();
        }else{
            return redirect()->back()->withErrors(['message' => "You don't have enough credit to promote your company."]);
        }
       

    }

    public function getResetPasswordEmail()
    {
        return view('company.resetPasswordEmailForm');
    }

    public function sendResetPasswordEmail()
    {
        $company = Company::where('email', Input::get('email'))->first();
        $company->token = app('App\Http\Controllers\UserController')->RandomString();
        $company->save();
        Mail::to($company->email)->send(new ResetPassword($company,'naposao.rs, password reset confirmation!'));
        \Session::flash('msg', 'Registered! Please check your email!' );
        return redirect()->route('getHome')->with('message', 'An email has been sent to your account, please follow instructions to reset your password');
    }

    public function getResetPassword($token)
    {
        return view('company.resetPasswordForm', ['token' => $token]);
    }

    public function setNewPassword($token)
    {
        $company = Company::where('token', $token)->first();
        if (!strcmp(Input::get('password'), Input::get('repeat_password'))){
            $company->password = Hash::make(Input::get('password'));
            $company->save();
        }
        return redirect()->route('getHome')->with('message', 'Your password has been changed. Please log in.');
    }

    public function confirmCompany($token)
    {
       $company = Company::where('token', $token)->first();
       if ($company) {
            $company->active = 1;
            $company->save();
            return redirect::route('getHome')->with('success','Account has been validated! Please login in.');
       }
       return view('company.register')->withErrors(['error', 'Tokens do not match!']);
   }

   public function getInvoices(){

        $invoices = Invoice::where('company_id',Auth::user()->id)->get();

        return view('company.invoices',['invoices' => $invoices]);

   }

   public function getInvoiceHtml($iid){

        $invoice = Invoice::findOrFail($iid);

        $company = Company::where('id',$invoice->company_id)->first();

        $info = HostCompany::all()->first();

        return view('company.invoiceHtml',['invoice' => $invoice,'company' => $company,'info' => $info]);

   }

   public function deleteInvoice($iid){

        $invoice = Invoice::findOrFail($iid);
        $invoice->delete();
        return redirect()->back();

   }

}