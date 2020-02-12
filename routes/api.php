<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ExampleController;

/* Auth Routes */
Route::post('login', AuthController::class . '@login')->name('api.login');
Route::post('register', AuthController::class . '@register')->name('api.register');
Route::middleware('auth:api')->get('user', AuthController::class . '@user')->name('api.user');

/* Routes */
Route::get('example', ExampleController::class . '@index')->name('api.example');
