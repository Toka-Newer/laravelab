<?php

namespace App\Http\Controllers;
use App\Models\Post;

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
        return view('insertPost');
    }

    function insert(Request $request){
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'postCreator' => 'required',
        ]);
        Post::create($request->except('_method','_token'));
        return redirect()->route('posts');
    }

    function edit($id){
        $posts = post::find($id);
        return view('editPost', compact('posts'));
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
