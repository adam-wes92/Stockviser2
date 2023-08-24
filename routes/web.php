<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;

// List of all companies
// Route::get('/', [CompanyController::class, 'index']);

// Display News Component
Route::get('/', [NewsController::class, 'getNews']);

// Show edit form for Users
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->middleware('auth')->name('user.edit');

// Update User Profile information
Route::put('/users/{user}', [UserController::class, 'update'])->middleware('auth')->name('user.update');

// Display one of the companies
Route::get('/company/{id}', [CompanyController::class], 'show');

// Present the registration form
Route::get('/register', [UserController::class, 'create']);

// User is registered
Route::post('/users', [UserController::class, 'store']);

// Logout
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Present the login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// User logged in
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// Display user data
Route::get('/users/{id}', [UserController::class, 'show'])->middleware('auth');

// User Dashboard Display
Route::get('/users/{id}/dashboard', [UserController::class, 'show'])->middleware('auth');

// Show the Contact form
Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');

// Submit contact form
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');
