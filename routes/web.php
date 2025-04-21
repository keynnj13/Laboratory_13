<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['guest'])->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister']);
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('blogs', BlogController::class);

    Route::get('/blog', function () {
        $user = Auth::user();
        return view('blogs', [
            'user' => $user,
        ]);
    })->name('dashboard');


    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
