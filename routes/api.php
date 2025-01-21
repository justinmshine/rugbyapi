<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\ApiController;
use App\Http\Controllers\API\PrizeController;

Route::controller(RegisterController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});

Route::middleware('auth:sanctum')->group( function () {
    Route::resource('shirts', ApiController::class);
});

Route::middleware('auth:sanctum')->group( function () {
    Route::resource('draw', PrizeController::class);
});