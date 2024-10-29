<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CountryController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::middleware(['auth'])->prefix('/dashboard')->group(function() {
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/countries', [DashboardController::class, 'countries']);
    Route::get('/dimensions', [DashboardController::class, 'dimensions']);

    Route::middleware(['auth'])->prefix('/countries')->group(function() {
        Route::get('/edit/{id}', [CountryController::class, 'edit']);
        Route::post('/edit/post/{id}', [CountryController::class, 'update']);
        Route::get('/delete/{id}', [CountryController::class, 'delete']);
    });
});
