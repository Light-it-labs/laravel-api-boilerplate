<?php

use App\Http\Controllers\Auth\AuthController;

Route::post('register', [AuthController::class, 'register'])->name('api.register');
Route::post('login', [AuthController::class, 'login'])->name('api.login');
Route::post('logout', [AuthController::class, 'logout'])->name('api.logout');
Route::post('reset', [AuthController::class, 'reset'])->name('api.reset');
Route::post('reset/{token}', [AuthController::class, 'resetPassword'])->name('api.reset-password');
Route::get('user', [AuthController::class, 'user'])->name('api.user');
