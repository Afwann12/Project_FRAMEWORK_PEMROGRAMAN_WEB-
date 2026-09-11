<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user/{id}', function ($id) {
    return 'id user:' .$id;
}) ->where('id', '[0-9]+');

use App\Http\Dashboard\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');



Route::get('/about', function () {
    return 'Toko Maju Jaya adalah toko yang menyediakan berbagai kebutuhan sehari-hari dengan pelayanan yang cepat dan terpercaya.';
});

use App\Http\Controllers\UserController;

Route::middleware(['auth', 'role: admin'])->group(function () {
    Route::resource('/users', UserController::class);
});

use App\Http\Controllers\Auth\LoginController;
 
Route::get('/login', [LoginController::class, 'create'])
    ->middleware('guest')
    ->name('login');
 
Route::post('/login', [LoginController::class, 'store'])
    ->middleware('guest')
    ->name('login.store');
 
Route::post('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::get('/reports/sales', [ReportController::class, 'sales'])->name('report.sales');
});
 
Route::middleware(['auth', 'role:admin,kasir'])->group(function () {
    Route::get('/pos', [PosController::class, 'index'])->name('pos.index');
    Route::post('/pos', [PosController::class, 'store'])->name('pos.store');
});