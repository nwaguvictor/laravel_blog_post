<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::middleware(['auth', 'authorized'])->group(function () {
    Route::view('/dashboard', 'dashboard/index')->name('dashboard.index');
    Route::get('/dashboard/users/{user}/posts', 'AdminPostsController@authorPosts')->name('user.posts');

    Route::resource('/dashboard/posts', 'AdminPostsController');
    Route::resource('/dashboard/comments', 'AdminCommentsController');

    // only for admins
    Route::middleware(['isAdmin'])->group(function () {
        Route::resource('/dashboard/users', 'AdminUsersController');
        Route::resource('/dashboard/categories', 'AdminCategoriesController');
    });
});


Route::get('/home', 'HomeController@index')->name('home');
