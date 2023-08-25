<x-layout>


    {{-- add hero partial --}}
    @include('partials._hero')

    {{-- Only authorized users can access the search bar --}}
    @auth
    @include('partials._search')
    @endauth
    {{-- News Api --}}
    @include('components.news')

    @include('components.aboutUs')
    {{-- c27b5612b9msh8ab4f6395705c09p18166cjsn91e9563d42d2   --}}

    @include('components.contactForm')
</x-layout>
