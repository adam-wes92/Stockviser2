<!DOCTYPE html>
<html>
<head>
    <title>Company Data</title>
    <!-- Add Bootstrap CSS and your custom CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        /* Custom CSS for colors */
        body {
            background-color: #f8f9fa;
        }
        .company-card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
 
    {{-- <div class="container">
        <h1 class="mb-4">Company Data</h1>
        <div class="row">
            @foreach ($data as $symbol => $company)
                <div class="col-md-4">
                    <a href="/companies/{{ $symbol }}" class="card-link">
                        <div class="card company-card mb-4 h-100">
                            <div class="card-body">
                                <img src="images/{{$symbol}}.png" alt="" class="card-img-top img-fluid rounded-circle company-logo mx-auto d-block my-3">
                                <h5 class="card-title">{{ $company['name'] }}</h5>
                                <p class="card-text"><strong>Ticker:</strong> {{ $symbol }}</p>
                                <p class="card-text"><strong>Revenue:</strong> ${{ number_format($company['revenue'], 2) }}</p>
                                <p class="card-text"><strong>Founded Year:</strong> {{ $company['founded_year'] }}</p>
                                <p class="card-text"><strong>Share Price:</strong> ${{ number_format($company['share_price'], 2) }}</p>
                                <p class="card-text"><strong>Country:</strong> {{ $company['country'] }}</p>
                                <p class="card-text"><strong>Industry:</strong> {{ $company['industry'] }}</p>
                                <a href="#" class="btn btn-primary mt-2">Learn More</a>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>  --}}

    <div class="container">
        <h1 class="mb-4">Company Data</h1>
        <div class="row">
            @foreach ($data as $symbol => $company)
                <div class="col-md-4 mb-4">
                    @component('components.company-card', ['symbol' => $symbol, 'company' => $company])
                    @endcomponent
                </div>
            @endforeach
        </div>
    </div>
    






    <!-- Add Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
