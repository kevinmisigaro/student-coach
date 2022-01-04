<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function chat($coachID){

        if (!Auth::check()) {
            session()->flash('error', 'Please login first');
            return back();
        }

        return redirect('/chat/'.$coachID);
    }

    public function chatwithStudent($studentID){
        if (!Auth::check()) {
            session()->flash('error', 'Please login first');
            return back();
        }

        return redirect('/chat/student/'.$studentID);
    }
}
