<x-layout>


    {{-- add hero partial --}}
    @include('partials._hero')

    {{-- Only authorized users can access the search bar --}}
    @auth
    @include('partials._search')
    @endauth

    {{-- JUST ADJUST THE CODE BELOW IWHTIN THE DIV TO DISPLAY TOUR COMPANY LISTINGS :D--}}
    @auth
    <div class="flex flex-row flex-wrap justify-center gap-3">
        @foreach ($companies as $company)
            @include('components.company-card')
        @endforeach
    </div>
    @endauth

    {{-- adding new div to add page direct buttons : This is sick and much easier than the way we had to do it in PHP : WOO! --}}
     {{--   <div class="mt-6 p-4">
            {{$companies->links()}}
        </div> 
    </div> --}}

    {{-- News Api --}}
   @guest
    <div class="flex flex-row flex-wrap justify-center gap-3">    
    @include('components.news')
    </div>
    @endguest
    {{-- c27b5612b9msh8ab4f6395705c09p18166cjsn91e9563d42d2   --}}

    @include('components.contactForm')
</x-layout>
