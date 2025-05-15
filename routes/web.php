<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\{
    ProfileController,
    MessageController,
    ServiceController as AdminServiceController,
    ServiceCategoryController as AdminServiceCategoryController
};
use Illuminate\Support\Facades\Route;

// Temporary route to check admin URL key
Route::get('/check-admin-url', function() {
    return 'Admin URL Key: dashboard-' . config('admin.url_key');
});

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'sendContact'])->name('contact.send');
Route::get('/blog', [BlogController::class, 'blog'])->name('user.blog');
Route::get('/blog/{blog}', [BlogController::class, 'show'])->name('blog.show');

// Authentication routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Admin routes with secure URL and middleware
Route::prefix('dashboard-' . config('admin.url_key', 'secure'))->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::resource('users', UserController::class);
    
    // Admin blog management
    Route::prefix('manage')->name('admin.')->group(function () {
        Route::resource('blogs', BlogController::class);
    });

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('admin.profile.update');

    // Message management routes
    Route::prefix('messages')->name('admin.messages.')->group(function () {
        Route::get('/', [MessageController::class, 'index'])->name('index');
        Route::get('/{message}', [MessageController::class, 'show'])->name('show');
        Route::patch('/{message}/mark-as-read', [MessageController::class, 'markAsRead'])->name('mark-as-read');
        Route::patch('/{message}/mark-as-unread', [MessageController::class, 'markAsUnread'])->name('mark-as-unread');
        Route::delete('/{message}', [MessageController::class, 'destroy'])->name('destroy');
    });

    // Service management routes
    Route::prefix('services')->name('admin.')->group(function () {
        Route::resource('service-categories', AdminServiceCategoryController::class);
        Route::resource('services', AdminServiceController::class);
    });
});
