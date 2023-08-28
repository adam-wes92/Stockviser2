<x-layout>

    {{-- Display other information about the company --}}
    <h1 class="pt-2 text-6xl font-bold uppercase text-laravel text-center" style="font:family 'Roboto', sans-serif;">{{ $company->fullname }}</h1>
    {{-- ... other company details ... --}}
    
    <x-card class="mx-auto w-4/5 rounded-md border-double shadow-lg shadow-laravel card ">
        <h1 class="text-right font-bold text-lg text-laravel2">Add to Portfolio?</h1>
        <div class="flex flex-row flex-between bg-laravel3 p-10 rounded">
        {{-- <h5 class="card-title">{{ $company->name }}</h5>  --}}
            <img src="{{asset('logos/'.$company->ticker.'.png')}}" alt="" class="card-img-top img-fluid rounded-circle company-logo p-3 img-thumbnail mx-auto d-block" style="width: 150px; height: 150px;">
            
                
                <form action='/companies/add/{{$company->ticker}}' method='POST' class="flex flex-col justify-between">
                    @csrf
                    @method('post')
                    <div>
                        <input type="hidden" name="company_id" value="{{ $company->id }}">
                        <label for="quantity" class="text-center pb-2 sm:text-lg md:text-xl lg:text-2xl xl:text-3xl  text-gray-200 my-4 text-laravel">Quantity:</label>
                        <input type="number" name="quantity" class="h-10 rounded border" required>
                    </div>
                    <button type="submit" class="btn btn-primary mx-auto bg-laravel text-white py-2 px-4 rounded sm:text-lg md:text-xl lg:text-2xl xl:text-3xl hover:text-laravel3 text-center">Add to Portfolio</button>
                </form>
            
        </div>
            <p class="card-text text-center pb-2 sm:text-lg md:text-xl lg:text-2xl xl:text-3xl  text-gray-200 my-4 text-laravel">
        {{ substr($description, 0, 200) }} <!-- Display first 200 characters of description -->
            @if (strlen($description) > 200)
            <span id="dots">...</span> <!-- Dots to indicate truncation -->
            <span id="more" style="display: none;">{{ substr($description, 200) }}</span> <!-- Rest of description -->
            <button onclick="readMore()" id="read-more-btn" class="btn btn-link text-laravel2">Read more</button>
            @endif
            </p>
        <ul class="list-unstyled">
            <li><p class="pb-2 sm:text-sm md:text-base lg:text-lg xl:text-xl text-gray-200 my-4 text-laravel font-bold"><span class="text-laravel2">Company full name:</span> {{$company->fullname}}</p></li>
            <li><p class="pb-2 sm:text-sm md:text-base lg:text-lg xl:text-xl text-gray-200 my-4 text-laravel font-bold"><span class="text-laravel2">Country:</span> {{$company->country}}</p></li>
            <li><p class="pb-2 sm:text-sm md:text-base lg:text-lg xl:text-xl text-gray-200 my-4 text-laravel font-bold"><span class="text-laravel2">Sector:</span> {{$company->sector}}</p></li>
            <li><p class="pb-2 sm:text-sm md:text-base lg:text-lg xl:text-xl text-gray-200 my-4 text-laravel font-bold"><span class="text-laravel2">Industry:</span> {{$company->industry}}</p></li>
            <li><p class="pb-2 sm:text-sm md:text-base lg:text-lg xl:text-xl text-gray-200 my-4 text-laravel font-bold"><span class="text-laravel2">Market cap:</span>
                @if ($company->market_cap >= 1000000000000)
                {{ number_format($company->market_cap / 1000000000000, 2) }} T
                @elseif ($company->market_cap >= 1000000000)
                    {{ number_format($company->market_cap / 1000000000, 2) }} B
                    @elseif ($company->market_cap >= 1000000)
                        {{ number_format($company->market_cap / 1000000, 2) }} M
                        @else
                        {{ $company->market_cap }}
            @endif 
            </p></li>
            <li><p class="pb-2 sm:text-sm md:text-base lg:text-lg xl:text-xl text-gray-200 my-4 text-laravel font-bold"><span class="text-laravel2">Analytics recomendation:</span> {{$company->recomendation}}</p></li>
            <li><p class="pb-2 sm:text-sm md:text-base lg:text-lg xl:text-xl text-gray-200 my-4 text-laravel font-bold"><span class="text-laravel2">Regular market price:</span> {{$company->regular_market_price}}</p></li>
            <li><p class="pb-2 sm:text-sm md:text-base lg:text-lg xl:text-xl text-gray-200 my-4 text-laravel font-bold"><span class="text-laravel2">Regular market change:</span> {{$company->regular_market_change}}</p></li>
            <li><p class="pb-2 sm:text-sm md:text-base lg:text-lg xl:text-xl text-gray-200 my-4 text-laravel font-bold"><span class="text-laravel2">Target mean price:</span> {{$company->target_mean_price}}</p></li>
            <li><p class="pb-2 sm:text-sm md:text-base lg:text-lg xl:text-xl text-gray-200 my-4 text-laravel font-bold"><span class="text-laravel2">Earnings per share:</span> {{$company->EPS}}</p></li>
        </ul>
    </x-card>
</x-layout>