<?php

namespace App\Http\Controllers;

use App\Category;
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
        $categories = Category::all();
        return view('dashboard.index', compact('users', 'posts', 'comments', 'categories'));
    }
}
