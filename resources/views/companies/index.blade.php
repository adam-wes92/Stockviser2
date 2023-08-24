<x-layout>


    {{-- add hero partial --}}
    @include('partials._hero')

    {{-- Only authorized users can access the search bar --}}
    @auth
    @include('partials._search')
    @endauth


  

    {{-- JUST ADJUST THE CODE BELOW IWHTIN THE DIV TO DISPLAY TOUR COMPANY LISTINGS :D --}}
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4"> 
    @foreach ($companies as $company)

    <x-company-card :company="$company" /> 
    @endforeach 
    {{-- adding new div to add page direct buttons : This is sick and much easier than the way we had to do it in PHP : WOO! --}}
        <div class="mt-6 p-4">
            {{$companies->links()}}
        </div> 
    </div>

    {{-- New Api --}}
    @include('components.news')
    
    {{-- c27b5612b9msh8ab4f6395705c09p18166cjsn91e9563d42d2   --}}

    @include('components.contact')
</x-layout>
