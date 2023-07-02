<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\LandingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LandingController::class, 'index']);
Route::get('/about', [LandingController::class, 'about']);
Route::get('/blogs', [LandingController::class, 'blogs']);
Route::get('/blogs/{blogs:slug}', [LandingController::class, 'details']);
Route::get('/contact', [LandingController::class, 'contact']);



// Dashboard
Route::get('/login', [AdminController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AdminController::class, 'authenticate']);
Route::post('/logout', [AdminController::class, 'logout']);
Route::resource('/dashboard/landing', AdminController::class)->middleware('auth');
Route::resource('/dashboard/blogs', BlogsController::class)->parameters(['blogs'=> 'blogs'])->middleware('auth');
Route::get('/dashboard/blogs/generateSlug/{title:title}', [BlogsController::class, 'generateSlug'])->middleware('auth');

