<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Conversation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class CoachController extends Controller
{
    public function displayCoach($id){
        $coach = User::find($id);
        return view('counsellor', \compact('coach'));
    }

    public function consultations(){
        $conversations = Conversation::where('coach_id', Auth::id())->get();
        return view('dashboard.consultations', \compact('conversations'));
    }

    public function createCoach(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'city' => 'required',
            'country' => 'required',
            'phone' => 'required',
            'bio' => 'required'
        ]);

        if ($validator->fails()) {
            session()->flash('error', 'Please enter all details');
            return back();
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'city' => $request->city,
            'country' => $request->country,
            'phone' => $request->phone,
            'bio' => $request->bio
        ]);

        session()->flash('success', 'Coach successfully created');
        return back();
    }

    public function deleteCoach($id){
        $coach = User::find($id);

        $coach->delete();

        session()->flash('success', 'Coach successfully deleted');
        return back();
    }

    public function updateCoach(Request $request, $id){
        $coach = User::find($id);

        $coach->update([
            'name' => $request->name,
            'email' => $request->email,
            'city' => $request->city,
            'country' => $request->country,
            'phone' => $request->phone,
            'bio' => $request->bio
        ]);

        session()->flash('success', 'Coach successfully updated');
        return back();
    }
}
