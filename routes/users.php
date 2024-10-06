<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)->middleware(['auth', 'verified', 'admin'])->prefix('users')->name('users.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::patch('/{user}/ban', 'ban')->name('ban');
    Route::patch('/{user}/unban', 'unban')->name('unban');
    Route::delete('/{user}', 'destroy')->name('destroy');
});
