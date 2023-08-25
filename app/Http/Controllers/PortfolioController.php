<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class PortfolioController extends Controller
{
    public function add(Request $request)
    {
        $data = $request->validate([
            'company_id' => 'required|exists:companies,id',
            'quantity' => 'required|integer|min:1',
            
        ]);

        // Fetch current price from the API
        $symbol = Companies::findOrFail($data['company_id'])->ticker;
        $currentPrice = $this->fetchCurrentPrice($symbol);

        

        $preMarketChange = $this->fetchPreMarketChange($symbol);


        // dd($preMarketChange);
        

        if ($currentPrice === null || $preMarketChange === null) {
            // Handle the case when the API does not return valid data
            return redirect()->back()->with('error', 'Failed to fetch data from the API.');
        }
          $portfolio = Portfolio::where('company_id', $data['company_id'])->first();
    if (!$portfolio) {
        $portfolio = new Portfolio([
            'company_id' => $data['company_id'],
            'quantity' => 0,
            'current_cost' => 0,
            'delta' => 0,
        ]);
    }

    // Calculate total quantity
    $totalQuantity = $portfolio->quantity + $data['quantity'];

    // Update portfolio entry
    $portfolio->quantity = $totalQuantity;
    $portfolio->current_cost = $currentPrice; // Store the current price as current_cost
    $portfolio->delta = $preMarketChange; // Store the delta value
    $portfolio->save();

    return redirect()->back()->with('success', 'Company added to portfolio.');
}
    private function fetchCurrentPrice($symbol)
    {

        $response = Http::withHeaders([
            'X-RapidAPI-Host' => 'yahoo-finance15.p.rapidapi.com',
            'X-RapidAPI-Key' => env('RAPIDAPI_KEY'),
        ])->get("https://yahoo-finance15.p.rapidapi.com/api/yahoo/mo/module/{$symbol}", [
            'module' => 'financial-data'
        ]);

        if ($response->successful()) {
            $jsonData = $response->json();
            $currentPriceRaw = $jsonData['financialData']['currentPrice']['raw'] ?? null;

            // dd($currentPriceRaw);

            return $jsonData['financialData']['currentPrice']['raw'] ?? null;

        } else {
            Log::error("Failed to fetch API data for symbol: {$symbol}");

            return null;
        }
    }

    private function fetchPreMarketChange($symbol)
    {
        $response = Http::withHeaders([
            'X-RapidAPI-Host' => 'yahoo-finance15.p.rapidapi.com',
            'X-RapidAPI-Key' => env('RAPIDAPI_KEY'),
        ])->get("https://yahoo-finance15.p.rapidapi.com/api/yahoo/qu/quote/{$symbol}", [
            //'module' => 'asset-profile,financial-data,earnings'
        ]);

        if ($response->successful()) {
            $jsonData = $response->json();
            $preMarketChangeS = $jsonData['quoteResponse']['result'][0]['regularMarketChange']['raw'] ?? null;

            return $preMarketChangeS;
        } else {
            Log::error("Failed to fetch pre-market change for symbol: {$symbol}");

            return null;
        }
    }



    public function show()
    {
        $portfolioData = Portfolio::with('company')->get(); // Assuming you have a 'company' relationship in the Portfolio model

        return view('portfolio.show', ['portfolioData' => $portfolioData]);
    }
}
