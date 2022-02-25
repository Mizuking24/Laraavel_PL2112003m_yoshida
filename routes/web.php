<?php

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
    return view('welcome');
});

// Auth::routes();
Auth::routes(['verify' => true]);

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/posts', 'PostController@index')->name('Posts');
Route::get('/post/new', 'PostController@new')->name('Post.new');
Route::post('/post/create', 'PostController@create')->name('Post.create');
Route::get('/post/{id}/show', 'PostController@show')->name('Post.show');
Route::post('/comment/{id}/create', 'CommentController@create')->name('Comment.create');
