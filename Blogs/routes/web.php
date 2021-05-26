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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/myBlog', 'App\Http\Controllers\BlogsController@mainView');
//Route::get('/blogs', 'App\Http\Controllers\BlogsController@forAddBlog');
//Route::post('/add-blogs', 'App\Http\Controllers\BlogsController@saveBlogs');

Route::get('/blogs', [App\Http\Controllers\BlogsController::class, 'create']);
//Route::get('/myBlog', [App\Http\Controllers\BlogsController::class, 'index']);
Route::post('/add-blogs', [App\Http\Controllers\BlogsController::class, 'store']);

Route::get('/delete-blog/{id}', 'App\Http\Controllers\BlogsController@deleteBlog');
Route::get('/edit-blog/{id}', 'App\Http\Controllers\BlogsController@editBlog');
Route::post('/update-blogs', 'App\Http\Controllers\BlogsController@updateBlog');
