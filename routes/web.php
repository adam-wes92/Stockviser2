<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ViewController;

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