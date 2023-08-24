{{-- <a href="{{ route('company.show', ['symbol' => $symbol]) }}" class="text-decoration-none"> --}}
    <div class="card company-card bg-light-blue mb-4 h-100">
        <div class="card-body text-center"> <!-- Align text to the center -->
            <img src="images/{{$symbol}}.png" alt="" class="card-img-top img-fluid rounded-circle company-logo p-3 img-thumbnail mx-auto d-block" style="width: 100px; height: 100px;"> <!-- Center align logo -->
            <h5 class="card-title mb-2">{{ $company['name'] }}</h5>
            <p class="card-text"><strong>Ticker:</strong> {{ $symbol }}</p>
            <p class="card-text"><strong>Revenue:</strong> ${{ number_format($company['revenue'], 2) }}</p>
            <p class="card-text"><strong>Founded Year:</strong> {{ $company['founded_year'] }}</p>
            <p class="card-text"><strong>Share Price:</strong> ${{ number_format($company['share_price'], 2) }}</p>
            <p class="card-text"><strong>Country:</strong> {{ $company['country'] }}</p>
            <p class="card-text"><strong>Industry:</strong> {{ $company['industry'] }}</p>
        </div>
    </div>
</a>

