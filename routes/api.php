<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;


Route::middleware('guest:api')->group(function () {
     Route::post('/login', [AuthController::class, 'login']);
     Route::post('/register', [AuthController::class, 'register']);

});
Route::middleware('auth:sanctum')->group(function () {

    Route::controller(CategoryController::class)->group(function () {
        Route::get('/categories', 'index');
        Route::get('/categories/{id}', 'show');
        Route::post('/categories', 'store');
        Route::put('/categories/{id}', 'update');
        Route::delete('/categories/{id}', 'destroy');
    });

});


