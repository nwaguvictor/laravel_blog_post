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
    Route::view('/admin', 'admin/index')->name('admin.index');

    Route::resource('/admin/posts', 'AdminPostsController');
    Route::resource('/admin/comments', 'AdminCommentsController');

    // only for admins
    Route::middleware(['isAdmin'])->group(function () {
        Route::resource('/admin/users', 'AdminUsersController');
        Route::resource('/admin/categories', 'AdminCategoriesController');
    });
});


Route::get('/home', 'HomeController@index')->name('home');
