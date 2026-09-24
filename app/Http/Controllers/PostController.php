<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function create(){
         abort_unless(
            auth()->user()->can('posts.create'),
            403
        );

        return view('posts.create');
    }

    public function store(Request $request){
        abort_unless(
            auth()->user()->can('posts.create'),
            403
        );

        $request->validate([
            'title'=>'required',
            'description'=>'required',
        ]);

        Post::create([
            'title'=>$request->title,
            'description'=>$request->description
        ]);


        return redirect('/posts');
    }
}
