<?php

namespace App\Http\Controllers;
use App\Models\Company;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CompanyController extends Controller
{
    public function show(Company $company)
    {
        $noData = 'No data available';
        $apiKey = 'c27b5612b9msh8ab4f6395705c09p18166cjsn91e9563d42d2'; // Replace with your actual API key
        $symbol = 'AMZN'; //

        $url = "https://query1.finance.yahoo.com/v8/finance/chart/{$symbol}?apiKey={$apiKey}";

        $response = file_get_contents($url);
        $data = json_decode($response, true);

        // Extract high prices from yesterday and two days ago
        $lowPrices = $data['chart']['result'][0]['indicators']['quote'][0]['high'];

        if (count($lowPrices) >= 3) {
            $highest0 = $lowPrices[count($lowPrices) - 1];
            $highest1 = $lowPrices[count($lowPrices) - 2];
            $highest2 = $lowPrices[count($lowPrices) - 3];
            $highest3 = $lowPrices[count($lowPrices) - 4];
            $highest4 = $lowPrices[count($lowPrices) - 5];
        }

        $descriptionApiKey = 'c27b5612b9msh8ab4f6395705c09p18166cjsn91e9563d42d2';
        $descriptionUrl = "https://yahoo-finance15.p.rapidapi.com/api/yahoo/mo/module/{$symbol}";
        $descriptionResponse = Http::withHeaders([
            'X-RapidAPI-Host' => 'yahoo-finance15.p.rapidapi.com',
            'X-RapidAPI-Key' => $descriptionApiKey,
        ])->get($descriptionUrl, [
            'module' => 'asset-profile'
        ]);
        $descriptionApiData = $descriptionResponse->json();
        $description = $descriptionApiData['assetProfile']['longBusinessSummary'] ?? 'Description not available';

        // Fetch company data
        $companies = Company::all();


        // Pass the lowest prices to the view
        return view('companies.show', [
            'company' => $company,
            'highest0' => $highest0,
            'highest1' => $highest1,
            'highest2' => $highest2,
            'highest3' => $highest3,
            'highest4' => $highest4,
            'data' => $companies,
            'description' => $description,
            'noData' => $noData,
        ]);
    }
}
