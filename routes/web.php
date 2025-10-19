<?php

use Illuminate\Support\Facades\Notification;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'show')->name('login');
    Route::post('/login', 'login')->name('login.post');
    Route::get('/register', 'registerView')->name('register');
    Route::post('/register', 'register')->name('register.post');
    Route::post('/logout', 'logout')->name('logout');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('layouts.dashboard');
    Route::resource('posts', PostController::class);
    Route::get('/users/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::patch('/users/update', [UserController::class, 'update'])->name('users.update');
    Route::resource('users', UserController::class)->only(['index', 'show', 'destroy']);

    Route::post('/email/verification-notification', [UserController::class, 'sendVerification'])
        ->name('verification.send');

    Route::patch('/users/password', [UserController::class, 'updatePassword'])
        ->name('password.update');
});

Route::get('/homes', [HomeController::class, 'index'])->name('homes.index');
Route::get('/category', [CategoryController::class, 'index'])->name('homes.category');
Route::get('/category/{category}', [HomeController::class, 'showCategory'])->name('homes.category_posts');
Route::get('/profile', [UserController::class, 'index'])->name('homes.user');
Route::get('/profile/{id}', [UserController::class, 'show'])->name('homes.user_profile');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/search', [SearchController::class, 'search'])->name('homes.search_results');
