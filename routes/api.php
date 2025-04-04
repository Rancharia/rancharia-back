<?php

use App\Http\Controllers\{AuthController,UserController, ProductController};
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::prefix('user')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [UserController::class, 'userLogged']);
});
Route::prefix('product')->middleware('auth:sanctum')->group(function () {
    Route::post('/', [ProductController::class, 'create']);
    Route::get('/show/{id}', [ProductController::class, 'show']);
    Route::put('/edit/{id}', [ProductController::class, 'update']); 
    Route::get('/all', [ProductController::class, 'index']);
});
