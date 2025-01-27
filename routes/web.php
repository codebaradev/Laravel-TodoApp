<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodoController;
use App\Http\Middleware\MustLoginMiddleware;
use App\Http\Middleware\MustNotLoginMiddleware;
use App\Http\Middleware\MustTodoOwnerMiddleware;
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

// Todos

Route::middleware([MustLoginMiddleware::class])->group(function () {
        Route::get('/todo/add', function () {return redirect('/dashboard');});
        Route::post('/todo/add', [TodoController::class, 'postAdd']);

        Route::middleware([MustTodoOwnerMiddleware::class])->group(function () {
                Route::get('/todos/{todo_id}', [TodoController::class, 'edit'])->where('todo_id', '[0-9]+');
                Route::post('/todos/{todo_id}', [TodoController::class, 'postEdit'])->where('todo_id', '[0-9]+');
        });
        
        Route::get('/todo/delete', function () {return redirect('/dashboard');});
        Route::post('/todo/delete', [TodoController::class, 'postDelete']);
});
