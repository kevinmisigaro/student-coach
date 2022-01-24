<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerStudent(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
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
            'country' => $request->country
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return \redirect('/dashboard');
        }

        session()->flash('error', 'Registration failed.');
        return back();
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            return redirect('dashboard');
        }

        session()->flash('error', 'Incorrect email or password');
        return back();
    }

    public function logout(){
        Auth::logout();
        return \redirect('/');
    }
}
