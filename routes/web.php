<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\SaveController;



Route::get('/', [ MainController::class, 'index' ])->name('page.index');

Route::post('/mail', [ SaveController::class, 'store' ])->name('mail.store');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
