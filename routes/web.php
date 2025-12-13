<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Middleware\AdminAuth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public Routes
Route::controller(PageController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/projects', 'projects')->name('projects');
    Route::get('/projects/{slug}', 'show')->name('projects.show');
    Route::get('/about', 'about')->name('about');
    Route::get('/skills', 'skills')->name('skills');
    Route::get('/certificates', 'certificates')->name('certificates');
    Route::get('/contact', 'contact')->name('contact');
});

// Contact Form Submission (Rate Limited)
Route::post('/contact', [ContactController::class, 'store'])
    ->name('contact.store')
    ->middleware('throttle:3,1');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    
    // Authentication
    Route::middleware('throttle:5,1')->group(function () {
        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    });
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Protected Admin Routes
    Route::middleware(AdminAuth::class)->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // Profile
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

        // Content Management
        Route::get('/content', [ContentController::class, 'index'])->name('content');
        Route::put('/content', [ContentController::class, 'update'])->name('content.update');

        // Services Management
        Route::resource('services', ServiceController::class)->except(['show']);

        // Social Links Management
        Route::resource('social', SocialLinkController::class)->except(['show']);

        // Messages Management
        Route::resource('messages', MessageController::class)->only(['index', 'show', 'destroy']);

        // Projects Management
        Route::resource('projects', ProjectController::class);
        
        // Project Custom Actions
        Route::controller(ProjectController::class)->prefix('projects')->name('projects.')->group(function () {
            Route::post('/{project}/toggle-featured', 'toggleFeatured')->name('toggle-featured');
            Route::post('/{project}/toggle-active', 'toggleActive')->name('toggle-active');
            Route::post('/{project}/images', 'storeImage')->name('images.store');
            Route::put('/images/{image}', 'updateImage')->name('images.update');
            Route::post('/images/{image}/feature', 'featureImage')->name('images.feature');
            Route::delete('/images/{image}', 'destroyImage')->name('images.destroy');
            Route::get('/image-row/{imageId}', 'getImageRow')->name('image-row');
        });
    });
});
