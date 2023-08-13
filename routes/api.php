<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TasksController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// -------------Authentication routes-----------------------------------
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

// -------------Task management routes----------------------------------
Route::middleware('auth:api')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('tasks', [TasksController::class, 'index']);
    Route::post('tasks', [TasksController::class, 'store']);
    Route::put('tasks/{task}', [TasksController::class, 'update']);
    Route::delete('tasks/{taskId}', [TasksController::class, 'destroy']);
});
