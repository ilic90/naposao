<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use PDF;
use App\Cv;
use App\CvFile;
use App\Invoice;
use App\Company;
use App\HostCompany;

class PdfGenerateController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function pdfview(Request $request,$cvid)
    {
        $cv = Cv::findOrFail($cvid);
        view()->share('cv',$cv);

        if($request->has('download')){
        	// Set extra option
        	PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        	// pass view file
            $pdf = PDF::loadView('user.cvPdf',compact('cv'));
            // download pdf
            return $pdf->download($cv->title.'.pdf');
        }
        return redirect()->back();
    }

    public function storePdf($cvid){

        $cv = Cv::findOrFail($cvid);
       // $user_fname = $cv->user->first_name;
       // $user_lname = $cv->user->last_name;
        view()->share('cv',$cv);
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        $pdf = PDF::loadView('user.cvPdf',compact('cv'));
        $name = $cv->title.'.pdf';
        $path = public_path().'/CVfiles/'.$name;
        $pdf->save($path);
        $filepath = '/CVfiles/'.$name;
        Cvfile::create(['cv_id' => $cvid, 'path' => $filepath]);
        
        return redirect(route('getCV'));


    }

    public function updatePdf($cvid){

        $cv = Cv::findOrFail($cvid);
        view()->share('cv',$cv);
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        $pdf = PDF::loadView('user.cvPdf',compact('cv'));
        $name = $cv->title.'.pdf';
        $path = public_path().'/CVfiles/'.$name;
        $pdf->save($path);
        $filepath = '/CVfiles/'.$name;
        $cvFile = Cvfile::where('cv_id',$cvid)->first();
        $cvFile->path = $filepath;
        $cvFile->save();

        return redirect(route('getCV'));
    }

    public function invoicePdf(Request $request,$iid){

        $invoice = Invoice::findOrFail($iid);
        $company = Company::findOrFail($invoice->company_id);
        $info = HostCompany::all()->first();
       /* $data = array(
            'invoice' => $invoice,
            'company' => $company,
            'info' => $info
        );*/
        view()->share('invoice',$invoice);

        if($request->has('download')){
        	// Set extra option
        	PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        	// pass view file
            $pdf = PDF::loadView('company.invoicePdf',compact('invoice','company','info'));
            // download pdf
            return $pdf->download($invoice->invoice_id.'.pdf');
        }
        return redirect()->back();

    }

}
