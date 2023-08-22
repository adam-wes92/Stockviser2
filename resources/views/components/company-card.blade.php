{{-- This code was originally in our listings.blade.php file inside our foreach. We transferred that code here and will call the prop inside the listings.blade.php file --}}

<x-card> {{-- This is to connect the card.blade.php in order to replace the card style choices --}}

    {{-- We removed the div with the grey bg color and other card styling elements applied and place it into the card.blade.php --}}
    <div class="flex">
        {{-- We updated the image to come from the asset function taht will pull the file we need from the public/images folder --}}

        {{-- We adjusted the src="{{ asset('images/no-image.png')}}" to src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('images/no-image.png')}}" --}}
        <img class="hidden w-48 mr-6 md:block" src="{{ asset('images/noImage.jpg')}}" alt="" />
        <div>
            <h3 class="text-2xl">
                {{-- Updated this to $listing->title so that it will import the information we need from the  --}}
                <a href="/">Company Name</a>
                {{-- <a href="/companies/{{ $company->id }}">{{ $company->name }}</a> --}}
            </h3>
            <div class="text-xl font-bold mb-4">Company Price</div>
            
            <div class="text-xl font-bold mb-4">Company Description</div>
            {{-- <x-company-tags :tagsCsv="$product->tags" /> --}}

            {{-- <form action="{{ route('add.to.cart', $company->id) }}" method="GET">
                @csrf
                <button type="submit" class="bg-black mr-3 text-sm text-white px-3 py-1 ml-10 hover:text-laravel rounded">Add to Portfolio</button>
            </form> --}}
            

            {{-- <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i>&nbsp&nbsp{{$listing->location}}
            </div> --}}
        </div>
    </div>
</x-card>