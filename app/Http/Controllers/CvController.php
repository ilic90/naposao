<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use App\Language;
use App\Cv;
use App\Education;
use App\Category;
use App\WorkHistory;
use App\User;

class CvController extends Controller
{
    
    public function getCV(){

        $uid = Session::get('user')->id;

        $user = User::findOrFail($uid);

        $cvs = $user->cv;

        return view('user.cv',compact('user','cvs'));

    }

    public function getCreateCV(){

        $uid = Session::get('user')->id;

        $user = User::findOrFail($uid);

        $languages = Language::all();

        return view('user.createCV',compact('user','languages'));

    }

    public function cvStep2(){

        $categories = Category::all();

        return view('user.cv-step2',compact('categories'));

    }

    public function storeCV(Request $request){

        $this->validate($request,[
            'title' => 'required|max:50',
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'email' => 'required|email|max:100',
            'gender' => 'required|max:50',
            'city' => 'required|max:100',
            'driving_licence' => 'required',
            'native_language' => 'required|max:100'
        ]);

        $cv = Cv::where('title', $request->title)->where('email', $request->email)->first();
        if($cv === null){
            $input = $request->all();

            $cv = Cv::create($input);
    
            $categories = Category::all();
    
            return view('user.cv-step2',compact('categories','cv'));
        }else{
            
            $categories = Category::all();

            return view('user.cv-step2',compact('categories','cv'));            
        }

    }

    public function createWorkHistory(Request $request){
        
        $this->validate($request,[
            'cv_id' => 'required',
            'year_from' => 'required|max:20',
            'month_from' => 'required|max:20',
            'year_to' => 'required|max:20',
            'month_to' => 'required|max:20',
            'position' => 'required|max:100',
            'company_name' => 'required|max:100',
            'location' => 'required|max:100',
            'business_sector' => 'required'
        ]);
        $workHistory = WorkHistory::where('cv_id',$request->cv_id)->where('company_name',$request->company_name)->where('position',$request->position)->first();
        if($workHistory === null){
            WorkHistory::create($request->all());

            $cv = Cv::findOrFail($request->cv_id);

            $categories = Category::all();
            
            return view('user.cv-step3',compact('categories','cv'));
        }else{
            $cv = Cv::findOrFail($request->cv_id);

            $categories = Category::all();
            
            return view('user.cv-step3',compact('categories','cv'));
        }
        

    }

    public function createEducation(Request $request){

        $this->validate($request,[
            'cv_id' => 'required',
            'year_from' => 'required|max:20',
            'month_from' => 'required|max:20',
            'year_to' => 'required|max:20',
            'month_to' => 'required|max:20',
            'school' => 'required|max:100',
            'location' => 'required',
            'level' => 'required'
        ]);
        $education = Education::where('cv_id',$request->cv_id)->where('school',$request->school)->first();
        if($education === null){
            Education::create($request->all());

            $cv = Cv::findOrFail($request->cv_id);

            return view('user.cv-step2',compact('cv'));
        }else{
            $cv = Cv::findOrFail($request->cv_id);

            return view('user.cv-step2',compact('cv'));
        }
        

    }

    public function getWorkHistory($cvid){

        $cv = Cv::findOrFail($cvid);

        $categories = Category::all();

        return view('user.cv-step3',compact('categories','cv'));

    }

    public function getCVhtml($cvid){

        $cv = Cv::findOrFail($cvid);

        return view('user.cvHtml',compact('cv'));

    }

    public function deleteCV($cvid){

        $cv = Cv::findOrFail($cvid);

        $cv->delete();

        return redirect()->back();

    }

    public function editCV($cvid){

        $cv = Cv::findOrFail($cvid);

        $languages = Language::all();

        $categories = Category::all();
        
        return view('user.editCV',compact('cv','languages','categories'));

    }

    public function addWorkHistory(Request $request){

        $this->validate($request,[
            'cv_id' => 'required',
            'year_from' => 'required|max:20',
            'month_from' => 'required|max:20',
            'year_to' => 'required|max:20',
            'month_to' => 'required|max:20',
            'position' => 'required|max:100',
            'company_name' => 'required|max:100',
            'location' => 'required|max:100',
            'business_sector' => 'required'
        ]);


        WorkHistory::create($request->all());

        return redirect()->back();

    }

    public function addEducation(Request $request){

        $this->validate($request,[
            'cv_id' => 'required',
            'year_from' => 'required|max:20',
            'month_from' => 'required|max:20',
            'year_to' => 'required|max:20',
            'month_to' => 'required|max:20',
            'school' => 'required|max:100',
            'location' => 'required',
            'level' => 'required'
        ]);

        Education::create($request->all());

        return redirect()->back();

    }

    public function updateCV(Request $request){

        $cv = Cv::findOrFail($request->id);

        $cv->update($request->all());

        return redirect()->back();

    }

    public function editEducation(Request $request){
        
        $education = Education::findOrFail($request->id);
        
        $education->update($request->all());

        return redirect()->back();

    }

    public function editWorkHistory(Request $request){

        $workHistory = WorkHistory::findOrFail($request->id);

        $workHistory->update($request->all());

        return redirect()->back();

    }

    public function removeEducation($eid){

        $education = Education::findOrFail($eid);
        $education->delete();
        return redirect()->back();

    }

    public function removeWorkHistory($whid){

        $workHistory = WorkHistory::findOrFail($whid);
        $workHistory->delete();
        return redirect()->back();

    }
/* ajax at create cv step 2
    public function education(Request $request){
        
        $education = new Education;
        $education->cv_id = $request->cv_id;
        $education->year_from = $request->year_from;
        $education->month_from = $request->month_from;
        $education->year_to = $request->year_to;
        $education->month_to = $request->month_to;
        $education->school = $request->school;
        $education->location = $request->location;
        $education->level = $request->level;
        $education->description = $request->description;
        $education->save();
      
    }
*/
}
