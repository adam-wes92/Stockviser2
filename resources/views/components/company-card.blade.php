{{-- This code was originally in our listings.blade.php file inside our foreach. We transferred that code here and will call the prop inside the listings.blade.php file --}}

<x-card>
    <div class="flex">
        <img class="hidden w-48 mr-6 md:block" src="{{ asset('images/logo.png') }}" alt="" />
        <div>
            <h3 class="text-2xl">
                <a href="/">Company Name</a>
            </h3>
            <div class="text-xl font-bold mb-4">Company Price</div>
            <div class="text-xl font-bold mb-4">Company Description</div>
        </div>

    </div>
</x-card>
