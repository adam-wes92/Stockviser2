<h1>Company Names</h1>

<ul>
    <h1>Company Names</h1>
    <ul>
        @foreach($companies['data'] as $company)
            <li>{{ $company['name'] }}</li>

        @endforeach
    </ul>
</ul>