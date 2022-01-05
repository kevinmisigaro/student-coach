<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\PostController;
use App\Http\Livewire\ChatRoom;
use App\Http\Livewire\CoachChatRoom;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[HomeController::class,'index'])->name('login');

Route::get('about', function(){
    return view('about');
});

Route::get('jobs', [JobController::class, 'index']);

Route::get('work', function(){
    return view('work');
});

Route::get('partner', function(){
    return view('partners');
});

Route::get('universities',[UniversityController::class,'index']);

Route::get('university/{id}',[UniversityController::class,'university']);

Route::get('counsellor/{id}', [CoachController::class, 'displayCoach']);

Route::get('job/{id}', [JobController::class, 'job']);

Route::get('applicant/{id}',[JobController::class,'application']);

Route::get('register', function(){
    return view('auth.register');
});

Route::get('login', function(){
    return view('auth.login');
});

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'registerStudent']);

Route::get('logout',[AuthController::class,'logout']);

Route::get('beginSession/{coachID}',[ChatController::class,'chat']);
Route::get('chat/{coachID}', ChatRoom::class);
Route::get('chat/coach/{studentID}', CoachChatRoom::class);

Route::get('forum',[PostController::class, 'index']);
Route::post('forum/create',[PostController::class,'store']);
Route::get('post/{id}',[PostController::class,'post']);
Route::post('post/comment/{id}',[PostController::class,'comment']);

Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('universities',[DashboardController::class,'universities']);
    Route::get('students',[DashboardController::class,'students']);
    Route::get('coaches',[DashboardController::class,'coaches']);
    Route::get('jobs',[DashboardController::class,'jobs']);

    Route::get('consultations', [CoachController::class,'consultations']);

    Route::post('university/create',[UniversityController::class,'store']);

    Route::post('job/store',[JobController::class,'store']);
    Route::get('job/delete/{id}',[JobController::class,'destroy']);
});

