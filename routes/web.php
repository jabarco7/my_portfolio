<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

Route::get('/', function () {
    return view('home');
})->name('home');

// Contact form routes
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Additional routes (can be expanded later)
Route::get('/about', function () {
    return view('home'); // For now, redirect to home with anchor
})->name('about');

Route::get('/services', function () {
    return view('home'); // For now, redirect to home with anchor
})->name('services');

Route::get('/portfolio', function () {
    return view('home'); // For now, redirect to home with anchor
})->name('portfolio');
