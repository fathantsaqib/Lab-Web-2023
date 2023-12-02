<?php

use App\Http\Controllers\ProductController;
use Illuminate\Database\Query\IndexHint;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('product', ProductController::class);
Route::get('/product/{id}/details', [ProductController::class, 'show']);

// Route get => product => index
// Route get => product/create => create
// Route post => product => store
// Route get => product/{id} => show
// Route put => product/{id} => update
// Route delete => product/{id} => delete
// Route get => product/{id}/edit => edit