<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Added by us.

// Home Page
Route::get('/', 'PageController@index')->name('pages.index')->middleware('auth');

// Profile Page
Route::get('/user/{id}', 'UserController@show')->name('users.show')->middleware('auth');

// Post routes
Route::post('/posts', 'PostController@store')->name('posts.store')->middleware('auth');

Route::delete('/posts/{id}', 'PostController@delete')->name('posts.delete')->middleware('auth');

Route::get('/posts/{id}/like', 'PostController@like')->name('posts.like')->middleware('auth');