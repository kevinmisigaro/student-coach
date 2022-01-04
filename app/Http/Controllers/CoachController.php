<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Conversation;

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
}
