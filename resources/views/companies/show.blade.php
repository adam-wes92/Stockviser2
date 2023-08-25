<?php
// $apiKey = 'c27b5612b9msh8ab4f6395705c09p18166cjsn91e9563d42d2'; // Replace with your actual API key
// $symbol = 'AAPL'; //

// $url = "https://query1.finance.yahoo.com/v8/finance/chart/{$symbol}?apiKey={$apiKey}";

// $response = file_get_contents($url);
// $data = json_decode($response, true);

// $latestData = end($data['chart']['result'][0]['indicators']['quote'][0]);
// $mostRecentTimestamp = end($data['chart']['result'][0]['timestamp']);
// $previousClose = $latestData[0]; // Assuming the first value is the previous close
// $volume = end($data['chart']['result'][0]['indicators']['quote'][0]['volume']);
// $openPrice = reset($latestData);

// // Print today's price
// echo "Today's Timestamp: " . date('Y-m-d H:i:s', $mostRecentTimestamp) . '<br>';
// echo "Today's Price: $" . end($latestData) . '<br>';

// // Calculate change and percent change from previous close
// $change = end($latestData) - $previousClose;
// $percentChange = ($change / $previousClose) * 100;
// echo "Change from Previous Close: $" . $change . '<br>';
// echo 'Percent Change: ' . number_format($percentChange, 2) . '%<br>';

// // Display trading volume
// echo 'Trading Volume: ' . number_format($volume) . ' shares<br>';

// // Display opening price
// echo "Opening Price: $" . $openPrice . '<br>';

// // Calculate approximate market capitalization
// $marketCap = $latestData[0] * $volume;
// echo "Market Capitalization: $" . number_format($marketCap) . '<br>';

// // Display 52-week high and low prices
// $week52High = max($latestData);
// $week52Low = min($latestData);
// echo "52-Week High: $" . $week52High . '<br>';
// echo "52-Week Low: $" . $week52Low . '<br>';

// // Display dividend yield
// $dividendYield = 0.02; // Replace with the actual dividend yield if available
// echo 'Dividend Yield: ' . number_format($dividendYield * 100, 2) . '%<br>';

// // Display earnings per share
// $earningsPerShare = 5.23; // Replace with the actual EPS if available
// echo "Earnings Per Share: $" . $earningsPerShare . '<br>';

// // Display price-to-earnings ratio
// $peRatio = 20.18; // Replace with the actual P/E ratio if available
// echo 'Price-to-Earnings Ratio: ' . number_format($peRatio, 2) . '<br>';

// // Display analyst recommendation
// $analystRecommendation = 'Buy'; // Replace with the actual recommendation if available
// echo 'Analyst Recommendation: ' . $analystRecommendation . '<br>';
// dd($data);
?>


<div class="container">
    {{-- Display other information about the company --}}
    <h1>{{ $company->name }}</h1>
    {{-- ... other company details ... --}}

    {{-- Display the lowest prices from yesterday and two days ago --}}
    <h1>
        {{ $highest0 }}
        {{ $noData }}
    </h1>
</div>
<!DOCTYPE html>
<html>

<head>
    <!-- Add the Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <h2 class="mb-4">Price Data for the Last 5 Business Days</h2>

        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Day 0</td>
                    <td>{{ $highest0 }}</td>
                </tr>
                <tr>
                    <td>Day -1</td>
                    <td>{{ $highest1 }}</td>
                </tr>
                <tr>
                    <td>Day -2</td>
                    <td>{{ $highest2 }}</td>
                </tr>
                <tr>
                    <td>Day -3</td>
                    <td>{{ $highest3 }}</td>
                </tr>
                <tr>
                    <td>Day -4</td>
                    <td>{{ $highest4 }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Add the Bootstrap JS and Popper.js scripts (for Bootstrap functionality) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
<!DOCTYPE html>
<html>

<head>
    <!-- Add the Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Add custom styles if needed */
        .company-description {
            font-size: 16px;
            line-height: 1.6;
            color: #333;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <h2 class="mb-4">Price Data for the Last 5 Business Days</h2>
      

        <div class="table-responsive">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Day 1</td>
                        <td><!-- Price for Day 1 --></td>
                    </tr>
                    <tr>
                        <td>Day 2</td>
                        <td><!-- Price for Day 2 --></td>
                    </tr>
                    <tr>
                        <td>Day 3</td>
                        <td><!-- Price for Day 3 --></td>
                    </tr>
                    <tr>
                        <td>Day 4</td>
                        <td><!-- Price for Day 4 --></td>
                    </tr>
                    <tr>
                        <td>Day 5</td>
                        <td><!-- Price for Day 5 --></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

     <div class="card-body">
        <h5 class="card-title">{{ $company->name }}</h5>
        <p class="card-text">
            {{ substr($description, 0, 200) }} <!-- Display first 200 characters of description -->
            @if (strlen($description) > 200)
                <span id="dots">...</span> <!-- Dots to indicate truncation -->
                <span id="more" style="display: none;">{{ substr($description, 200) }}</span> <!-- Rest of description -->
                <button onclick="readMore()" id="read-more-btn" class="btn btn-link">Read more</button>
            @endif
        </p>
        <hr>
        <ul class="list-unstyled">
            <!-- Other company details -->
        </ul>
    </div>
    
    <script>
        function readMore() {
            var dots = document.getElementById("dots");
            var moreText = document.getElementById("more");
            var btnText = document.getElementById("read-more-btn");
    
            if (dots.style.display === "none") {
                dots.style.display = "inline";
                btnText.innerHTML = "Read more";
                moreText.style.display = "none";
            } else {
                dots.style.display = "none";
                btnText.innerHTML = "Read less";
                moreText.style.display = "inline";
            }
        }
    </script> 
    
   

    <!-- Add the Bootstrap JS and Popper.js scripts (for Bootstrap functionality) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
