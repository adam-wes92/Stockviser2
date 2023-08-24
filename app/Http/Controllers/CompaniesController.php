<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CompaniesController extends Controller
{
    public function index()
{
    // Fetch all tickers from the database
    $companies = Companies::all();

    $data = [];


    $arrayresponse=[];

    foreach ($companies as $company) {
        //  $companiesCount = count($companies);
        //  dd($companiesCount);

        $symbol = $company->ticker;
        //  dump("Fetching data for symbol: {$symbol}"); 

        $response = Http::withHeaders([
            'X-RapidAPI-Host' => 'yahoo-finance15.p.rapidapi.com',
            'X-RapidAPI-Key' => env('RAPIDAPI_KEY'),
        ])->get("https://yahoo-finance15.p.rapidapi.com/api/yahoo/mo/module/{$symbol}", [
            'module' => 'asset-profile,financial-data,earnings'
        ]);
         $arrayresponse[] = $response;
// dd($response);
        if ($response->successful()) {
            $jsonData = $response->json();
    // dd($jsonData);



 if ($response->successful()) {
    $jsonData = $response->json();

    $data[$symbol] = [
        'name' => $company->name,
        'revenue' => $company->revenue,
        'founded_year' => $company->founded_year,
        'share_price' => $company->share_price,
        'country' => $company->country,

        'currency' => $jsonData['financialData']['currency'] ?? null,
        'longBusinessSummary' => $jsonData['assetProfile']['longBusinessSummary'] ?? null,
        'industry' => $jsonData['assetProfile']['industry'] ?? null


    ];
}}  else {

            // Handle the error
        }
        
    }
        // dd($arrayresponse);
        return view('companies.index', ['data' => $data]);
}
}
    

    

