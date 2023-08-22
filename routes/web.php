<?php

use App\Http\Controllers\CompaniesController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// to add company to portfolio

// show all companies

Route::get('/companies', [CompaniesController::class, 'index'])->name('companies.index');


// ROUTES FOR PORTFOLIO

Route::get('/portfolio', [PortfolioController::class, 'index']);

