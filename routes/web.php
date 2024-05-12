<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DiscoverController as AdminDiscoverController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Frontend\DiscoverController;
use App\Http\Controllers\Frontend\HelpController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\TripPlannerController;

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

Route::get('/',[App\Http\Controllers\FrontendController::class, 'index'] );
Route::get('/admin/dashboard', [DashboardController::class, 'index']);

//User Routes
// Login Routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.submit');
Route::get('/auth/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/auth/google/callback', [LoginController::class, 'handleGoogleCallback']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Registration Routes
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register'])->name('register.submit');

//Trip Planer Routes
Route::get('/trip-planner', [TripPlannerController::class, 'index'])->name('trip-planner.index');
Route::post('/trip-planner', [TripPlannerController::class, 'store'])->name('trip-planner.store');
// Route::get('/trip-planner/result', [TripPlannerController::class, 'result'])->name('trip-planner.result');
Route::get('/autocomplete/city', [TripPlannerController::class, 'autocompleteCity'])->name('autocomplete.city');

//Discover Routes
Route::get('/discover', [DiscoverController::class, 'index'])->name('discover.index');
Route::get('discover/details/{slang}', [DiscoverController::class, 'showDetails'])->name('city.details');

//Help Routes
Route::get('/help', [HelpController::class, 'index'])->name('help.index');
Route::post('/help', [HelpController::class, 'storeMessage'])->name('help.storeMessage');

Route::get('profile', [ProfileController::class, 'index'])->name('profile');

//Admin Routes
//Admin Discover Routes
Route::get('/admin/dashboard/discover', [AdminDiscoverController::class, 'index'])->name('admin.discover.index');
// Create a city (Display create form and store new city)
Route::get('/admin/dashboard/discover/create', [AdminDiscoverController::class, 'create'])->name('discover.create');
Route::post('/admin/dashboard/discover', [AdminDiscoverController::class, 'store'])->name('discover.store');

// Edit a city (Display edit form and update city)
Route::get('/admin/dashboard/discover/{city}/edit', [AdminDiscoverController::class, 'edit'])->name('discover.edit');
Route::put('/admin/dashboard/discover/{city}', [AdminDiscoverController::class, 'update'])->name('discover.update');

// Delete a city
Route::delete('/admin/dashboard/discover/{city}', [AdminDiscoverController::class, 'destroy'])->name('discover.destroy');

Route::get('/test-gemini', [App\Http\Controllers\GeminiController::class, 'test'])->name('test.gemini');