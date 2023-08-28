<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function create()
    {
        return view('users.register');
    }

    public function store(Request $request)
    {   // Form validation accordingly to the model
        $formFields = $request->validate([
            'first_name' => ['required', 'min:3'],
            'last_name' => ['required', 'min:3'],
            'birth_date' => ['required', 'date'],

            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'phone_number' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'zip' => 'required',
            'password' => ['required', Password::min(6)->mixedCase()->numbers()->symbols()]
        ]);

        // Encrypt the password in database table
        $formFields['password'] = bcrypt($formFields['password']);

        // Create a new user
        $user = User::create($formFields);

        auth()->login($user);

        // User logged in and... :
        return redirect('/')->with('message', 'User created and logged in');
    }

    // This is for the edit form 
    public function edit(User $user){
    return view('users.edit', ['user' => $user]);
    }

    // Update User Info
    public function update(Request $request, User $user) {
        // Now for some walidation, there is very minimal code we need to write:
        $formFields = $request->validate([
            'first_name' => 'required', 
            'last_name' => 'required', 
            'birth_date' => 'required',
            'email' => ['required', 'email'],  
            'phone_number' => 'required',
            'address' => 'required', 
            'city' => 'required', 
            'zip' => 'required', 
            'password' => ['required', Password::min(6)->mixedCase()->numbers()->symbols()] // The password class is what we use to implement requirements for what the password should contain
        ]);
            
        // update() changes the data in the table for us
        $user->update($formFields);
        
        return redirect("/")->with('message', 'User Information updated');
    }

    // Logout User
    public function logout(Request $request)
    {
        auth()->logout();

        //to remove the authentication info from the session additional requirement to invalidate their session and need to regenerate the user token
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'User logged out');
    }

    // Login User
    public function login()
    {
        return view('users.login');
    }

    // Authenticate User
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);
        if (auth()->attempt($formFields)) {
            $request->session()->regenerate(); //generate new session

            return redirect('/')->with('message', 'User logged in');
        } else {

            return back()->withErrors(['email' => 'Wrong email or password', 'password' => 'Wrong email or password']);
        }
    }

    public function dashboard(User $user)

    {   $total_gain=0;
        $total_invest=0;
        $array_EPS=[];
        $array_perf=[];
        $user_id=$user->id;
        $companies=[];
        $companies_in_portfolio=[];
        $companies_in_portfolio = Portfolio::all()->filter(request($user_id));
        
        if ($companies_in_portfolio->isEmpty()){
            return view('users.dashboard', ['companies_in_portfolio'=>[]]);
        }else{
            foreach ($companies_in_portfolio as $cp){
                $symbol=$cp->ticker;
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
                $c=Company::find($cp->company_id);
                if ($response && $response2->successful()) {
                    $arrayresponse[0] = $response->json();
                    // $arrayresponse[1] = $response1->json();
                    $arrayresponse[2] = $response2->json();
                    $c->fill([
                        'recomendation' => $arrayresponse[0]['financialData']['recommendationKey']??'no data from API',
                        'regular_market_price' => $arrayresponse[2][0]['regularMarketPrice']??0,
                        'regular_market_change' => $arrayresponse[2][0]['regularMarketChange']??0,
                        'target_mean_price' => $arrayresponse[0]['financialData']['targetMeanPrice']['raw']??0,
                        'EPS' => $arrayresponse[0]['earnings']['earningsChart']['quarterly'][0]['actual']['raw']??0,
                        'regular_market_delta' => $arrayresponse[2][0]['regularMarketDayRange']??'no data from API'
                    ]);
                    $c->save();                     
                }else{
                    //exception
                }
                array_push($companies, $c);
                $total_gain+=$cp->gain;
                $total_invest+=$cp->total_invested;
                $a_EPS['EPS']=$c->EPS;
                $a_EPS['ticker']=$c->ticker;
                $a_perf['perf']=$cp->performance_percentage;
                $a_perf['ticker']=$c->ticker;
                array_push($array_EPS, $a_EPS);
                array_push($array_perf, $a_perf);
            }
            usort($array_EPS, function ($a, $b) {
                return $b["EPS"] <=> $a["EPS"];
            });
            usort($array_perf, function ($a, $b) {
                return $b["perf"] <=> $a["perf"];
            });
            return view('users.dashboard', [
                    'companies_in_portfolio'=>$companies_in_portfolio->sortByDesc('last_purchase_date'),
                    'companies'=>$companies,
                    'total_gain'=>$total_gain,
                    'total_invest'=>$total_invest,
                    'portfolio_performance'=>$total_gain*100/$total_invest,
                    'best_EPS'=>array_slice($array_EPS, 0, 3),
                    'best_perf'=>array_slice($array_perf, 0, 3),
            ]);
            }               
    }
}
