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

        foreach ($companies as $company) {
            $symbol = $company->ticker;

            $response = Http::withHeaders([
                'X-RapidAPI-Host' => 'yahoo-finance15.p.rapidapi.com',
                'X-RapidAPI-Key' => env('RAPIDAPI_KEY'),
            ])->get("https://yahoo-finance15.p.rapidapi.com/api/yahoo/qu/quote/{$symbol}");

            if ($response->successful()) {
                $jsonData = $response->json();

                if (count($jsonData) > 0 && isset($jsonData[0]['preMarketChange']) && isset($jsonData[0]['fiftyDayAverage'])) {
                    $data[] = [
                        'name' => $company->name,
                        'ticker' => $symbol,
                        'preMarketChange' => $jsonData[0]['preMarketChange'],
                        'fiftyDayAverage' => $jsonData[0]['fiftyDayAverage']
                    ];
                }
            } else {
                // Handle the error
                // Log::error('API Error:', ['response' => $response->json()]);
            }
        }

        return view('companies.index', ['data' => $data]);
    }
}
    

    

