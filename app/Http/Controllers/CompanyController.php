<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\News;
use App\Models\Symbol;
use App\Models\Company;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class CompanyController extends Controller
{
   
        
        public function index(){
            // Fetch all tickers from the database
            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => "https://yahoo-finance15.p.rapidapi.com/api/yahoo/ne/news/TSLA",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 10,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => [
                    "X-RapidAPI-Host: yahoo-finance15.p.rapidapi.com",
                    "X-RapidAPI-Key: c27b5612b9msh8ab4f6395705c09p18166cjsn91e9563d42d2"
                ],
            ]);

            $response = curl_exec($curl);
            $news=json_decode($response)->item;
            foreach($news as $new){
                News::create([
                    'title'=>$new->title,
                    'description'=>$new->description
                ]);
            }
            $news_to_show = News::all();
            return view('companies.index', [
                'companies' => Company::latest()->filter(request(['search']))->simplepaginate(4),
                'news'=>$news_to_show
            ]);
                                           

        }
        
            public function show($ticker){
                $company = Company::where('ticker', $ticker)->first();
                
                        
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

                $symbol=$company->ticker;
                $response = Http::withHeaders([
                    'X-RapidAPI-Host' => 'yahoo-finance15.p.rapidapi.com',
                    'X-RapidAPI-Key' => env('RAPIDAPI_KEY'),
                ])->get("https://yahoo-finance15.p.rapidapi.com/api/yahoo/mo/module/{$symbol}", [
                    'module' => 'asset-profile,financial-data,earnings'
                ]);
                $response2 = Http::withHeaders([
                    'X-RapidAPI-Host' => 'yahoo-finance15.p.rapidapi.com',
                    'X-RapidAPI-Key' => env('RAPIDAPI_KEY'),
                ])->get("https://yahoo-finance15.p.rapidapi.com/api/yahoo/qu/quote/{$symbol}", [
                    //'module' => 'asset-profile,financial-data,earnings'
                ]);
                if ($response && $response2->successful()) {
                    $arrayresponse[0] = $response->json();
                    // $arrayresponse[1] = $response1->json();
                    $arrayresponse[2] = $response2->json();
                    $company->fill([
                        'recomendation' => $arrayresponse[0]['financialData']['recommendationKey']??'no data from API',
                        'regular_market_price' => $arrayresponse[2][0]['regularMarketPrice']??0,
                        'regular_market_change' => $arrayresponse[2][0]['regularMarketChange']??0,
                        'target_mean_price' => $arrayresponse[0]['financialData']['targetMeanPrice']['raw']??0,
                        'EPS' => $arrayresponse[0]['earnings']['earningsChart']['quarterly'][0]['actual']['raw']??0,
                        'regular_market_delta' => $arrayresponse[2][0]['regularMarketDayRange']??'no data from API'
                    ]);
                    $company->save();                     
                }else{
                    //exception
                }
                return view('companies.show', [
                    'company' => $company,
                    'description' => $description,
                ]);
            }

            public function store(Request $request){
                $ticker = $request->route('ticker'); // Get the value of the ticker parameter
                $company = Company::where('ticker', $ticker)->first();
                $u_id=Auth::id();
                $qty = $request->validate([
                    'quantity' => 'required|numeric|min:1', 
                ]);
                $existed=false;
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
                    Portfolio::create($formfields);
                }else{
                    foreach($companies_in_portfolio as $cp){
                        if ($cp->company_id==$company->id){
                            $ec = Portfolio::where('user_id', $u_id)
                            ->where('company_id', $company->id)
                            ->first(); 
                            $portfolio_id=$cp->id;
                            $existed=true;                       
                            $formfields=[
                                'shares_qty'=>$ec->shares_qty + $qty['quantity'],
                                'current_cost'=>$current_cost,
                                'total_invested'=> $ec->total_invested + $qty['quantity'] * $current_cost,
                                'gain'=>$ec->shares_qty*$current_cost-$ec->total_invested,
                                'performance_percentage'=>$ec->gain * 100/$ec->total_invested,
                                'user_id'=>$u_id,
                                'company_id'=> $company->id,                     
                                'last_purchase_date'=>Carbon::today()
                            ];
                            Portfolio::find($portfolio_id)->update($formfields);
                        };
                    }
                    if (!$existed){
                        $formfields=[
                            'shares_qty'=>$qty['quantity'],
                            'current_cost'=>$current_cost,
                            'total_invested'=> $qty['quantity'] * $current_cost,
                            'gain'=>0,
                            'performance_percentage'=>0,
                            'user_id'=>$u_id,
                            'company_id'=> $company->id,                     
                            'last_purchase_date'=>Carbon::today()
                            ];
                            Portfolio::create($formfields);
                        }
                    }
                return redirect("/users/$u_id/dashboard")->with('message', "The company $company->shortname added to your portfolio");
            }
        }
            
        
            
        
        


