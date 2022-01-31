<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Comment;
use App\Models\Group;
use App\Models\PostLike;

class PostController extends Controller
{
    public function index(){
        $posts = Post::get();
        $groups = Group::get();
        return view('forum', \compact('posts','groups'));
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

        if($request->hasFile('image')){
            $filename = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/forum'), $filename);

            Post::create([
                'title' => $request->title,
                'body' => $request->body,
                'user_id' => Auth::id(),
                'image' =>  "images/forum/$filename"
            ]);

            session()->flash('success','Post successfully added!');
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

    public function like($id){
        if (!Auth::check()) {
            session()->flash('error', 'Please login first');
            return back();
        }

        PostLike::updateOrCreate([
            'post_id' => $id,
            'user_id' => Auth::id()
        ],['is_like' => true]);

        return back();
    }

    public function dislike($id){
        if (!Auth::check()) {
            session()->flash('error', 'Please login first');
            return back();
        }

        PostLike::updateOrCreate([
            'post_id' => $id,
            'user_id' => Auth::id(),      
        ],['is_like' => false]);

        return back();
    }
}
