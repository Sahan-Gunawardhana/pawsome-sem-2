<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/login', [AuthController::class,'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::apiResource('products', ProductController::class);

Route::middleware('auth:sanctum')->group(function(){
    Route::apiResource('appointment', AppointmentController::class);
    Route::apiResource('orders', OrderController::class);
    Route::apiResource('boxes', BoxController::class);
    Route::apiResource('users', UserController::class);
});

