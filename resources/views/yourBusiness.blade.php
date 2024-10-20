@extends('layouts.master')

@section('title', 'Your Business')

@section('content')
<div class="container mx-auto p-4">
    <div class="flex">
        <!-- Left Sidebar -->
        <div class="w-1/4 bg-gray-100 p-4">
            <!-- Profile Section -->
            <div class="mb-4 flex items-center space-x-2">
                <img src="path-to-profile-image.jpg" alt="Profile Image" class="w-12 h-12 rounded-full">
                <h3 class="text-lg font-bold">{{ auth()->user()->name }}</h3> <!-- Display logged-in user's name -->
            </div>

            <!-- Business List (Clickable) -->
            <div class="space-y-2">
                @foreach($businesses as $business)
                    <div class="bg-red-500 h-20 flex items-center justify-center cursor-pointer"
                        onclick="showBusinessDetails({{ $business->id }}, '{{ $business->name }}', '{{ $business->description }}')">
                        <h3 class="text-white font-bold">{{ $business->name }}</h3>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Main Content -->
        <div class="w-3/4 p-4">
            <!-- Business Image and Info -->
            <div class="mb-4 flex items-center space-x-2">
                <img src="path-to-profile-image.jpg" alt="Profile Image" class="w-12 h-12 rounded-full">
                <h3 class="text-lg font-bold">{{ auth()->user()->name }}</h3> <!-- Display logged-in user's name -->
            </div>

            <!-- Business Description and Image -->
            <div id="businessImageContainer" class="mb-4 h-64 flex items-center justify-center">
                <img id="businessImage" src="" alt="Business Image" class="h-full object-contain">
            </div>
            <h2 id="businessName" class="text-xl font-bold"></h2>
            <p id="businessDescription" class="text-sm">Click a business to see the description here.</p>

            <!-- Arrow Controls (For Multiple Images) -->
            <div id="imageNav" class="flex justify-between mt-4">
                <button id="prevImage" class="bg-gray-300 p-2 rounded" onclick="prevImage()">← Prev</button>
                <button id="nextImage" class="bg-gray-300 p-2 rounded" onclick="nextImage()">Next →</button>
            </div>
        </div>
    </div>
</div>

<script>
    let images = [];
    let currentImageIndex = 0;

    function showBusinessDetails(businessId, name, description) {
        document.getElementById('businessName').textContent = name;
    document.getElementById('businessDescription').textContent = description;

    // Fetch images for the selected business
    fetch(`/business/${businessId}/images`)
        .then(response => response.json())
        .then(data => {
            images = data.images;
            currentImageIndex = 0;
            if (images.length > 0) {
                // Show the first image
                document.getElementById('businessImage').src = `/storage/${images[0].image_path}`;
            } else {
                document.getElementById('businessImage').src = '';
            }
        });
    }

    function prevImage() {
        if (images.length > 0) {
            currentImageIndex = (currentImageIndex === 0) ? images.length - 1 : currentImageIndex - 1;
            document.getElementById('businessImage').src = `/storage/business_photos/${images[currentImageIndex].image_path}`;
        }
    }

    function nextImage() {
        if (images.length > 0) {
            currentImageIndex = (currentImageIndex === images.length - 1) ? 0 : currentImageIndex + 1;
            document.getElementById('businessImage').src = `/storage/business_photos/${images[currentImageIndex].image_path}`;
        }
    }
</script>
@endsection
