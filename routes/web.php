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
use App\Http\Controllers\GroupController;
use App\Http\Livewire\ChatRoom;
use App\Http\Livewire\CoachChatRoom;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;

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

Route::get('register/coach',function(){
    return view('coachRegister');
});

Route::post('register/coach',[AuthController::class,'registerCoach']);

Route::get('logout',[AuthController::class,'logout']);

Route::get('beginSession/{coachID}',[ChatController::class,'chat']);
Route::get('chat/{coachID}', ChatRoom::class);
Route::get('chat/coach/{studentID}', CoachChatRoom::class);

Route::get('forum',[PostController::class, 'index']);
Route::post('forum/create',[PostController::class,'store']);
Route::get('post/{id}',[PostController::class,'post']);
Route::post('post/comment/{id}',[PostController::class,'comment']);
Route::post('post/comment/{postID}/{commentID}',[PostController::class,'reply']);
Route::get('post/like/{id}',[PostController::class,'like']);
Route::get('post/dislike/{id}',[PostController::class,'dislike']);
Route::get('userprofile/{id}',[UserController::class,'userProfile']);
Route::get('like/comment/{commentID}',[PostController::class,'likeComment']);

Route::prefix('group')->group(function(){
    Route::get('/',[GroupController::class,'index']);
    Route::post('store',[GroupController::class,'store']);
    Route::get('singlegroup/{id}',[GroupController::class,'display']);
    Route::post('post/{id}',[GroupController::class,'post']);
    Route::get('follow/{id}',[GroupController::class,'membershipRequest']);
});

Route::get('forumtest', function(){
    return view('forumtest');
});

Route::get('events', [EventController::class,'index']);
Route::get('event/{id}',[EventController::class,'show']);
Route::get('event/attend/{id}',[EventController::class,'attend']);

Route::get('follow/{userID}',[UserController::class,'follow']);

Route::get('terms', function(){
    return view('terms');
});

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

    Route::get('profile', [AuthController::class,'profile']);
    Route::post('profile/update', [AuthController::class,'updateUserDetails']);

    Route::get('mybookings', function(){
        return view('dashboard.userbookings');
    });

    Route::get('mygroups', function(){
        return view('dashboard.mygroups');
    });

    Route::get('followers', function(){
        return view('dashboard.followers');
    });

    Route::get('following', function(){
        return view('dashboard.following');
    });

    Route::prefix('events')->group(function(){
        Route::get('/', function(){
            $events = \App\Models\Event::where('event_date','>=', \Carbon\Carbon::now())->get();
            return view('dashboard.events', compact('events'));
        });
        Route::get('attendees/{id}',[EventController::class,'viewAttendees']);
        Route::post('store',[EventController::class,'store']);
        Route::post('update/{id}',[EventController::class,'update']);
        Route::delete('delete/{id}',[EventController::class,'delete']);
    });

});

