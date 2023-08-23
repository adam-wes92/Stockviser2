<?php

use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ViewController;

use App\Http\Controllers\UserController;

// Laravel welcome page
Route::get('/', function () {
    return view('welcome');
});
// Present the registration form
Route::get('/register', [UserController::class, 'create']);

Route::get('/', [ViewController::class, 'index']);

// This is to show the Contact form
Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');

// This is to submit contact form
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');
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
Route::post('user/{id}/edit', [UserController::class, 'edit']);

// Display user data
Route::get('/user/{id}', [UserController::class, 'show']);

// Display one of the companies
Route::get('/company/{id}', [CompanyController::class], 'show');
