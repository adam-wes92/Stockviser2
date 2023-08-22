<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Laravel welcome page
Route::get('/', function () {
    return view('welcome');
});
// Present the registration form
Route::get('/register', [UserController::class, 'create']);

// User is registered
Route::post('/users', [UserController::class, 'store']);

// Logout
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Present the login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// User logged in
Route::post('users/authenticate', [UserController::class, 'authenticate']);

// User edit
Route::post('user/{user}/edit', [UserController::class, 'edit']);

// Display user data
Route::get('/dashboard', [UserController::class, 'dashboard'])->middleware('auth')->name('dashboard');
