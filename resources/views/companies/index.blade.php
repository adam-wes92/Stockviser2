<div class="container mt-4">
    <h1 class="mb-4">Company Data</h1>

    <div class="row">
        @foreach ($data['data'] as $company)
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $company['name'] }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $company['symbol'] }}</h6>
                        {{-- <img src="{{ $company['logo_url'] }}" alt="Company Logo" class="img-fluid mb-2"> --}}
                        <p class="card-text">Placeholder for Share Price</p>
                        <p class="card-text">Placeholder for Description</p>
                        <button class="btn btn-primary add-to-portfolio-btn">Add to Portfolio</button>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>



    <script>
    // ... (other code)

    document.addEventListener('DOMContentLoaded', function() {
        const addToPortfolioButtons = document.querySelectorAll('.add-to-portfolio-btn');
        
        addToPortfolioButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                
                const companyName = this.getAttribute('data-company-name');
                
                fetch('/addToPortfolio', {  // Update the route to use /addToPortfolio
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ company_name: companyName })
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data.message);
                    // Optionally, update the UI to indicate the company was added
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            });
        });
    });
</script>