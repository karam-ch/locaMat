<?php

use App\Http\Controllers\DeviceController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;

// Device Routes
Route::get('/users', function() {
    return response()->json(['message' => 'This is a test']);
});
Route::post('/devices', [DeviceController::class, 'store']);
Route::get('/devices/{device}', [DeviceController::class, 'show']);
Route::put('/devices/{device}', [DeviceController::class, 'update']);
Route::delete('/devices/{device}', [DeviceController::class, 'destroy']);

// Login Routes
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

// User Routes
Route::get('/users', [UserController::class, 'list']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/{user}', [UserController::class, 'show']);
Route::put('/users/{user}', [UserController::class, 'update']);
Route::delete('/users/{user}', [UserController::class, 'destroy']);

