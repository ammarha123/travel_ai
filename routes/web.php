<?php

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

// Login Routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.submit');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Registration Routes
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register'])->name('register.submit');

//Trip Planer Routes
Route::get('/trip-planner', [TripPlannerController::class, 'index'])->name('trip-planner.index');
Route::post('/trip-planner', [TripPlannerController::class, 'store'])->name('trip-planner.store');

Route::get('discover', [DiscoverController::class, 'index'])->name('discover');

//Help Routes
Route::get('/help', [HelpController::class, 'index'])->name('help.index');
Route::post('/help', [HelpController::class, 'storeMessage'])->name('help.storeMessage');

Route::get('profile', [ProfileController::class, 'index'])->name('profile');