<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(9);
        return view('blog',compact('posts'));
    }

    public function show(Post $post)
    {
        return view('post',compact('post'));
    }
}
