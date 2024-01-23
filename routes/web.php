<?php

use App\Http\Controllers\DeviceController;
use App\Http\Controllers\LoginController;
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
Route::get('/device/add', [DeviceController::class, 'addG']);
Route::post('/device/add', [DeviceController::class, 'addP']);

// Home
Route::get('/home', function () {
    return view('home');
});
