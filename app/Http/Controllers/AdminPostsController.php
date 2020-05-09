<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\AddPostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Post;
use Illuminate\Http\Request;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('user')->get();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::with('posts')->get();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddPostRequest $request)
    {
        $input = $request->all();

        if ($file = $request->file('image')) {
            $filename = uniqid('IMG-') . "-" . date('Y-m-d') . "-" . $file->getClientOriginalName();
            $file->storeAs('public/images', $filename);

            $input['image'] = $filename;
        }

        Post::Create($input);
        return redirect()->route('posts.index')->with('added', 'Post Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::with('posts')->get();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $input = $request->all();

        if ($file = $request->file('image')) {
            $filename = uniqid('IMG-') . "-" . date('Y-m-d') . "-" . $file->getClientOriginalName();
            $file->storeAs('public/images', $filename);

            // Check if it has old image and remove it
            if ($post->image != null) {
                unlink(public_path($post->image));
            }

            $input['image'] = $filename;
        }

        $post->update($input);
        return redirect()
            ->route('posts.show', $post->id)
            ->with('update', "Post Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //Delete a post
        $post->delete();
        return redirect()->route('posts.index')->with('delete', "Post deleted Successfully");
    }
}
