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