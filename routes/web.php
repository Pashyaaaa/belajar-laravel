<?php

use App\Http\Controllers\CategoryContoller;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('home', [
        "title"=>"Home",
    ]);
});

// Route::get('/welcome', function () {
//     return view('welcome', [
//         "title"=>"Laravel",
//     ]);
// });

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "name" => "Octavian Pashya Ramadhan",
        "email" => "octavianpashya20@gmail.com",
        "image" => "profile.png"
    ]);
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}',  [PostController::class, 'detail']);

Route::get('/categories', [CategoryContoller::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function(){
    return view('dashboard.index', [
        'title'=>'Dashboard',
        'sidebar_posts'=>Post::where('user_id', auth()->user()->id)->latest()->limit(3)->get()
    ]);
})->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug']);

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');