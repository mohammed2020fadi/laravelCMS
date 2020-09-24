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


Auth::routes();

Route::get('/', 'MainController@index')->name('main');

Route::get('blog/post/{post}', 'BlogPostController@show')->name('blogPost');

Route::get('blog/categories/{category}', 'BlogPostController@category')->name('blogCategory');

Route::get('blog/tags/{tag}', 'BlogPostController@tag')->name('blogTag');

Route::middleware('auth')->group(function () {
    Route::resource('/home', 'HomeController');
    Route::resource('categories', 'CategoryController');
    Route::resource('tags', 'TagController');
    Route::resource('posts', 'PostController');
    Route::get('trashed-post', 'PostController@trashed')->name('trashedPost');
    Route::put('restore-post/{post}', 'PostController@restore')->name('restore-post');
    Route::get('users', 'UserController@index')->name('users-index');
    Route::post('users/{user}/make-admin', 'UserController@makeAdmin')->name('users.make-admin');
    Route::post('users/{user}/make-writer', 'UserController@makeWriter')->name('users.make-writer');
    Route::get('users/edir-profile', 'UserController@edit')->name('users.edir-profile');
    Route::put('users/{user}', 'UserController@update')->name('users.update');
});
