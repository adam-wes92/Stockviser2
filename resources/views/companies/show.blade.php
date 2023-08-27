<div class="container">
    {{-- Display other information about the company --}}
    <h1>{{ $company->fullname }}</h1>
    {{-- ... other company details ... --}}
    <div class="container mt-5">
    <h2>Add to Portfolio</h2>
    <form action='/companies/add/{{$company->ticker}}' method='POST'>
        @csrf
        <input type="hidden" name="company_id" value="{{ $company->id }}">
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" required>
        <button type="submit" class="btn btn-primary">Add to Portfolio</button>
    </form>
</div>
<div class="card-body">
    {{-- <h5 class="card-title">{{ $company->name }}</h5>  --}}
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