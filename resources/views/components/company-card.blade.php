<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Document</title>
</head>
<body>
    


{{-- <a href="{{ route('company.show', ['symbol' => $symbol]) }}" class="text-decoration-none"> --}}
    <div class="card company-card bg-light-blue mb-4 h-100">
        <div class="card-body text-center"> <!-- Align text to the center -->
            <img src="images/{{$symbol}}.png" alt="" class="card-img-top img-fluid rounded-circle company-logo p-3 img-thumbnail mx-auto d-block" style="width: 100px; height: 100px;"> <!-- Center align logo -->
            <p class="card-text in-line"><strong>Share Price: </strong>$ {{ $company['regularMarketPrice'] }}</p>
            {{-- <h5 class="card-title mb-2">{{ $company['name'] }}</h5> --}}
            <p class="card-text"><strong></strong>{{ $company['displayName'] }} ({{ $symbol }})</p>
            <p class="card-text in-line"><strong>Share Price: </strong>$ {{ $company['regularMarketPrice'] }}</p>




           {{-- Showing the red/green - arrow up/down --}}
            <p class="card-text in-line">
                <strong>24H Change: </strong>
                <span
                    class="{{ $company['regularMarketChange'] >= 0 ? 'text-success' : 'text-danger' }}"
                    style="display: inline-block; margin-right: 5px;">
                    {{ $company['regularMarketChange'] >= 0 ? '+' : '-' }}
                    ${{ number_format(abs($company['regularMarketChange']), 2) }}
                    <i class="{{ $company['regularMarketChange'] >= 0 ? 'fas fa-arrow-up' : 'fas fa-arrow-down' }}"></i>
                </span>
                <hr>
            </p>




               {{-- Transform multiple digits into Milions, Bil, or Trilion --}}
            <p class="card-text in-line"><strong>Market Exchange: </strong> {{ $company['fullExchangeName'] }} <hr></p>
            <p class="card-text in-line">
                <strong>Market Cap: </strong>
                @if ($company['marketCap'] >= 1000000000000)
                    {{ number_format($company['marketCap'] / 1000000000000, 2) }} T
                @elseif ($company['marketCap'] >= 1000000000)
                    {{ number_format($company['marketCap'] / 1000000000, 2) }} B
                @elseif ($company['marketCap'] >= 1000000)
                    {{ number_format($company['marketCap'] / 1000000, 2) }} M
                @else
                    {{ $company['marketCap'] }}
                @endif
                <hr>
            </p>
            
            <p class="card-text in-line"><strong>Analysts Target Price: </strong>$ {{ $company['targetMeanPrice'] }}</p>
            <p class="card-text in-line"><strong>Analysts Recommendation: </strong> {{ $company['recommendationKey'] }}</p><hr>
            <p class="card-text in-line"><strong>Industry: </strong> {{ $company['Industry'] }}</p>
            <p class="card-text in-line"><strong>Sector: </strong> {{ $company['sector'] }}</p>
            <p class="card-text in-line"><strong>Country: </strong> {{ $company['country'] }}</p>

            <a href="{{ route('company.show', ['symbol' => $symbol]) }}" class="text-decoration-none">Learn more or buy</a>




        </div>
    </div>
</body>
</html>