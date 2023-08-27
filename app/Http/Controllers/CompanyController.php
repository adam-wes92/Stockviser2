<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Symbol;
use App\Models\Company;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class CompanyController extends Controller
{
    //This function controlls single company fetched data
    // // Show all listings
    // public function index() {
    //     return view('companies.index', [
    //         // We need to call filter() before get() to add extra condition to the query
    //         // when the query is ready, get() will trigger the call to the DB
    //         'companies' => Company::latest()->filter(request(['search']))->simplepaginate(4),
    //     ]); 
    // }
    // // Show a single listing
    // public function show(Company $company) {
    //     return  view('companies.show', [
    //         'company' => $company 

    //     ]);
    // }

        

        // relationship to User model
        // public function user() {
        //     // Now for Laravel, our Company belongs to a sinlge User
        //     return $this->belongsTo(User::class, 'user_id');
        // }
        
        public function index(){
            // Fetch all tickers from the database

            $companies = Company::all();
            return view('companies.index', ['companies'=>$companies]);
        
            
                             
        }
        
            public function show($ticker){
                $company = Company::where('ticker', $ticker)->first();
                
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
        
                $descriptionUrl = "https://yahoo-finance15.p.rapidapi.com/api/yahoo/mo/module/{$ticker}";
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
                    'company' => $company,
                    // 'highest0' => $highest0,
                    // 'highest1' => $highest1,
                    // 'highest2' => $highest2,
                    // 'highest3' => $highest3,
                    // 'highest4' => $highest4,
                    'description' => $description,
                    // 'noData' => $noData,
                ]);
            }

            public function store(Request $request){
                $ticker = $request->route('ticker'); // Get the value of the ticker parameter
                $company = Company::where('ticker', $ticker)->first();
                $u_id=Auth::id();
                $qty = $request->validate([
                    'quantity' => 'required|numeric|min:1', 
                ]);
                $current_cost=$company->regular_market_price;
                $companies_in_portfolio = Portfolio::where('user_id', $u_id)->get();
                if ($companies_in_portfolio->isEmpty()){
                    $formfields = [
                        'user_id'=>$u_id,
                        'company_id'=> $company->id,                     
                        'last_purchase_date'=>Carbon::today(),
                        'shares_qty'=>$qty['quantity'],
                        'current_cost'=>$current_cost,
                        'total_invested'=> $qty['quantity'] * $current_cost,
                        'gain'=>0,
                        'performance_percentage'=>0               
                    ];
                }else{
                    $companyIdsInPortfolio = $companies_in_portfolio->pluck('id')->toArray();
                    $companyAlreadyExists = in_array($company->id, $companyIdsInPortfolio) || count($companyIdsInPortfolio) == 1 && $companyIdsInPortfolio[0] == $company->id;
                    $formfields = [
                        'user_id'=>$u_id,
                        'company_id'=> $company->id,                     
                        'last_purchase_date'=>Carbon::today()               
                    ];
                    dd($formfields);
                    if ($companyAlreadyExists) {
                        $ec = Portfolio::where('user_id', $u_id)
                            ->where('company_id', $company->id)
                            ->first();
                            
                        $formfields=[
                            'shares_qty'=>$ec->shares_quantity + $qty['quantity'],
                            'current_cost'=>$current_cost,
                            'total_invested'=> $ec->total_invested + $qty['quantity'] * $current_cost,
                            'gain'=>$ec->shares_qty*$current_cost-$ec->total_invested,
                            'performance_percentage'=>$ec->gain * 100/$ec->total_invested
                        ];
                    } else {
                        $formfields=[
                            'shares_qty'=>$qty['quantity'],
                            'current_cost'=>$current_cost,
                            'total_invested'=> $qty['quantity'] * $current_cost,
                            'gain'=>0,
                            'performance_percentage'=>0
                        ];
                    }
                }
                
                Portfolio::create($formfields);
                return redirect("/users/$u_id/dashboard")->with('message', "The company $company->shortname added to your portfolio");
            }
        }
            
        
            
        
        


