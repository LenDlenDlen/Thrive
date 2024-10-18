@extends('layouts.master')
@section('title','Home Page')
@section('content')
    <div class="max-w-md mx-auto mt-10">
        <label for="message" class="block text-sm font-medium text-gray-900 mb-1">What's on Your Thoughts?</label>
        <textarea id="message" name="message" rows="4"
        class="block w-full rounded-md border border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-gray-900 sm:text-sm p-2 mb-2"
        placeholder="Write something..."></textarea>
        <div class="flex justify-end space-x-2">
            <button class="bg-white px-2 rounded-md border shadow-sm">Cancel</button>
            <button class="bg-orange-600 text-white px-4 rounded-md border shadow-sm hover:bg-orange-700 hover:shadow-sm">Post</button>
        </div>
    </div>

    <div class="container mx-auto p-5 mt-10 rounded-md shadow-md">
        <h2 class="text-2xl font-semibold ">Top Enterprise Funded</h2>
        <!-- Slider Container -->
        <div class="relative max-w-lg mx-auto mt-5 overflow-hidden">
            <!-- Slider Content (Images) -->
            <div id="slider" class="flex transition-transform duration-500">
                <img src="https://via.placeholder.com/600x300?text=Slide+1"
                    class="w-full flex-shrink-0" alt="Slide 1">
                <img src="https://via.placeholder.com/600x300?text=Slide+2"
                    class="w-full flex-shrink-0" alt="Slide 2">
                <img src="https://via.placeholder.com/600x300?text=Slide+3"
                    class="w-full flex-shrink-0" alt="Slide 3">
            </div>

            <!-- Navigation Buttons -->
            <button id="prev"
                    class="absolute left-2 top-1/2 -translate-y-1/2 bg-white px-4 py-2 shadow-md">
                Prev
            </button>
            <button id="next"
                    class="absolute right-2 top-1/2 -translate-y-1/2 bg-white px-4 py-2 shadow-md">
                Next
            </button>
        </div>
    </div>

    <div class="container mx-auto p-5 mt-10 rounded-md shadow-m mb-10">
        <div class="max-w-sm mx-auto bg-white rounded-xl shadow-md overflow-hidden">
            <img src="https://via.placeholder.com/400x200"
                 alt="Sample Image" class="w-full">
            <div class="p-4">
              <h2 class="text-xl font-bold mb-2">Card Title</h2>
              <p class="text-gray-600 mb-4">
                This is a simple card component with a title, some text, and a button.
              </p>
              <button
                class="bg-orange-600 hover:bg-orange-700 text-white px-4 py-2 rounded">
                Learn More
              </button>
            </div>
        </div>

        <div class="max-w-sm mx-auto bg-white rounded-xl shadow-md overflow-hidden mt-5">
            <img src="https://via.placeholder.com/400x200"
                 alt="Sample Image" class="w-full">
            <div class="p-4">
              <h2 class="text-xl font-bold mb-2">Card Title</h2>
              <p class="text-gray-600 mb-4">
                This is a simple card component with a title, some text, and a button.
              </p>
              <button
                class="bg-orange-600 hover:bg-orange-700 text-white px-4 py-2 rounded">
                Learn More
              </button>
            </div>
        </div>

        <div class="max-w-sm mx-auto bg-white rounded-xl shadow-md overflow-hidden mt-5">
            <img src="https://via.placeholder.com/400x200"
                 alt="Sample Image" class="w-full">
            <div class="p-4">
              <h2 class="text-xl font-bold mb-2">Card Title</h2>
              <p class="text-gray-600 mb-4">
                This is a simple card component with a title, some text, and a button.
              </p>
              <button
                class="bg-orange-600 hover:bg-orange-700 text-white px-4 py-2 rounded">
                Learn More
              </button>
            </div>
        </div>
    </div>
@endsection
