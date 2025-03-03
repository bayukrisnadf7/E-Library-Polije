<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::middleware('api')->group(function () {
    Route::post('/register', [AuthenticationController::class, 'register']);
});

