<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/portfolio', function () {
    $apiToken = '31LXGmuxEsnvpac594GRnXyXZFn3s70kYvlLoxwY';
    $response = Http::get("https://api.marketaux.com/v1/entity/search", [
        'search' => 'tsla',
        'countries' => 'us',
        'api_token' => $apiToken,
    ]);

    $companies = $response->json();

    return view('portfolio.show', compact('companies'));
});
