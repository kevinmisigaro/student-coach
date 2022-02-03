<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

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
}
