<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index($id)
    {
        return view('post')->withPost(Post::find($id));
    }
}
