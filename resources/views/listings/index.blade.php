{{-- @extends('layout')

@section('content') --}}
<x-layout>
    @include('partials/_hero')
    @include('partials/_search')

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

        {{-- @php
            $test = 1;
        @endphp
        {{$test}}

        @if(count($listings) == 0)
        <p>No listings found</p>
        @endif --}}

        @unless(count($listings) == 0)
        @foreach($listings as $listing)
            <x-listing-card :listing="$listing" />
        @endforeach

        @else
        <p>No listings found</p>
        @endunless

    </div>
{{-- @endsection --}}

<div class="mt-6 p-4">
    {{$listings->links()}}
    {{-- pagination: php artisan vendor:publish -> PaginationServiceProvider --}}
</div>

</x-layout>