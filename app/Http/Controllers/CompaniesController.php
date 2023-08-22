<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CompaniesController extends Controller
{
    public function index()
    {
        $apiToken = '31LXGmuxEsnvpac594GRnXyXZFn3s70kYvlLoxwY';
        $response = Http::get("https://api.marketaux.com/v1/entity/search", [
            'search' => 'tsla',
            'countries' => 'us',
            'api_token' => $apiToken,
        ]);


        $data = $response->json();

        return view('companies.index', ['data' => $data]);
    }

    
}
