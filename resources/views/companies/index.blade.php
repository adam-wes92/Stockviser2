<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        /* Custom CSS for colors */
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        th {
            background-color: #343a40;
            color: #ffffff;
        }
        .table td, .table th {
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4">Company Data</h1>
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>Ticker</th>
                    <th>Revenue</th>
                    <th>Founded Year</th>
                    <th>Share Price</th>
                    <th>Country</th>
                    <th>Industry</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $symbol => $company)
                    <tr>
                        <td>{{ $company['name'] }}</td>
                        <td>{{ $symbol }}</td>
                        <td>${{ number_format($company['revenue'], 2) }}</td>
                        <td>{{ $company['founded_year'] }}</td>
                        <td>${{ number_format($company['share_price'], 2) }}</td>
                        <td>{{ $company['country'] }}</td>
                        <td>{{ $company['industry'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <!-- Add Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>