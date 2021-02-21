<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PostsController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('categories', CategoriesController::class)->middleware('auth');
Route::resource('posts', PostsController::class)->middleware('auth');
Route::post('ckeditor/upload', 'CKEditorController@upload')->name('ckeditor.image-upload');
Auth::routes();
