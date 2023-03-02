<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class postController extends Controller
{
    //
    function getPosts(){
        $posts = Post::with('user')->paginate();
        return view('posts', ['posts' => $posts]);
    }

    function getPost($id){
        $posts = Post::find($id);
        return view('viewPost', ['posts' => $posts]);
    }

    function createPost(){
        // $users = User::get();
        return view('insertPost');
    }

    function insert(Request $request){
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $id = Auth()->id();
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $id,
        ]);
        return redirect()->route('posts');
    }

    function edit($id){
        $posts = post::find($id);
        $users = User::get();
        return view('editPost', compact('posts','users'));
    }

    function update($id, Request $request){
        Post::where('id', $id)->update($request->except('_method','_token'));
        return redirect()->route('posts');
    }

    function delete($id){
        Post::where('id', $id)->delete();
        return redirect()->route('posts');
    }

}
