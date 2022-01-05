<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Comment;

class PostController extends Controller
{
    public function index(){
        $posts = Post::get();
        return view('forum', \compact('posts'));
    }

    public function post($id){
        $post = Post::find($id);
        return view('post',\compact('post'));
    }

    public function comment(Request $request, $id){
        if (!Auth::check()) {
            session()->flash('error', 'Please login first');
            return back();
        }

        $validator = Validator::make($request->all(), [
            'comment' => 'required',
        ]);

        if ($validator->fails()) {
            session()->flash('error','Please enter all details.');
            return back();
        }

        Comment::create([
            'user_id' => Auth::id(),
            'post_id' => $id,
            'message' => $request->comment
        ]);

        return \redirect()->back();
    }

    public function store(Request $request){
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

        Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => Auth::id()
        ]);

        session()->flash('success','Post successfully added!');
        return back();
    }
}
