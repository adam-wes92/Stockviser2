<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ViewController extends Controller
{
    // Show all companies
    public function index() {
        $apiToken='jdR7kSJJlDzInE3Xy6JuFt7tyU2ESXkZsMWaB9tR';
        $response=Http::get("https://api.marketaux.com/v1/news/all", [
            'api_token'=>$apiToken,
            'symbols' => 'AAPL,TSLA',
            'filter_entities' => 'true',
            'limit'=>10
        ]);
        $r=$response->json();
        $news=$r['data'];
        return view('companies.index', compact('news')
            // We need to call filter() before get() to add extra condition to the query
            // when the query is ready, get() will trigger the call to the DB
            // 'companies' => Company::latest()->filter(request(['tag', 'search']))->simplepaginate(4),
        ); 
    }
    // Show a single listing
    // public function show(Company $company) {
    //     return  view('companies.show', [
    //         'company' => $company 

    //     ]);

    // }
}
