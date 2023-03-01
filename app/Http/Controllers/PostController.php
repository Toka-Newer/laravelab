<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class postController extends Controller
{
    //
    function getPosts(){
        $posts = Post::get();
        return view('posts', ['posts' => $posts]);
    }

    function getPost($id){
        $posts = Post::find($id);
        return view('viewPost', ['posts' => $posts]);
    }

    function createPost(){
        $users = User::get();
        return view('insertPost', compact('users'));
    }

    function insert(Request $request){
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'user_id' => 'required',
        ]);
        Post::create($request->all());
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
