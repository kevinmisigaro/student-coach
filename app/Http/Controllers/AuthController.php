<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationConfirm;
use App\Mail\RegistrationConfirmCoach;

class AuthController extends Controller
{
    public function updateUserDetails(Request $request){
        
        $user = User::where('id', $request->id)->first();

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'city' => $request->city,
            'country' => $request->country,
            'bio' => $request->bio,
            'status' => $request->status
        ]);

        if($request->hasFile('image')){
            $image = $request->file('image')->store('profile', 'public');
            
            $user->update([
                'avatar' => "images/$image"
            ]);
        }

        session()->flash('success', 'Details updated');
        return back();
    }

    public function registerCoach(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
            'bio' => 'required',
            'expertise' => 'required',
            'city' => 'required',
            'country' => 'required'
        ]);

        if ($validator->fails()) {
            session()->flash('error', 'Please enter all details');
            return back();
        }

        $checkIfUsernameExists = User::where('username', $request->username)->exists();

        if($checkIfUsernameExists){
            session()->flash('error', 'This username already exists!');
            return back();
        }

        $data = $request->all();

        if (empty($data['mycheckbox'])) {
            session()->flash('error', 'You have to accept our terms and conditions first');
            return back();
        }
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'city' => $request->city,
            'country' => $request->country,
            'username' => $request->username,
            'phone' => $request->phone,
            'expertise' => $request->expertise,
            'bio' => $request->bio,
            'role' => 3
        ]);

        Mail::to($user->email)->send(new RegistrationConfirmCoach($user));

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return \redirect('/dashboard');
        }

        session()->flash('error', 'Registration failed.');
        return back();
    }

    public function registerStudent(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            session()->flash('error', 'Please enter all details');
            return back();
        }

        $checkIfUsernameExists = User::where('username', $request->username)->exists();

        if($checkIfUsernameExists){
            session()->flash('error', 'This username already exists!');
            return back();
        }

        $data = $request->all();

            if (empty($data['mycheckbox'])) {
                session()->flash('error', 'You have to accept our terms and conditions first');
                return back();
            }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'city' => $request->city,
            'country' => $request->country,
            'username' => $request->username,
            'phone' => $request->phone
        ]);

        Mail::to($user->email)->send(new RegistrationConfirm($user));

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return \redirect('/dashboard');
        }

        session()->flash('error', 'Registration failed.');
        return back();
    }

    public function profile(){
        $user = User::where('id', Auth::id())->first();
        return view('dashboard.userprofile', \compact('user'));
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect('dashboard');
        }

        session()->flash('error', 'Incorrect username or password');
        return back();
    }

    public function logout(){
        Auth::logout();
        return \redirect('/');
    }
}
