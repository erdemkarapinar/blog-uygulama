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

Route::get('/login', [AuthController::class, 'show'])->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'registerView'])->name('register');

Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::middleware(['check.user'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Post CRUD işlemleri (slug bazlı)
    Route::resource('posts', PostController::class);

    Route::resource('users', UserController::class)->except(['create', 'store']);

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::delete('/users/delete', [AuthController::class, 'destroy'])->name('users.delete');

    // E-posta doğrulama bildirimi
    Route::post('/email/verification-notification', function (Request $request) {
        $user = Auth::user();

        if ($user && !$user->hasVerifiedEmail()) {
            $user->sendEmailVerificationNotification();
        }

        return back()->with('status', 'verification-link-sent');
    })->name('verification.send');

    // Şifre güncelleme
    Route::patch('/users/password', function (Request $request) {
        $user = Auth::user();

        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('status', 'password-updated');
    })->name('password.update');
});