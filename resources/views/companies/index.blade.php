<x-layout>


    {{-- add hero partial --}}
    @include('partials._hero')
    

    
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
    @include('components.contact')
    
    {{-- BLADE WAY : Blade directives start with @ --}}
    {{-- foreach --}}
    {{-- @foreach ($companies as $company)
    {{-- This is how we call the code that was originally here and then cut/pasted into listing-card.blade.php --}}
    
        {{-- <x-company-card :company="$company" /> 
    @endforeach --}} 
    </div>
    
    {{-- adding new div to add page direct buttons : This is sick and much easier than the way we had to do it in PHP : WOO!--}}
    {{-- <div class="mt-6 p-4">
        {{$companies->links()}}
    </div> --}}
    
    
    
    
    </x-layout>