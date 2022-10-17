<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\BlogsController;
use App\Http\Controllers\Front\AboutController;



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

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/contact',[HomeController::class,'contact'])->name('contact');
Route::get('/about-us',[AboutController::class,'index'])->name('about');
Route::get('/blogs',[BlogsController::class,'index'])->name('blogs.index');
Route::get('/blog-detail/{id}',[BlogsController::class,'detail'])->name('blog.detail');
Route::get('/category-post/{id}',[BlogsController::class,'categoryPost'])->name('category.posts');




require __DIR__.'/member.php';
require __DIR__.'/backend.php';
require __DIR__.'/auth.php';
