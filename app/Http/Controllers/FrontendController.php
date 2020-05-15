<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\ContactUsRequest;
use App\Mail\ContactUsMail;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $categories = Category::all();
        $posts = Post::with('comments', 'category', 'user')->latest('id')->limit(5)->get();
        return view('index', compact('posts', 'categories'));
    }

    public function index()
    {
        $categories = Category::all();
        $posts = Post::with('comments', 'category', 'user')->latest('id')->paginate(5);
        return view('posts.index', compact('posts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $categories = Category::all();
        return view('posts.show', compact('post', 'categories'));
    }


    // Contact us form

    public function sendMail(ContactUsRequest $request)
    {
        Mail::to('leofizzy3@gmail.com')->send(new ContactUsMail($request));
        return back()->with('email-sent', "Your message has been sent, we are processing it");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
