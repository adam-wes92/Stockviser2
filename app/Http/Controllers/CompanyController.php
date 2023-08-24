<?php

namespace App\Http\Controllers;

use App\Models\Company;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //This function controlls single company fetched data
    public function show(Company $company)
    {
        $noData = 'No data available';
        $apiKey = 'c27b5612b9msh8ab4f6395705c09p18166cjsn91e9563d42d2'; // Replace with your actual API key
        $symbol = 'AAPL'; //

        $url = "https://query1.finance.yahoo.com/v8/finance/chart/{$symbol}?apiKey={$apiKey}";

        $response = file_get_contents($url);
        $data = json_decode($response, true);

        // Extract high prices from yesterday and two days ago
        $highPrices = $data['chart']['result'][0]['indicators']['quote'][0]['high'];

        if (count($highPrices) >= 6) {
            $highest0 = $highPrices[count($highPrices) - 1];
            $highest1 = $highPrices[count($highPrices) - 2];
            $highest2 = $highPrices[count($highPrices) - 3];
            $highest3 = $highPrices[count($highPrices) - 4];
            $highest4 = $highPrices[count($highPrices) - 5];
        }

        // Pass the lowest prices to the view
        return view('companies.show', [
            'company' => $company,
            'highest0' => $highest0,
            'highest1' => $highest1,
            'highest2' => $highest2,
            'highest3' => $highest3,
            'highest4' => $highest4,
            'data' => $data,
            'noData' => $noData
        ]);
    }
}
