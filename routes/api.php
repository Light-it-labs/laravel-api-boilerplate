<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ExampleController;

/* Auth Routes */
Route::post('login', AuthController::class . '@login');
Route::post('register', AuthController::class . '@register');
Route::middleware('auth:api')->get('user', AuthController::class . '@user');

/* Routes */
Route::apiResource('example', ExampleController::class);

