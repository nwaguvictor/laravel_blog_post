<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {

        $users = User::all();
        $posts = Post::all();
        $comments = Comment::all();
        return view('dashboard.index', compact('users', 'posts', 'comments'));
    }
}
