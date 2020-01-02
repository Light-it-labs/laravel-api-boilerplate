<?php

use App\Http\Controllers\Auth\AuthController;

Route::post('register', [AuthController::class, 'register'])->name('api.register');
Route::post('login', [AuthController::class, 'login'])->name('api.login');
Route::post('logout', [AuthController::class, 'logout'])->name('api.logout');
Route::get('user', [AuthController::class, 'user'])->name('api.user');
