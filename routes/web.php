<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KunjunganController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [AuthenticationController::class, 'indexLogin']);
Route::get('/register', [AuthenticationController::class, 'indexRegister']);
Route::get('/kunjungan', [KunjunganController::class, 'index']);
Route::middleware('api')->group(function () {
    Route::post('/register', [AuthenticationController::class, 'register']);
});

