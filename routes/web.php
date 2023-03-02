<?php

use App\Http\Controllers\postController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});

Route::middleware('auth')->group(function(){
    // posts
    Route::get('/posts', [postController::class, 'getPosts'])->name('posts');
    Route::get('/viewPost/{id}', [postController::class, 'getPost'])->name('viewPost');
    Route::get('/createPost', [postController::class, 'createPost'])->name('createPost');
    Route::post('/insertPost', [postController::class, 'insert'])->name('insertPost');
    Route::get('/editPost/{id}', [postController::class, 'edit'])->name('editPost');
    Route::put('/updatePost/{id}', [postController::class, 'update'])->name('updatePost');
    Route::delete('/deletePost/{id}', [postController::class, 'delete'])->name('deletePost');

    // user
    Route::get('/users/show', [UserController::class, 'index'])->name('users.show');
    Route::get('/users/showPosts/{id}', [UserController::class, 'show'])->name('users.showPosts');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
