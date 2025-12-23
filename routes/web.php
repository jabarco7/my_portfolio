<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;

// Admin Controllers
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\CertificateCategoryController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\SettingsController;

use App\Http\Middleware\AdminAuth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::controller(PageController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/projects', 'projects')->name('projects');
    Route::get('/projects/{slug}', 'show')->name('projects.show');
    Route::get('/about', 'about')->name('about');
    Route::get('/skills', 'skills')->name('skills');
    Route::get('/certificates', 'certificates')->name('certificates');
    Route::get('/certificate/{id}', 'certificate')->name('certificate');
    Route::get('/certificates/load-more', 'loadMoreCertificates')->name('certificates.loadMore');
    Route::get('/contact', 'contact')->name('contact');
});

/*
|--------------------------------------------------------------------------
| Contact Form
|--------------------------------------------------------------------------
*/
Route::post('/contact', [ContactController::class, 'store'])
    ->name('contact.store')
    ->middleware('throttle:50,1');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Authentication
    |--------------------------------------------------------------------------
    */
    Route::middleware('throttle:50,1')->group(function () {
        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    });

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    /*
    |--------------------------------------------------------------------------
    | Protected Admin Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware(AdminAuth::class)->group(function () {

        // Dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // Profile
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
        
        // Settings
        Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
        Route::put('/settings', [SettingsController::class, 'update'])->name('settings.update');

        // Content Management
        Route::get('/content', [ContentController::class, 'index'])->name('content');
        Route::put('/content', [ContentController::class, 'update'])->name('content.update');

        // Home Page Content
        Route::get('/content/home', [ContentController::class, 'home'])->name('content.home');
        Route::put('/content/home', [ContentController::class, 'updateHome'])->name('content.home.update');

        // About Page Content
        Route::get('/about', [ContentController::class, 'aboutIndex'])->name('about.index');
        Route::put('/about', [ContentController::class, 'aboutUpdate'])->name('about.update');

        // Services
        Route::resource('services', ServiceController::class)->except(['show']);

        // Skills
        Route::resource('skills', SkillController::class)->except(['show']);

        // Skills Page Content
        Route::get('skills-page-content', [\App\Http\Controllers\Admin\SkillsPageContentController::class, 'index'])
            ->name('skills-page-content');
        Route::put('skills-page-content', [\App\Http\Controllers\Admin\SkillsPageContentController::class, 'update'])
            ->name('skills-page-content.update');

        // Project Detail Page Content
        Route::get('project-detail-content', [\App\Http\Controllers\Admin\ProjectDetailContentController::class, 'index'])
            ->name('project-detail-content');
        Route::put('project-detail-content', [\App\Http\Controllers\Admin\ProjectDetailContentController::class, 'update'])
            ->name('project-detail-content.update');

        // Projects
        Route::resource('projects', ProjectController::class);

        // Project Custom Actions
        Route::controller(ProjectController::class)
            ->prefix('projects')
            ->name('projects.')
            ->group(function () {
                Route::post('{project}/toggle-featured', 'toggleFeatured')->name('toggle-featured');
                Route::post('{project}/toggle-active', 'toggleActive')->name('toggle-active');
                Route::post('{project}/images', 'storeImage')->name('images.store');
                Route::put('images/{image}', 'updateImage')->name('images.update');
                Route::post('images/{image}/feature', 'featureImage')->name('images.feature');
                Route::delete('images/{image}', 'destroyImage')->name('images.destroy');
                Route::get('image-row/{imageId}', 'getImageRow')->name('image-row');
            });

        // Certificates
        Route::resource('certificates', CertificateController::class);
        Route::post('certificates/{certificate}/toggle-active',
            [CertificateController::class, 'toggleActive']
        )->name('certificates.toggle-active');

        // Certificate Categories
        Route::resource('certificate-categories', CertificateCategoryController::class);
        Route::post('certificate-categories/{certificateCategory}/toggle-active',
            [CertificateCategoryController::class, 'toggleActive']
        )->name('certificate-categories.toggle-active');

        // Social Links
        Route::resource('social', SocialLinkController::class)->except(['show']);

        // Messages
        Route::controller(MessageController::class)
            ->prefix('messages')
            ->name('messages.')
            ->group(function () {
                Route::get('/new', 'getNewMessages')->name('new');
                Route::post('{message}/mark-read', 'markAsRead')->name('mark-read');
                Route::post('mark-all-read', 'markAllAsRead')->name('mark-all-read');
                Route::post('{message}/reply', 'reply')->name('reply');
            });

        Route::resource('messages', MessageController::class)
            ->only(['index', 'show', 'destroy']);
    });
});