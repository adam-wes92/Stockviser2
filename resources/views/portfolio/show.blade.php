<!-- ... -->

<table class="table">
    <thead>
        <tr>
            <th>Company</th>
            <th>Quantity</th>
            <th>Current Cost</th>
            <!-- Add more columns as needed -->
        </tr>
    </thead>
    <tbody>
        @foreach ($portfolioData as $entry)
            <tr>
                <td>{{ $entry->company->name }}</td>
                <td>{{ $entry->quantity }}</td>
                <td>{{ $entry->current_cost }}</td>
                <!-- Display more data as needed -->
            </tr>
        @endforeach
    </tbody>
</table>

<!-- ... -->
