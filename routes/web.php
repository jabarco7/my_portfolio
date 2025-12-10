<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Middleware\AdminAuth;

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

Route::get('/', [App\Http\Controllers\PageController::class, 'home'])->name('home');

// Projects routes
Route::get('/projects', [App\Http\Controllers\PageController::class, 'projects'])->name('projects');
Route::get('/projects/{slug}', [App\Http\Controllers\PageController::class, 'show'])->name('projects.show');

// About page
Route::get('/about', [App\Http\Controllers\PageController::class, 'about'])->name('about');

// Skills page
Route::get('/skills', [App\Http\Controllers\PageController::class, 'skills'])->name('skills');

// Certificates page
Route::get('/certificates', [App\Http\Controllers\PageController::class, 'certificates'])->name('certificates');

// Contact page
Route::get('/contact', [App\Http\Controllers\PageController::class, 'contact'])->name('contact');

// Contact form route (only POST for the form submission)
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Authentication routes
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Protected admin routes
    Route::middleware(AdminAuth::class)->group(function () {
        // Dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // Profile management
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

        // Site content management
        Route::get('/content', [AdminController::class, 'content'])->name('content');
        Route::put('/content', [AdminController::class, 'updateContent'])->name('content.update');

        // Contact messages
        Route::get('/messages', [AdminController::class, 'messages'])->name('messages');
        Route::get('/messages/{id}', [AdminController::class, 'showMessage'])->name('messages.show');
        Route::put('/messages/{id}/mark-read', [AdminController::class, 'markAsRead'])->name('messages.mark-read');
        Route::post('/messages/{id}/reply', [AdminController::class, 'replyToMessage'])->name('messages.reply');
        Route::delete('/messages/{id}', [AdminController::class, 'deleteMessage'])->name('messages.delete');

        // Social links
        Route::get('/social', [AdminController::class, 'social'])->name('social');
        Route::put('/social', [AdminController::class, 'updateSocial'])->name('social.update');

        // Projects
        Route::get('/projects', [\App\Http\Controllers\Admin\ProjectController::class, 'index'])->name('projects');
        Route::get('/projects/create', [\App\Http\Controllers\Admin\ProjectController::class, 'create'])->name('projects.create');
        Route::post('/projects', [\App\Http\Controllers\Admin\ProjectController::class, 'store'])->name('projects.store');
        Route::get('/projects/{project}', [\App\Http\Controllers\Admin\ProjectController::class, 'show'])->name('projects.show');
        Route::get('/projects/{project}/edit', [\App\Http\Controllers\Admin\ProjectController::class, 'edit'])->name('projects.edit');
        Route::put('/projects/{project}', [\App\Http\Controllers\Admin\ProjectController::class, 'update'])->name('projects.update');
        Route::delete('/projects/{project}', [\App\Http\Controllers\Admin\ProjectController::class, 'destroy'])->name('projects.destroy');
        Route::post('/projects/{project}/toggle-featured', [\App\Http\Controllers\Admin\ProjectController::class, 'toggleFeatured'])->name('projects.toggle-featured');
        Route::post('/projects/{project}/toggle-active', [\App\Http\Controllers\Admin\ProjectController::class, 'toggleActive'])->name('projects.toggle-active');
        Route::post('/projects/{project}/images', [\App\Http\Controllers\Admin\ProjectController::class, 'storeImage'])->name('projects.images.store');
        Route::put('/projects/images/{image}', [\App\Http\Controllers\Admin\ProjectController::class, 'updateImage'])->name('projects.images.update');
        Route::post('/projects/images/{image}/feature', [\App\Http\Controllers\Admin\ProjectController::class, 'featureImage'])->name('projects.images.feature');
        Route::delete('/projects/images/{image}', [\App\Http\Controllers\Admin\ProjectController::class, 'destroyImage'])->name('projects.images.destroy');
        Route::get('/projects/image-row/{imageId}', [\App\Http\Controllers\Admin\ProjectController::class, 'getImageRow'])->name('projects.image-row');
    });
});