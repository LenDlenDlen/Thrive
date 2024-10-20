@extends('layouts.master')
@section('title','Fund Page')
@section('content')
<body class="bg-gray-100 min-h-screen" x-data="{ openModal: false }">

    <!-- Main Content -->
    <main class="container mx-auto p-6 lg:p-10 max-w-7xl">
        @if(session('success'))
            <div id="success-message" class="flex flex-col bg-green-500 text-white p-4 rounded mb-4 text-center">
                {{ session('success') }}
            </div>
         @endif
        <!-- Flexbox to align content with header (logo and user greeting) -->
        <div class="flex flex-col lg:flex-row justify-center lg:justify-between items-center">
            <!-- Left Section with Image and Info -->
            <div class="bg-white shadow-md rounded-lg p-4">
                <div class="relative" x-data="slider()">
                    <!-- Slideshow Container -->
                    <div class="relative w-full h-80 lg:h-96 overflow-hidden">
                        @if($business->images->isNotEmpty())
                            <div class="relative w-full h-full flex transition-transform duration-500">
                                @foreach ($business->images as $index => $image)
                                    <img src="{{ Storage::url($image->image_path) }}" alt="{{ $business->name }}" 
                                        class="w-full h-80 lg:h-96 object-cover"  
                                        :class="{ 'hidden': currentImage !== {{ $index }} }">
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <!-- Left and Right Navigation Buttons -->
                    <button @click="prev()" 
                            class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white px-2 py-1 rounded-full shadow-md">
                        &#8592;
                    </button>
                    <button @click="next()" 
                            class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white px-2 py-1 rounded-full shadow-md">
                        &#8594;
                    </button>
                </div>

                <!-- Business Info -->
                <div class="mt-4 flex justify-between items-center">
                    <div>
                        <h2 class="text-lg font-bold">{{ $business->name }}</h2>
                        <p class="text-sm text-gray-500">{{'@'}}{{ $business->user->username }} - {{ $business->created_at->format('d M Y') }}</p>
                    </div>
                    <!-- Business Status Tagline -->
                    <span class="text-sm font-bold {{ $business->status === 'done' ? 'text-green-600' : 'text-red-600' }}">
                        {{ $business->status === 'done' ? 'Done' : 'Active' }}
                    </span>
                </div>

                <p class="mt-4">
                    {{$business->description}}
                </p>

                <div class="mt-6">
                    <div class="text-orange-600 font-bold">
                        Rp. {{ number_format($business->raised_amount) }} / Rp. {{ number_format($business->goal_amount) }}
                    </div>
                    <div class="w-full bg-gray-300 rounded-full h-4 mt-2">
                        <div class="bg-orange-400 h-4 rounded-full" 
                             style="width: {{ min(($business->raised_amount / $business->goal_amount) * 100, 100) }}%;">
                        </div>
                    </div>
                    <p class="mt-2">
                        Interested? Fund Now!
                    </p>
                </div>

                <!-- Fund Button -->
            @if($business->status !== 'done')
                <div class="flex justify-end mt-4">
                    <button class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-6 rounded-md"
                        @click="openModal = true">
                        Fund Now
                    </button>
                </div>
            @endif
            </div>
        </div>

        <!-- Modal for Donation -->
        <div x-show="openModal" x-cloak class="fixed inset-0 flex items-center justify-center z-50">
            <!-- Overlay -->
            <div class="fixed inset-0 bg-gray-800 bg-opacity-75" @click="openModal = false"></div>

            <!-- Modal Content -->
            <div class="bg-white p-6 rounded-lg shadow-lg w-1/3 z-10" @click.away="openModal = false" x-transition>
                <h2 class="text-xl font-bold mb-4">Donate to {{ $business->name }}</h2>
                <p class="mb-4">Enter the amount you wish to donate:</p>
                <form action="{{ route('fund.donate', $business->id) }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="amount" class="block text-sm font-medium text-gray-700">Donation Amount (Rp)</label>
                        <input type="number" name="amount" id="amount" class="mt-1 p-2 border rounded-md w-full focus:ring-orange-500 focus:border-orange-500" step="1000">
                    </div>
                    <div class="flex justify-end">
                        <button type="button" @click="openModal = false" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-md mr-2">Cancel</button>
                        <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded-md">Donate</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <!-- Alpine.js Script for Slideshow and Modal -->
    <script>
        function slider() {
            return {
                currentImage: 0,
                imagesCount: {{ $business->images->count() }},
                next() {
                    this.currentImage = (this.currentImage + 1) % this.imagesCount;
                },
                prev() {
                    this.currentImage = (this.currentImage - 1 + this.imagesCount) % this.imagesCount;
                }
            }
        }
    </script>

</body>
@endsection