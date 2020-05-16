<?php

use App\Post;
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

Route::get('/', 'FrontendController@home');

Route::post('/', "FrontendController@sendMail");

Route::name('home.')->group(function () {
    Route::resource('/posts', 'FrontendController');
});

Auth::routes();

// for all authenticated users
Route::resource('/dashboard/comments', 'AdminCommentsController');

// For Authorized users
Route::middleware(['auth', 'authorized'])->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
    Route::get('/dashboard/users/{user}/posts', 'AdminPostsController@authorPosts')->name('user.posts');

    Route::resource('/dashboard/posts', 'AdminPostsController');

    // only for admin users
    Route::middleware(['isAdmin'])->group(function () {
        Route::resource('/dashboard/users', 'AdminUsersController');
        Route::resource('/dashboard/categories', 'AdminCategoriesController');
    });
});


// Route::get('/home', 'HomeController@index')->name('home');
