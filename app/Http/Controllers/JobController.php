<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\Validator;
use App\Models\Applicant;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function index(){
        $jobs = Job::all();
        return view('jobs', \compact('jobs'));
    }

    public function job($id){
        $job = Job::find($id);
        return view('job',\compact('job'));
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'city' => 'required',
            'deadline' => 'required',
        ]);

        if ($validator->fails()) {
            session()->flash('error','Please enter all details.');
            return back();
        }

        Job::create([
            'title' => $request->title,
            'description' => $request->description,
            'city_id' => $request->city,
            'deadline_date' => $request->deadline,
            'link' => $request->link
        ]);

        session()->flash('success','Job added successfully!');
        return back();
    }

    public function application($id){

        if(!Auth::check()){
            session()->flash('error','Please login in first');
            return redirect()->back();
        }

        Applicant::firstOrCreate(['user_id' => Auth::id(), 'job_id' => $id]);

        session()->flash('success', 'Your application has been submitted!');
        return redirect()->back();
    }

    public function destroy($id){
        $job = Job::find($id);
        $job->delete();

        return redirect()->back();
    }
}
