{{-- @props(['company']) --}}

<x-card class=" w-1/5 rounded-md border-double shadow-md shadow-laravel3 card ">
    <a href="/companies/{{ $company->ticker }}">
    <div class="flex flex-col justify-center text-center">

        <img src="{{asset('logos/'.$company->ticker.'.png')}}" alt="" class="card-img-top img-fluid rounded-circle company-logo p-3 img-thumbnail mx-auto d-block" style="width: 100px; height: 100px;">
        <h3 class="text-2xl">
            {{ $company->shortname }}
        </h3>
        <h3 class="text-2xl">{{ $company->ticker }}</h3>
        <p class=""><strong>Country: </strong> {{ $company->country}}</p>
        <p class=""><strong>Sector: </strong> {{ $company->sector}}</p>
        <p class=""><strong>Industry: </strong> {{ $company->industry}}</p>
        <p class="">
            <strong>Market Cap: </strong>
            @if ($company->market_cap >= 1000000000000)
                {{ number_format($company->market_cap / 1000000000000, 2) }} T
                @elseif ($company->market_cap >= 1000000000)
                    {{ number_format($company->market_cap / 1000000000, 2) }} B
                    @elseif ($company->market_cap >= 1000000)
                        {{ number_format($company->market_cap / 1000000, 2) }} M
                        @else
                        {{ $company->market_cap }}
            @endif            
        </p>
        <p class="">
            <strong>24H Change: </strong>
            <span
                class="{{ $company->regular_market_change >= 0 ? 'text-green-500' : 'text-red-500' }}"
                style="display: inline-block; margin-right: 5px;">
                {{ $company->regular_market_change >= 0 ? '+' : '-' }}
                ${{ number_format(abs($company->regular_market_change), 2) }}
                <i class="{{ $company->regular_market_change >= 0 ? 'fas fa-arrow-up' : 'fas fa-arrow-down' }}"></i>
            </span>
        </p>
    </div>
</a>
</x-card>  
  



            
{{-- we don'T need so much info... All this we will have in show.blade.php 
            
            $apiKey = 'c27b5612b9msh8ab4f6395705c09p18166cjsn91e9563d42d2'; // Replace with your actual API key
            $symbol = 'AAPL'; // Replace with the desired stock symbol
            
            $url = "https://query1.finance.yahoo.com/v8/finance/chart/{$symbol}?apiKey={$apiKey}";
            
            $response = file_get_contents($url);
            $data = json_decode($response, true);
            
            $latestData = end($data['chart']['result'][0]['indicators']['quote'][0]);
            $mostRecentTimestamp = end($data['chart']['result'][0]['timestamp']);
            $previousClose = $latestData[0]; // Assuming the first value is the previous close
            $volume = end($data['chart']['result'][0]['indicators']['quote'][0]['volume']);
            $openPrice = reset($latestData);
            
            // Print today's price
            echo "Today's Timestamp: " . date('Y-m-d H:i:s', $mostRecentTimestamp) . '<br>';
            echo "Today's Price: $" . end($latestData) . '<br>';
            
            // Calculate change and percent change from previous close
            $change = end($latestData) - $previousClose;
            $percentChange = ($change / $previousClose) * 100;
            echo "Change from Previous Close: $" . $change . '<br>';
            echo 'Percent Change: ' . number_format($percentChange, 2) . '%<br>';
                   
            
            // Display trading volume
            echo 'Trading Volume: ' . number_format($volume) . ' shares<br>';
            
            // Display opening price
            echo "Opening Price: $" . $openPrice . '<br>';
            
            // Calculate approximate market capitalization
            $marketCap = $latestData[0] * $volume;
            echo "Market Capitalization: $" . number_format($marketCap) . '<br>';
            
            // Display 52-week high and low prices
            $week52High = max($latestData);
            $week52Low = min($latestData);
            echo "52-Week High: $" . $week52High . '<br>';
            echo "52-Week Low: $" . $week52Low . '<br>';
            
            // Display dividend yield
            $dividendYield = 0.02; // Replace with the actual dividend yield if available
            echo 'Dividend Yield: ' . number_format($dividendYield * 100, 2) . '%<br>';
            
            // Display earnings per share
            $earningsPerShare = 5.23; // Replace with the actual EPS if available
            echo "Earnings Per Share: $" . $earningsPerShare . '<br>';
            
            // Display price-to-earnings ratio
            $peRatio = 20.18; // Replace with the actual P/E ratio if available
            echo 'Price-to-Earnings Ratio: ' . number_format($peRatio, 2) . '<br>';
            
            // Display analyst recommendation
            $analystRecommendation = 'Buy'; // Replace with the actual recommendation if available
            echo 'Analyst Recommendation: ' . $analystRecommendation . '<br>';
            ?> --}}
        
