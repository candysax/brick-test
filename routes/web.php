<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EventController::class, 'index'])->name('events.index');
Route::redirect('/events', '/');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('verified')->group(function () {
        Route::middleware('admin')->group(function () {
            Route::resource('events', EventController::class)->except('index', 'show');
            Route::delete('/events/{event}/remove-user', [EventController::class, 'removeUser'])->name('events.remove-user');
            Route::patch('/events/{event}/toggle', [EventController::class, 'toggle'])->name('events.toggle');
        });

        Route::post('/events/{event}/join', [EventController::class, 'join'])->name('events.join');
        Route::delete('/events/{event}/leave', [EventController::class, 'leave'])->name('events.leave');

        Route::get('/my-events', [EventController::class, 'indexPersonal'])->name('events.index.personal');
    });
});

Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show')->middleware('hidden');

require __DIR__.'/auth.php';
