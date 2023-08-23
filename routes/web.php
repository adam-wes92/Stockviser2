<?php


use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\ContactController;


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


Route::get('/', [CompanyController::class, 'index']);
Route::get('/', function(){
    $apiToken='jdR7kSJJlDzInE3Xy6JuFt7tyU2ESXkZsMWaB9tR';
        $response=Http::get("https://api.marketaux.com/v1/news/all", [
            'api_token'=>$apiToken,
            'symbols' => 'AAPL,TSLA',
            'filter_entities' => 'true',
            'limit'=>10
        ]);
        $r=$response->json();
        $news=$r['data'];
        
        return view('components.news', compact('news'));
});

Route::get('/', [ViewController::class, 'index']);

// This is to show the Contact form
Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');

// This is to submit contact form
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');

