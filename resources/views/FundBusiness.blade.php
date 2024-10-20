@extends('layouts.master')

@section('content')

<div class="container mx-auto mt-4">
    <!-- Category selection section -->
    <div class="mt-6">
        <h2 class="text-2xl font-bold mb-4">Category</h2>
        <hr class="h-px mb-5 dark:bg-gray-400">
        <div class="flex justify-center items-center gap-4">
            <a href={{ route('FundByCategory', ['category' => 'Food & Beverages']) }}  class="flex justify-center items-center w-1/4 h-10 rounded-md hover:bg-gray-400 rounded-md transition-all">Food & Beverages</a>
            <a href={{ route('FundByCategory', ['category' => 'Services']) }}  class="flex justify-center items-center w-1/4 h-10 rounded-md hover:bg-gray-400 rounded-md">Services</a>
            <a href={{ route('FundByCategory', ['category' => 'Retails']) }}  class="flex justify-center items-center w-1/4 h-10 rounded-md hover:bg-gray-400 rounded-md transition-all">Retails</a>
            <a href={{ route('FundByCategory', ['category' => 'Apparels']) }}  class="flex justify-center items-center w-1/4 h-10 rounded-md hover:bg-gray-400 rounded-md transition-all">Apparels</a>
            <a href={{ route('FundByCategory', ['category' => 'Art & Crafts']) }}  class="flex justify-center items-center w-1/4 h-10 rounded-md hover:bg-gray-400 rounded-md transition-all">Art & Crafts</a>
            <a href={{ route('FundByCategory', ['category' => 'Games']) }}  class="flex justify-center items-center w-1/4 h-10 rounded-md hover:bg-gray-400 rounded-md transition-all">Games</a>
            <a href={{ route('FundByCategory', ['category' => 'Movie & Short Films']) }}  class="flex justify-center items-center w-1/4 h-10 rounded-md hover:bg-gray-400 rounded-md transition-all">Movie & Short Films</a>
        </div>
        <hr class="h-px mt-5 dark:bg-gray-400">
    </div>

    <h2 class="text-2xl font-bold mb-4 mt-5">
        @if (isset($category))
            Businesses in {{ $category }}
        @else
            Top Businesses Funded
        @endif
    </h2>

    @if (isset($category) && $businesses->isNotEmpty())
    <div class="mt-8">
        <div class="grid grid-cols-3 gap-4">
            @foreach($businesses as $business)
            {{-- div per card --}}
                <div class="bg-gray-300 flex-col rounded-lg">
                    {{-- div buat gambar --}}
                    <div class="flex space-x-2 justify-center mt-2">
                        @if($business->images->isNotEmpty())
                        @foreach ($business->images as $image)
                            <img src={{ asset($image->image_path) }} alt={{ $business->name }} class="w-40 h-40 object-cover rounded-md">
                        @endforeach
                        @endif
                    </div>
                    <div class="space-x-2 items-center">
                        <h3 class="text-center font-bold mt-4"> {{ $business->name }} </h3>
                        <p class="text-center"> {{ $business->description }} </p>
                        <button>View</button>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
    @else
    <div class="text-bold col-span-3 text-xl text-center text-gray-500 mt-10">No businesses found for this category.</div>
    @endif



@endsection
