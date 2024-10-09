<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Models\Post;

Route::get('/register', [AuthController::class, 'registerForm'])->name('registerForm')->middleware('checkNotAuth');
Route::post('/register', [AuthController::class, 'handleRegister'])->name('handleRegister');
Route::get('/login', [AuthController::class, 'loginForm'])->name('loginForm')->middleware('checkNotAuth');
Route::post('/login', [AuthController::class, 'handleLogin'])->name('handleLogin');
Route::get('profile/edit/{id}', [AuthController::class, 'editProfile'])->name('profile.edit')->middleware('checkAuth');
Route::put('profile/update/{id}', [AuthController::class, 'updateProfile'])->name('profile.update');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard')->middleware('checkAuth');
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('checkAuth');

Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create')->middleware('checkAuth');
Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit')->middleware('checkAuth');
Route::put('/posts/update/{id}', [PostController::class, 'update'])->name('posts.update');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
Route::delete('/posts/destroy/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
