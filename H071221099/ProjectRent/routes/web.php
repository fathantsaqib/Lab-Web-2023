<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;


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


Route::prefix('admin')->middleware(['auth', 'is_admin']) -> group(function(){
    Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard.index');
    Route::resource('cars', \App\Http\Controllers\Admin\CarController::class);
    Route::put('cars/update-image/{id}', [\App\Http\Controllers\Admin\CarController::class, 'updateImage'])->name('cars.updateImage');
// Rute untuk meng-update status mobil dari halaman admin
    // Route::patch('cars/{car}/update-status', [CarController::class, 'updateStatus'])->name('cars.updateStatus');


    Route::get('messages', [\App\Http\Controllers\Admin\MessageController::class, 'index'])->name('admin.messages.index');
    // Route::patch('messages/{message}', [\App\Http\Controllers\Admin\MessageController::class, 'update'])->name('messages.update');
    Route::delete('messages/{message}', [\App\Http\Controllers\Admin\MessageController::class, 'destroy'])->name('messages.destroy');
    Route::get('payments', [\App\Http\Controllers\Admin\PaymentController::class, 'index'])->name('admin.payments.index');
    Route::put('payment/{payment}/approve', [\App\Http\Controllers\Admin\PaymentController::class, 'approvePayment'])->name('admin.payment.approve');
    Route::put('payment/{payment}/reject', [\App\Http\Controllers\Admin\PaymentController::class, 'rejectPayment'])->name('admin.payment.reject');
    Route::delete('payments/{payment}', [\App\Http\Controllers\Admin\PaymentController::class, 'destroy'])->name('payments.destroy');
});


Route::get('/user/profile', [\App\Http\Controllers\User\UserController::class, 'profile'])->name('user.profile');
Route::post('/user/profile/update', [\App\Http\Controllers\User\UserController::class, 'updateProfile'])->name('user.profile.update');
Route::get('/user/car', [App\Http\Controllers\User\UserController::class, 'car'])->name('user.car');
Route::get('/user/driver', [App\Http\Controllers\User\UserController::class, 'driver'])->name('user.driver');
Route::resource('admin/drivers', \App\Http\Controllers\Admin\DriverController::class);
Route::put('admin/drivers/update-image/{id}', [\App\Http\Controllers\Admin\DriverController::class, 'updateImage'])->name('admin.drivers.updateImage'); 
Route::get('payment', [\App\Http\Controllers\User\UserController::class, 'payment'])->name('payment');
Route::post('payment', [\App\Http\Controllers\User\UserController::class, 'paymentStore'])->name('payment.store');


Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('homepage');
Route::get('detail/{car:slug}', [\App\Http\Controllers\User\UserController::class, 'detail'])->name('detail');
Route::get('contact', [\App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::post('contact', [\App\Http\Controllers\HomeController::class, 'contactStore'])->name('contact.store');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/car', [App\Http\Controllers\CarController::class, 'index'])->name('car');
Route::get('/driver', [App\Http\Controllers\DriverController::class, 'index'])->name('driver');


// Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('index');
Route::get('/user', [App\Http\Controllers\User\UserController::class, 'index'])->name('user.index');
// Route::get('/user/cars', [UserController::class, 'car'])->name('user.car');
// Route::get('/user/drivers', [UserController::class, 'drivers'])->name('user.driver');
// Route::get('detail/{car:slug}', [UserController::class, 'detail'])->name('user.detail');
// Route::get('payment', [UserController::class, 'payment'])->name('payment');
// Route::post('payment', [UserController::class, 'paymentStore'])->name('payment.store');
// Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile');
// Route::post('/user/profile/update', [UserController::class, 'updateProfile'])->name('user.profile.update');
// Route::get('user/search', [UserController::class, 'search'])->name('user.search');


Auth::routes();

