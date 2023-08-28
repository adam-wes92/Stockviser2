<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\UserController;

// List of all companies
//Route::get('/', [CompanyController::class, 'index']);

// Display News Component

Route::get('/', [CompanyController::class, 'index']);




// Show edit form for Users
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->middleware('auth')->name('user.edit');

// Update User Profile information
Route::put('/users/{user}', [UserController::class, 'update'])->middleware('auth')->name('user.update');
Route::post('/companies/add/{ticker}', [CompanyController::class, 'store']);
// Display one of the companies
Route::get('/companies/{ticker}', [CompanyController::class, 'show'])->middleware('auth');
//Daisplay all companies



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

// Route::get('/contact', [ContactController::class, 'index']);

Route::get('/users/{user}/dashboard', [UserController::class, 'dashboard'])->middleware('auth');

Route::post('/', [ContactController::class, 'store'])->name('contact.us.store');

Route::get('/users/{user}/dashboard/{company}', [PortfolioController::class, 'destroy'])->middleware('auth');