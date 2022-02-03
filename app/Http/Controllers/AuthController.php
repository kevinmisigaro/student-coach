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

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'city' => $request->city,
            'country' => $request->country,
            'username' => $request->username,
            'phone' => $request->phone
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return \redirect('/dashboard');
        }

        session()->flash('error', 'Registration failed.');
        return back();
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
