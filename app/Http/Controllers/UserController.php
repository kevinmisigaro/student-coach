<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Follower;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function storeStudent(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
        ]);

        if ($validator->fails()) {
           //
        }
    }

    public function storeCoach(Request $request){
        
    }

    public function delete($id){
        $user = User::find($id);
        $user->delete();
        session()->flash('success','User deleted successfully');
        return back();
    }

    public function userProfile($id){
        $user = User::find($id);
        return view('userprofile',compact('user'));
    }

    public function showFollowers(){
        $followersList = \App\Models\Follower::where('user_id', \Illuminate\Support\Facades\Auth::id())->get();
        return view('dashboard.followers', compact('followersList'));
    }

    public function follow($userID){
        if (!Auth::check()) {
            session()->flash('error', 'Please login first');
            return back();
        }

        $checkIfUserIsFollowed = Follower::where([
            'user_id' => $userID,
            'follower_id' => Auth::id()
        ])->exists();

        if(!$checkIfUserIsFollowed){

            Follower::create([
                'user_id' => $userID,
                'follower_id' => Auth::id()
            ]);

        } else{
            Follower::where([
                'user_id' => $userID,
                'follower_id' => Auth::id()
            ])->delete();
        }

        return back();
    }

}
