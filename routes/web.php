<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\MustLoginMiddleware;
use App\Http\Middleware\MustNotLoginMiddleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// home

Route::get('/', [HomeController::class, 'index'])->middleware([MustNotLoginMiddleware::class]);
Route::get('/dashboard', [HomeController::class, 'dashboard'])->middleware([MustLoginMiddleware::class]);

// Auth

Route::middleware([MustNotLoginMiddleware::class])->group(function () {
        Route::get('/auth/register', [AuthController::class, 'register']);
        Route::post('/auth/register', [AuthController::class, 'postRegister']);
        Route::get('/auth/login', [AuthController::class, 'login']);
        Route::post('/auth/login', [AuthController::class, 'postLogin']);
});

Route::get('/auth/logout', [AuthController::class, 'logout'])->middleware([MustLoginMiddleware::class]);

