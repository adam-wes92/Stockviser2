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
        
        $arrayresponse[0] = $response;
        $arrayresponse[1] = $response1;
        $arrayresponse[2] = $response2;

        
        // dd($response);
        if ($response && $response1 && $response2->successful()) {
            $jsonData[0] = $response->json();
            $jsonData[1] = $response1->json();
            $jsonData[2] = $response2->json();
            //  dd($jsonData[2]);
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

    public function show($symbol)
    {

        $company = Companies::where('ticker', $symbol)->first();

        // if (!$company) {
        //     // Handle the case when the company with the given symbol is not found
        //     abort(404);
        // }
        // $noData = 'No data available';
        // $apiKey = 'c27b5612b9msh8ab4f6395705c09p18166cjsn91e9563d42d2'; // Replace with your actual API key
        // //  $symbol = 'AMZN'; 

        // $url = "https://query1.finance.yahoo.com/v8/finance/chart/{$symbol}?apiKey={$apiKey}";

        // $response = file_get_contents($url);
        // $data = json_decode($response, true);

        // // Extract high prices from yesterday and two days ago
        // $lowPrices = $data['chart']['result'][0]['indicators']['quote'][0]['high'];

        // if (count($lowPrices) >= 3) {
        //     $highest0 = $lowPrices[count($lowPrices) - 1];
        //     $highest1 = $lowPrices[count($lowPrices) - 2];
        //     $highest2 = $lowPrices[count($lowPrices) - 3];
        //     $highest3 = $lowPrices[count($lowPrices) - 4];
        //     $highest4 = $lowPrices[count($lowPrices) - 5];
        // }

        $descriptionUrl = "https://yahoo-finance15.p.rapidapi.com/api/yahoo/mo/module/{$symbol}";
        $descriptionResponse = Http::withHeaders([
            'X-RapidAPI-Host' => 'yahoo-finance15.p.rapidapi.com',
            'X-RapidAPI-Key' => env('RAPIDAPI_KEY'),
        ])->get($descriptionUrl, [
            'module' => 'asset-profile,financial-data,earnings'
        ]);
        $descriptionApiData = $descriptionResponse->json();
        // dd($descriptionApiData);
        // dd($descriptionApiData);

        $description = $descriptionApiData['assetProfile']['longBusinessSummary'] ?? 'Description not available';
        
        // Pass the lowest prices to the view
        return view('companies.show', [
            'symbol' => $symbol,
            'company' => $company,
            // 'highest0' => $highest0,
            // 'highest1' => $highest1,
            // 'highest2' => $highest2,
            // 'highest3' => $highest3,
            // 'highest4' => $highest4,
            'data' => $company,
            'description' => $description,
            // 'noData' => $noData,
        ]);
    }
}
    

    

