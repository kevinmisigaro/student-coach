<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\University;
use Illuminate\Support\Facades\Validator;

class UniversityController extends Controller
{
    public function index(){
        $universities = University::all();
        return view('universities', \compact('universities'));
    }

    public function university($id){
        $university = University::find($id);
        return view('university', \compact('university'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'city' => 'required',
            'body' => 'required'
        ]);

        if ($validator->fails()) {
            session()->flash('error', 'Please enter all valid fields');
            return back();
        }

        University::create([
            'name' => $request->name,
            'city_id' => $request->city,
            'description' => $request->body
        ]);

        session()->flash('success', 'University added successfully!');
        return \redirect()->back();
    }
}
