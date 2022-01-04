<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class CoachController extends Controller
{
    public function displayCoach($id){
        $coach = User::find($id);
        return view('counsellor', \compact('coach'));
    }
}
