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
use App\Http\Controllers\Admin\SkillController;

use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\CertificateCategoryController;
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

    Route::get('/certificate/{id}', 'certificate')->name('certificate');
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

        // Home Page Management
        Route::get('/content/home', [ContentController::class, 'home'])->name('content.home');
        Route::put('/content/home', [ContentController::class, 'updateHome'])->name('content.home.update');

        // Services Management
        Route::resource('services', ServiceController::class)->except(['show']);

        // Skills Management
        Route::resource('skills', SkillController::class)->except(['show']);

        // Certificates Management
        Route::resource('certificates', CertificateController::class);

        // Certificate Custom Actions
        Route::post('certificates/{certificate}/toggle-active', [CertificateController::class, 'toggleActive'])->name('certificates.toggle-active');

        // Certificate Categories Management
        Route::resource('certificate-categories', CertificateCategoryController::class);

        // Certificate Category Custom Actions
        Route::post('certificate-categories/{certificateCategory}/toggle-active', [CertificateCategoryController::class, 'toggleActive'])->name('certificate-categories.toggle-active');

        // Social Links Management
        Route::resource('social', SocialLinkController::class)->except(['show']);

        // Messages Management
        Route::resource('messages', MessageController::class)->only(['index', 'show', 'destroy']);

        // Message Custom Actions
        Route::controller(MessageController::class)->prefix('messages')->name('messages.')->group(function () {
            Route::get('/new', 'getNewMessages')->name('new');
            Route::post('/{message}/mark-read', 'markAsRead')->name('mark-read');
            Route::post('/mark-all-read', 'markAllAsRead')->name('mark-all-read');
            Route::post('/{message}/reply', 'reply')->name('reply');
        });

        // Projects Management
        Route::resource('projects', ProjectController::class);

        // About Page Management
        Route::get('/about', [ContentController::class, 'aboutIndex'])->name('about.index');
        Route::put('/about', [ContentController::class, 'aboutUpdate'])->name('about.update');

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