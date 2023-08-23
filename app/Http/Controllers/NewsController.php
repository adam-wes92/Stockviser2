<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NewsController extends Controller
{
    // Shows news from API
    public function getNews() {
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
        ); 
    }
}