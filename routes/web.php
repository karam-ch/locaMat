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
    return redirect()->to('/login');
});

Route::get('/deploy', function () {
    return shell_exec('cd /var/www/html/locamat && chmod +x update.sh && ./update.sh');
});

// Login
Route::get('/login', [LoginController::class, 'loginG'])->name('login');
Route::post('/login', [LoginController::class, 'loginP']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/reset', [LoginController::class, 'resetG']);
    Route::post('/reset', [LoginController::class, 'resetP']);

    // Device
    Route::get('/device/list', [DeviceController::class, 'list']);
    Route::get('/device/add', [DeviceController::class, 'addG'])->middleware('admin');
    Route::post('/device/add', [DeviceController::class, 'addP'])->middleware('admin');
    Route::get('/device/{id}/edit', [DeviceController::class, 'editG'])->where('id', '[0-9]+')->middleware('admin');
    Route::post('/device/{id}/edit', [DeviceController::class, 'editP'])->where('id', '[0-9]+')->middleware('admin');
    Route::post('/device/{id}/delete', [DeviceController::class, 'delete'])->where('id', '[0-9]+')->middleware('admin');
    Route::post('/device/{id}/borrow', [DeviceController::class, 'borrow'])->where('id', '[0-9]+');
    Route::post('/device/{id}/return', [DeviceController::class, 'returnP'])->where('id', '[0-9]+');
    Route::get('/device/{id}', [DeviceController::class,'show'])->where('id', '[0-9]+');

    // User
    Route::get('/user/add', [UserController::class, 'addG'])->middleware('admin');
    Route::post('/user/add', [UserController::class, 'addP'])->middleware('admin');
    Route::get('/user/list', [UserController::class, 'list'])->middleware('admin');
    Route::get('/user/me', [UserController::class, 'me']);
    Route::get('/user/{id}/edit', [UserController::class, 'editG'])->where('id', '[0-9]+')->middleware('admin');
    Route::post('/user/{id}/edit', [UserController::class, 'editP'])->where('id', '[0-9]+')->middleware('admin');
    Route::post('/user/{id}/delete', [UserController::class, 'delete'])->where('id', '[0-9]+')->middleware('admin');
    Route::get('/user/{id}', [UserController::class, 'show'])->where('id', '[0-9]+')->middleware('admin');

    // Home
    Route::get('/home', function () {
        return view('home');
    });
});
