<x-layout>


    {{-- add hero partial --}}
    @include('partials._hero')

    @include('components.news')
    {{-- <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4"> --}}


    {{-- BLADE WAY : Blade directives start with @ --}}
    {{-- foreach --}}
    {{-- @foreach ($companies as $company)
    {{-- This is how we call the code that was originally here and then cut/pasted into listing-card.blade.php --}}

    {{-- <x-company-card :company="$company" /> 
    @endforeach --}}
    {{-- </div> --}}
    @include('components.contact')

    {{-- adding new div to add page direct buttons : This is sick and much easier than the way we had to do it in PHP : WOO! --}}
    {{-- <div class="mt-6 p-4">
        {{$companies->links() </div -- }}
  
    
    {-- c27b5612b9msh8ab4f6395705c09p18166cjsn91e9563d42d2   --}}
</x-layout>
