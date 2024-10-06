<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::controller(CategoryController::class)->middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::resource('categories', CategoryController::class)->except('show');
});
