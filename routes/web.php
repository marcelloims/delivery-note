<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Product\ProductController;
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
    return view('login');
})->name('login');

Route::post('/auth/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/auth/logout', [AuthController::class, 'logout']);

    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::get('/customer', [CustomerController::class, 'index']);
    Route::post('/customer/add', [CustomerController::class, 'store']);
    Route::get('/customer/edit/{param}', [CustomerController::class, 'edit']);
    Route::post('/customer/update/{param}', [CustomerController::class, 'update']);
    Route::get('/customer/delete/{param}', [CustomerController::class, 'destroy']);

    Route::get('/product', [ProductController::class, 'index']);
    Route::post('/product/add', [ProductController::class, 'store']);
    Route::get('/product/edit/{param}', [ProductController::class, 'edit']);
    Route::post('/product/update/{param}', [ProductController::class, 'update']);
    Route::get('/product/delete/{param}', [ProductController::class, 'destroy']);
});
