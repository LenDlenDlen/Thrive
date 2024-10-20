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
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($businesses as $business)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <!-- Business Image Slider -->
                    <div class="relative overflow-hidden h-40" x-data="{ currentImage: 0 }">
                        <div class="relative w-full h-full flex transition-transform duration-500" id="slider-{{ $business->id }}">
                            @if($business->images->isNotEmpty())
    @foreach ($business->images as $index => $image)
        <img src="{{ Storage::url($image->image_path) }}" alt="{{ $business->name }}" class="w-full h-full object-cover" :class="{ 'hidden': currentImage !== {{ $index }} }">
    @endforeach
@endif
                        </div>
                        <!-- Navigation Buttons -->
                        <button @click="currentImage = (currentImage > 0) ? currentImage - 1 : {{ $business->images->count() }} - 1" class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white px-2 py-1 rounded-full shadow-md">
                            &#8592;
                        </button>
                        <button @click="currentImage = (currentImage < {{ $business->images->count() }} - 1) ? currentImage + 1 : 0" class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white px-2 py-1 rounded-full shadow-md">
                            &#8594;
                        </button>
                    </div>

                    <!-- Business Info -->
                    <div class="p-5">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-gray-900">{{ $business->name }}</h3>
                            <!-- Business Status Tagline -->
                            <span class="text-sm font-bold {{ $business->status === 'done' ? 'text-green-600' : 'text-red-600' }}">
                                {{ $business->status === 'done' ? 'Done' : 'Active' }}
                            </span>
                        </div>
                        <p class="text-gray-600 mt-2">{{ Str::limit($business->description, 80) }}</p>
                    </div>

                    <!-- Call to Action -->
                    <div class="p-4 text-left">
                        <a href="{{ route('fund.business.show', $business->id) }}" class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">
                            Read More
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @else
    <div class="text-bold col-span-3 text-xl text-center text-gray-500 mt-10">No businesses found for this category.</div>
    @endif

</div>

@endsection
