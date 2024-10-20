@extends('layouts.master')

@section('content')

<div class="container mx-auto mt-4">
    <!-- Category selection section -->
    <div class="mt-6">
        <h2 class="text-2xl font-bold mb-4">Category</h2>
        <hr class="h-1 mb-5">
        <div class="flex justify-center items-center gap-4">
            <a href={{ route('FundByCategory', ['category' => 'Food&Beverages']) }}  class="flex justify-center items-center w-1/4 h-10 rounded-md hover:bg-gray-400 rounded-md transition-all">Food & Beverages</a>
            <a href={{ route('FundByCategory', ['category' => 'Services']) }}  class="flex justify-center items-center w-1/4 h-10 rounded-md hover:bg-gray-400 rounded-md">Services</a>
            <a href={{ route('FundByCategory', ['category' => 'Retails']) }}  class="flex justify-center items-center w-1/4 h-10 rounded-md hover:bg-gray-400 rounded-md">Retails</a>
            <a href={{ route('FundByCategory', ['category' => 'Apparels']) }}  class="flex justify-center items-center w-1/4 h-10 rounded-md hover:bg-gray-400 rounded-md">Apparels</a>
            <a href={{ route('FundByCategory', ['category' => 'Art&Crafts']) }}  class="flex justify-center items-center w-1/4 h-10 rounded-md hover:bg-gray-400 rounded-md">Art & Crafts</a>
            <a href={{ route('FundByCategory', ['category' => 'Games']) }}  class="flex justify-center items-center w-1/4 h-10 rounded-md hover:bg-gray-400 rounded-md">Games</a>
            <a href={{ route('FundByCategory', ['category' => 'Movie&Short_Films']) }}  class="flex justify-center items-center w-1/4 h-10 rounded-md hover:bg-gray-400 rounded-md">Movie & Short Films</a>
        </div>
        <hr class="h-2 mt-5">
    </div>

    <h2 class="text-2xl font-bold mb-4 mt-5">
        @if (request()->has('category'))
            Businesses in {{ $category }}
        @else
            Top Businesses Funded
        @endif
    </h2>

    @if (request()->has('category'))

    <div class="mt-8">
        <div class="grid grid-cols-3 gap-4">
            @forelse($businesses as $business)
                <div class="bg-gray-300 h-40 rounded-lg hover:bg-gray-400 rounded-md">
                    <div class="flex space-x-2">
                        @foreach ($business->images as $image)
                            <img src="{{ asset($image->image_path) }}" alt="{{ $business->name }}" class="w-20 h-20 object-cover rounded-md">
                        @endforeach
                    </div>
                    <h3 class="text-center font-bold mt-4"> {{ $business->name }} </h3>
                    <p class="text-center"> {{ $business->description }} </p>
                </div>
            @empty
                <div class="text-bold col-span-3 text-center text-gray-500">No businesses found for this category.</div>
            @endforelse
        </div>
    </div>

    @else
    <div class="mt-8">
        <div class="grid grid-cols-3 gap-4">
            <!-- Example businesses -->
            <div class="bg-gray-300 h-40 rounded-lg hover:bg-gray-400"></div>
            <div class="bg-gray-300 h-40 rounded-lg hover:bg-gray-400"></div>
            <div class="bg-gray-300 h-40 rounded-lg hover:bg-gray-400"></div>
        </div>
    </div>
    @endif



@endsection
