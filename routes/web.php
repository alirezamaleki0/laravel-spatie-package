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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::get('post', 'postController@index')->middleware('auth.basic');
Route::get('post/create', 'postController@create')->middleware('role:writer|admin');
Route::get('post/{post}', 'postController@show')->middleware(['auth', 'password.confirm']);
Route::get('post/{post}/edit', 'postController@edit')->middleware('permission:edit post');
Route::get('post/{post}/delete', 'postController@destroy')->middleware('role:admin');

Route::post('post/create', 'Resources\PostController@create')->name('post.create');
Route::put('post/{post}/edit', 'Resources\PostController@edit')->name('post.edit');
Route::delete('post/{post}/delete', 'Resources\PostController@destroy')->name('post.destroy');

/*
|
| alirezamaleki944@gmail.com  =>  'writer' role with permission 'edit post'
|
| aturner@example.org         =>  'editor' role
|
| ahegmann@example.com        =>   without any role and permission!!
|
| dickens.derick@example.org  =>  'admin' role
|
| create roles such as example above
|
| run below artisan command to show you a table of roles and permissions per guard
| php artisan permission:show
|
*/
