<div class="container">
    <h1>Company Data</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Ticker</th>
                <th>Pre-Market Change</th>
                <th>Fifty-Day Average</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $symbol => $company)
                <tr>
                    <td>{{ $company['name'] }}</td>
                    <td>{{ $symbol }}</td>
                    <td>{{ $company['preMarketChange'] }}</td>
                    <td>{{ $company['fiftyDayAverage'] }}</td>
                </tr>
            @endforeach
            
        </tbody>
    </table>
</div>