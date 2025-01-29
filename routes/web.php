<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DimensionsController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\ScanController;
use App\Http\Controllers\ShirtsController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\DrawController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::middleware(['auth'])->prefix('/dashboard')->group(function() {
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/countries', [DashboardController::class, 'countries']);
    Route::get('/dimensions', [DashboardController::class, 'dimensions']);
    Route::get('/stock', [DashboardController::class, 'stock']);
    Route::get('/images', [DashboardController::class, 'images']);
    Route::get('/reviews', [DashboardController::class, 'reviews']);
    Route::get('/scan', [DashboardController::class, 'scan']);
    Route::get('/shirts', [DashboardController::class, 'shirts']);
    Route::get('/sales', [DashboardController::class, 'sales']);
    Route::get('/prizedraw', [DashboardController::class, 'prizedraw']);

    Route::middleware(['auth'])->prefix('/countries')->group(function() {
        Route::get('/edit/{id}', [CountryController::class, 'edit']);
        Route::post('/edit/post/{id}', [CountryController::class, 'update']);
        Route::get('/delete/{id}', [CountryController::class, 'delete']);
        Route::get('/add', [CountryController::class, 'add']);
        Route::post('/add/post', [CountryController::class, 'insert']);
    });

    Route::middleware(['auth'])->prefix('/dimensions')->group(function() {
        Route::get('/edit/{id}', [DimensionsController::class, 'edit']);
        Route::post('/edit/post/{id}', [DimensionsController::class, 'update']);
        Route::get('/delete/{id}', [DimensionsController::class, 'delete']);
        Route::get('/add', [DimensionsController::class, 'add']);
        Route::post('/add/post', [DimensionsController::class, 'insert']);
    });

    Route::middleware(['auth'])->prefix('/images')->group(function() {
        Route::get('/edit/{id}', [ImagesController::class, 'edit']);
        Route::post('/edit/post/{id}', [ImagesController::class, 'update']);
        Route::get('/delete/{id}', [ImagesController::class, 'delete']);
        Route::get('/add', [ImagesController::class, 'add']);
        Route::post('/add/post', [ImagesController::class, 'insert']);
    });

    Route::middleware(['auth'])->prefix('/reviews')->group(function() {
        Route::get('/edit/{id}', [ReviewsController::class, 'edit']);
        Route::post('/edit/post/{id}', [ReviewsController::class, 'update']);
        Route::get('/delete/{id}', [ReviewsController::class, 'delete']);
        Route::get('/add', [ReviewsController::class, 'add']);
        Route::post('/add/post', [ReviewsController::class, 'insert']);
    });

    Route::middleware(['auth'])->prefix('/scan')->group(function() {
        Route::get('/edit/{id}', [ScanController::class, 'edit']);
        Route::post('/edit/post/{id}', [ScanController::class, 'update']);
        Route::get('/delete/{id}', [ScanController::class, 'delete']);
        Route::get('/add', [ScanController::class, 'add']);
        Route::post('/add/post', [ScanController::class, 'insert']);
    });

    Route::middleware(['auth'])->prefix('/shirts')->group(function() {
        Route::get('/edit/{id}', [ShirtsController::class, 'edit']);
        Route::post('/edit/post/{id}', [ShirtsController::class, 'update']);
        Route::get('/delete/{id}', [ShirtsController::class, 'delete']);
        Route::get('/add', [ShirtsController::class, 'add']);
        Route::post('/add/post', [ShirtsController::class, 'insert']);
    });

    Route::middleware(['auth'])->prefix('/stock')->group(function() {
        Route::get('/edit/{id}', [StockController::class, 'edit']);
        Route::post('/edit/post/{id}', [StockController::class, 'update']);
        Route::get('/delete/{id}', [StockController::class, 'delete']);
        Route::get('/add', [StockController::class, 'add']);
        Route::post('/add/post', [StockController::class, 'insert']);
    });
});

Route::middleware(['auth'])->prefix('/prizedraw')->group(function() {
    Route::post('/rundraw', [DrawController::class, 'rundraw']);
});