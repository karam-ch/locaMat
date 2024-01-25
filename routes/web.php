<?php

use App\Http\Controllers\DeviceController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});

Route::get('/deploy', function () {
    return shell_exec('cd /var/html/www/html/locamat && git reset --hard HEAD && git pull');
});

// Login
Route::get('/login', [LoginController::class, 'loginG']);
Route::post('/login', [LoginController::class, 'loginP']);
Route::get('/reset', [LoginController::class, 'resetG']);
Route::post('/reset', [LoginController::class, 'resetP']);

// Device
Route::get('/device/list', [DeviceController::class, 'list']);
Route::get('/device/add', [DeviceController::class, 'addG']);
Route::post('/device/add', [DeviceController::class, 'addP']);
Route::get('/device/{id}/edit', [DeviceController::class, 'editG'])->where('id', '[0-9]+');
Route::post('/device/{id}/edit', [DeviceController::class, 'editP'])->where('id', '[0-9]+');
Route::post('/device/{id}/delete', [DeviceController::class, 'delete'])->where('id', '[0-9]+');
Route::post('/device/{id}/borrow', [DeviceController::class, 'borrow'])->where('id', '[0-9]+');
Route::post('/device/{id}/return', [DeviceController::class, 'returnP'])->where('id', '[0-9]+');
Route::get('/device/{id}', [DeviceController::class,'show'])->where('id', '[0-9]+');

// User
Route::get('/user/add', [UserController::class, 'addG']);
Route::post('/user/add', [UserController::class, 'addP']);
Route::get('/user/list', [UserController::class, 'list']);
Route::get('/user/me', [UserController::class, 'me']);
Route::get('/user/{id}/edit', [UserController::class, 'editG'])->where('id', '[0-9]+');
Route::post('/user/{id}/edit', [UserController::class, 'editP'])->where('id', '[0-9]+');
Route::post('/user/{id}/delete', [UserController::class, 'delete'])->where('id', '[0-9]+');
Route::get('/user/{id}', [UserController::class, 'show'])->where('id', '[0-9]+');

// Home
Route::get('/home', function () {
    return view('home');
});
