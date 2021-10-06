<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
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
//guest Routes

Route::get('/', function () {
    return view('home') ;
});
//Login
Route::get('/login', [LoginController::class,'index'])->name('index');
Route::post('/login', [LoginController::class,'login'])->name('login');
//Register
Route::get('/register',[RegisterController::class,'index'])->name('index');
Route::post('/register',[RegisterController::class,'register'])->name('register');

// Auth routes
Route::middleware('auth')->group(function (){
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::post('/logout',[UserController::class,'logout'])->name('logout');
    Route::get('/edit',[UserController::class,'editProfile'])->name('profile.edit');
    Route::post('/edit',[UserController::class,'edit']);
});


//content routes
Route::middleware('auth')->group(function (){
    Route::get('/posts',[PostController::class,'index'])->name('posts');
    Route::get('/posts/{post}/title/{title}',[PostController::class,'show'])->name('posts.show');
    Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');
    Route::post('/posts/create',[PostController::class,'store'])->name('posts.store');
});









