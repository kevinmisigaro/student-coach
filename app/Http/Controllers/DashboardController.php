<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\University;
use App\Models\User;
use App\Models\Job;
use App\Models\City;

class DashboardController extends Controller
{
    public function index(){
        $universities = University::all();
        $coaches = User::where('role', 3)->get();
        $students = User::where('role',2)->get();

        return view('dashboard.home', \compact('universities', 'coaches', 'students'));
    }

    public function universities(){
        $universities = University::all();
        $cities = City::all();
        return view('dashboard.universities', \compact('universities', 'cities'));
    }

    public function students(){
        $students = User::where('role', 2)->get();
        return view('dashboard.users.students', \compact('students'));
    }

    public function coaches(){
        $coaches = User::where('role', 3)->get();
        return view('dashboard.users.coaches', \compact('coaches'));
    }

    public function jobs(){
        $jobs = Job::all();
        $cities = City::all();
        return view('dashboard.jobs',\compact('jobs', 'cities'));
    }

}
