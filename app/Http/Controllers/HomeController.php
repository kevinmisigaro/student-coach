<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;

class HomeController extends Controller
{
    public function index(){
        $jobs = Job::all();
        $coaches = User::where('role', 3)->get();

        return view('welcome',\compact('jobs', 'coaches'));
    }
}
