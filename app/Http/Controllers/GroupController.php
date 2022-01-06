<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\GroupMember;
use App\Models\Post;
use App\Models\GroupPost;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    public function index(){
        $groups = Group::all();
        return view('groups.index',\compact('groups'));
    }

    public function display($id){
        $group = Group::where('id',$id)->with('owner')->first();
        return view('groups.singlegroup',\compact('group'));
    }

    public function membershipRequest($id){
        if (!Auth::check()) {
            session()->flash('error', 'Please login first');
            return back();
        }

        GroupMember::firstOrCreate([
            'group_id' => $id, 'user_id' => Auth::id()
        ]);

        session()->flash('success','You are now a member of '.Group::where('id',$id)->pluck('name')->first());
        return back();
    }

    public function post(Request $request,$id){
        if (!Auth::check()) {
            session()->flash('error', 'Please login first');
            return back();
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);

        if ($validator->fails()) {
            session()->flash('error','Please enter all details.');
            return back();
        }

        $post = Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => Auth::id()
        ]);

        GroupPost::create([
            'post_id' => $post->id,
            'group_id' => $id
        ]);

        session()->flash('success','Post successfully added!');
        return back();
    }

    public function store(Request $request){

        if (!Auth::check()) {
            session()->flash('error', 'Please login first');
            return back();
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            session()->flash('error','Please enter all details.');
            return back();
        }

        $group = Group::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => Auth::id()
        ]);

        GroupMember::create([
            'group_id' => $group->id, 'user_id' => Auth::id()
        ]);

        session()->flash('success','Group created');
        return \redirect()->back();

    }
}
