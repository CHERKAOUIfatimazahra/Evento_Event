<?php


use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StaticController;
use App\Http\Controllers\TicketController;
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
    Route::get('/single_page/{event}', [HomeController::class, 'eventShow'])->name('events.eventShow');
    
    // find event pages
    Route::get('/find-event', [HomeController::class,'findEvent']);
    Route::get('/filter',[SearchController::class,'index']);
    Route::get('/search', [SearchController::class, 'search']); 
    // Route::get('/search/{ids}', [SearchController::class, 'filterByCategory']);

    // Contact page
    Route::view('/contact', 'contact');
    // single pages
    Route::view('/business', 'page-categories.business');

    Route::get('/login', [AuthController::class, 'index'])->name('login.index');
    Route::get('/register', [AuthController::class, 'create'])->name('register.index');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');

    // Password reset routes
    Route::get('/forgot-password', [AuthController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');


Route::group(['middleware' => ['auth', 'role:admin']], function() {
    Route::resource('users',UserController::class);
    Route::resource('categories',CategoryController::class);
    Route::get('events.index',[EventController::class, 'index']);
    Route::get('/statistique',[StaticController::class, 'statisTotal']);
    Route::put("/changePublishedStatus/{event}",[EventController::class,"publicEvent"])->name("changePublishedStatus");  
});

Route::group(['middleware' => ['auth', 'role:organizer']], function() {
    Route::resource('events',EventController::class);
    Route::get('/static-reservation',[StaticController::class, 'reservationStatique']);
    Route::get('/events/{eventId}/reservations', [ReservationController::class, 'index'])->name('events.reservations.index');
    Route::put('/reservation/{id}/update-status', [ReservationController::class, 'updateStatus'])->name('reservations.updateStatus');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::view('/profile','dashbord.profile');
    Route::post('/events/{eventId}/reserve', [ReservationController::class, 'reservation'])->name('events.reserve');
    Route::get('/user/{userId}/reservations', [TicketController::class, 'showReservations'])->name('user.reservations');
    Route::get('/user/{userId}/reservation/{reservationId}', [TicketController::class, 'userReservations'])->name('user.reservation.details');
});