<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompaniesController;
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
Route::get('/test', function () {
    return view('test');
});


// display all companies
Route::get('/companies', [CompaniesController::class, 'index']);


// Display one of the companies
Route::get('/companies/{symbol}', [CompaniesController::class, 'show'])->name('company.show');



// Route for adding a company to the portfolio
Route::post('/portfolio/add', [PortfolioController::class, 'add'])->name('portfolio.add');

Route::get('/portfolio', [PortfolioController::class, 'show'])->name('portfolio.show');



