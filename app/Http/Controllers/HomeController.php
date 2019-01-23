<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company as Company;
use App\Ad as Ad;
use Session;
use Illuminate\Mail\Mailer;
use Mail;
use App\Mail\Template as Template;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Message;
use App\Application;
use App\Invoice;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $companies = Company::where('blocked',0)->where('active',1)->orderBy('promotion','desc')->with('image')->limit(12)->get();
        $ads = Ad::orderBy('ad_type','desc')->orderBy('reinforcement_date','desc')->orderBy('promotion_date','desc')->orderBy('salary_to','desc')->orderBy('created_at','desc')->where('approved',1)->limit(5)->get();
        return view('home', ['companies' => $companies, 'ads' => $ads]);
       
    }


    public function get404()
    {
        return view('404');
    }

    public function sendMail()
    {
        $user = Session::get('user');
        Mail::to('cpt.koki@gmail.com')->send(new Template($user,'Welcome to naposao.rs payment gateway!'));
        return redirect()->back();
    }

    public function submitPayment()
    {
        \Stripe\Stripe::setApiKey('sk_test_sQWHOV4aMUS3Y3kO321JlF1i');
        // Get the token from the JS script
        $token = Input::get('stripeToken');
        // user info
        $amount = Input::get('hidden_ammount');
        $name = Input::get('name');
        $lastName = Input::get('lastName');
        $email = Input::get('email');
        // Create a Customer
        $customer = \Stripe\Customer::create(array(
            "email" => $email,
            "source" => "tok_amex",
            'metadata' => array("name" => $name, "last_name" => $lastName)
        ));

        $charge = \Stripe\Charge::create(array(
            "amount" => $amount*100,
            "currency" => "RSD",
            "source" => $token, // obtained with Stripe.js
            'metadata' => array("name" => $name, "last_name" => $lastName)
        ));

        $tax = ($amount*20)/100;
        $last_invoice = Invoice::all()->last();
        if($last_invoice !== null){
            $invoice_id = $last_invoice->invoice_id + 1;
        }else{
            $invoice_id = 1000000000;
        }
        if ($charge) {
            Invoice::create([
                'invoice_id' => $invoice_id,
                'company_id' => Auth::user()->id,
                'first_name' => Input::get('name'),
                'last_name' => Input::get('lastName'),
                'email' => Input::get('email'),
                'city' => Input::get('city'),
                'state' => Input::get('country'),
                'zip' => Input::get('zip'),
                'state_number' => Input::get('statenum'),
                'phone' => Input::get('phone'),
                'address' => Input::get('address'),
                'package' => Input::get('package'),
                'amount' => Input::get('hidden_ammount'),
                'tax' => $tax,
            ]);

            $company = Company::findOrFail(Auth::user()->id);
            $company->balance += Input::get('package');
            $company->save();
            
           // Mail::to($user->email)->send(new EmailConfirmation($user,"Thank you for your donation, $user->first_name $user->last_name!")); 

            //return $charge;
            return redirect()->route('getHome');
        }
    }
}
