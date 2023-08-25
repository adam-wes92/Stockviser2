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

        $response1 = Http::withHeaders([
            'X-RapidAPI-Host' => 'yahoo-finance15.p.rapidapi.com',
            'X-RapidAPI-Key' => env('RAPIDAPI_KEY'),
        ])->get("https://query1.finance.yahoo.com/v8/finance/chart/{$symbol}", [
            //'module' => 'asset-profile,financial-data,earnings'
        ]);

        $response2 = Http::withHeaders([
            'X-RapidAPI-Host' => 'yahoo-finance15.p.rapidapi.com',
            'X-RapidAPI-Key' => env('RAPIDAPI_KEY'),
        ])->get("https://yahoo-finance15.p.rapidapi.com/api/yahoo/qu/quote/{$symbol}", [
            //'module' => 'asset-profile,financial-data,earnings'
        ]);

        

        // dd($response);
        //  $arrayresponse[] = $response;
// dd($response);
        $arrayresponse[0] = $response;
        $arrayresponse[1] = $response1;
        $arrayresponse[2] = $response2;
        // dd($response);
        if ($response && $response1 && $response2->successful()) {
            $jsonData[0] = $response->json();
            $jsonData[1] = $response1->json();
            $jsonData[2] = $response2->json();
        //dd($jsonData);

        if ($response && $response1 && $response2->successful()) {
            $jsonData[0] = $response->json();
            $jsonData[1] = $response1->json();
            $jsonData[2] = $response2->json();
        // dd($jsonData);

        $data[$symbol] = [
            // 'name' => $company->name,
            // 'revenue' => $company->revenue,
            // 'founded_year' => $company->founded_year,
            // 'share_price' => $company->share_price,
            // 'country' => $company->country,

            'displayName' => $jsonData[2][0]['displayName'] ?? null,
            'fullExchangeName' => $jsonData[2][0]['fullExchangeName'] ?? null,
            'regularMarketPrice' => $jsonData[2][0]['regularMarketPrice'] ?? null,
            'regularMarketChange' => $jsonData[2][0]['regularMarketChange'] ?? null,
            'marketCap' => $jsonData[2][0]['marketCap'] ?? null,
            'targetMeanPrice' => $jsonData[0]['financialData']['targetMeanPrice']['raw']?? null,
            'recommendationKey' => $jsonData[0]['financialData']['recommendationKey']?? null,
            'Industry' => $jsonData[0]['assetProfile']['industry']?? null,
            'sector' => $jsonData[0]['assetProfile']['sector']?? null,
            'country' => $jsonData[0]['assetProfile']['country']?? null,
            


        ];
    }}  else {

                // Handle the error
            }
            
        }
            // dd($arrayresponse);
            return view('companies.index', ['data' => $data]);
    }
}
    

    

