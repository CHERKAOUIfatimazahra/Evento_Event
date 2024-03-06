<?php


use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StaticController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Home page
Route::get('/', [HomeController::class, 'index']);

// find event pages
Route::view('/find-event', 'find-event');

// Contact page
Route::view('/contact', 'contact');

// single pages
Route::view('/business', 'page-categories.business');

// Authentication routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login.index');
    Route::get('/register', [AuthController::class, 'create'])->name('register.index');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');

    // Password reset routes
    Route::get('/forgot-password', [AuthController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
});

Route::group(['middleware' => ['auth', 'role:admin']], function() {
    Route::resource('users',UserController::class);
    Route::resource('categories',CategoryController::class);
    Route::get('/statistique',[StaticController::class, 'statisTotal']);
    Route::put("/changePublishedStatus/{event}",[EventController::class,"publicEvent"])->name("changePublishedStatus");
});

Route::group(['middleware' => ['auth', 'role:organizer']], function() {
    Route::get('/static-reservation',[StaticController::class, 'reservationStatique']);
});


Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::view('/profile','dashbord.profile');
    Route::resource('events',EventController::class);
});