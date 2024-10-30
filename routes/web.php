<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DimensionsController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\ReviewsController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::middleware(['auth'])->prefix('/dashboard')->group(function() {
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/countries', [DashboardController::class, 'countries']);
    Route::get('/dimensions', [DashboardController::class, 'dimensions']);
    Route::get('/images', [DashboardController::class, 'images']);
    Route::get('/reviews', [DashboardController::class, 'reviews']);

    Route::middleware(['auth'])->prefix('/countries')->group(function() {
        Route::get('/edit/{id}', [CountryController::class, 'edit']);
        Route::post('/edit/post/{id}', [CountryController::class, 'update']);
        Route::get('/delete/{id}', [CountryController::class, 'delete']);
    });

    Route::middleware(['auth'])->prefix('/dimensions')->group(function() {
        Route::get('/edit/{id}', [DimensionsController::class, 'edit']);
        Route::post('/edit/post/{id}', [DimensionsController::class, 'update']);
        Route::get('/delete/{id}', [DimensionsController::class, 'delete']);
    });

    Route::middleware(['auth'])->prefix('/images')->group(function() {
        Route::get('/edit/{id}', [ImagesController::class, 'edit']);
        Route::post('/edit/post/{id}', [ImagesController::class, 'update']);
        Route::get('/delete/{id}', [ImagesController::class, 'delete']);
    });

    Route::middleware(['auth'])->prefix('/reviews')->group(function() {
        Route::get('/edit/{id}', [ReviewsController::class, 'edit']);
        Route::post('/edit/post/{id}', [ReviewsController::class, 'update']);
        Route::get('/delete/{id}', [ReviewsController::class, 'delete']);
    });
});
