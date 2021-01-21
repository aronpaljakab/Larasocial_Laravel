<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        $posts = Post::orderBy('created_at', 'DESC')-> get();
        return view('users.show')->with(compact('user', 'posts'));
    }
}
