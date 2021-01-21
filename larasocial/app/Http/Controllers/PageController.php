<?php

namespace App\Http\Controllers;


use App\Post;
use App\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //index
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')-> get();
        $users = User::all();
        return view('pages.index')->with(compact('posts', 'users'));
    }
}
