<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class AdminCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->authorizeResource(Category::class);
    }

    public function index()
    {
        // $this->authorize('viewAny', Category::class);
        $categories = Category::with('posts')->get();
        return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Return the user to the categories index
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Adding a category

        $data = $request->validate([
            'name' => ['required', 'unique:categories']
        ]);

        Category::create($data);
        return back()->with('added', $data['name'] . ' added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //Return the user to the categories index
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //Update the category
        $input = $request->validate([
            'name' => ['required', 'unique:categories'],
        ]);

        $category->update($input);
        return redirect()
            ->route('categories.index')
            ->with('update', $category->name . " updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //Delete A category
        $category->delete();
        return back()->with('delete', $category->name . " was deleted successfully");
    }
}
