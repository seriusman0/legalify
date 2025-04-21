<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('users', UserController::class);
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class);
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});