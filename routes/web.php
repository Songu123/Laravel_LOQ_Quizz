<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes(['verify' => true]);

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

Route::middleware(('guest'))->group(function () {
    Route::get('/register', [\App\Http\Controllers\AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register'])->name('register.post');

    Route::get('/login', [\App\Http\Controllers\AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login.post');
    
    // Password Reset Routes
    Route::get('/forgot-password', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/forgot-password', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/reset-password/{token}', [\App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [\App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('password.update');
});

// Đăng nhập cho quản trị viên/giảng viên
Route::get('/login/admin', function () {
    return view('auth.login_admin');
})->name('login.admin');
Route::post('/login/admin', [\App\Http\Controllers\AuthController::class, 'loginAdmin'])->name('login.admin.post');

// Đăng nhập cho học sinh/sinh viên
Route::get('/login/student', function () {
    return view('auth.login_student');
})->name('login.student');
Route::post('/login/student', [\App\Http\Controllers\AuthController::class, 'loginStudent'])->name('login.student.post');

// HomeController routes
Route::get('/home-controller', [\App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
Route::get('/about', [\App\Http\Controllers\HomeController::class, 'about'])->name('home.about');
Route::get('/contact', [\App\Http\Controllers\HomeController::class, 'contact'])->name('home.contact');

// logout
Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
// Auth::routes(); // Đã tắt xác thực tự động để /home không bị override

// Dashboard routes (chỉ cho user đã đăng nhập)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('student-dashboard');
    })->name('dashboard');
    
    // Admin dashboard (có thể tùy chỉnh sau)
    Route::get('/admin/dashboard', function () {
        return view('dashboard'); // dashboard cũ cho admin
    })->name('admin.dashboard');
    
    // Profile routes
    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [\App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [\App\Http\Controllers\ProfileController::class, 'updatePassword'])->name('profile.password.update');
    Route::delete('/profile/avatar', [\App\Http\Controllers\ProfileController::class, 'deleteAvatar'])->name('profile.avatar.delete');
});


Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');
