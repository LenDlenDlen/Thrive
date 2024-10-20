@extends('layouts.master')

@section('title', 'Your Business')

@section('content')
<div class="container mx-auto p-4">
    <div class="flex">
        <!-- Left Sidebar -->
        <div class="w-1/4 bg-gray-100 p-4">
            <!-- Profile Section -->
            <div class="mb-4 flex items-center space-x-2">
                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Profile Image" class="w-12 h-12 rounded-full">
                <h3 class="text-lg font-bold">{{ auth()->user()->name }}</h3> <!-- Display logged-in user's name -->
            </div>

            <!-- Business List (Clickable) -->
            @if ($businesses->isEmpty())
                <p class="text-gray-600">You have no business.</p>
            @else
                <div class="space-y-2">
                    @foreach($businesses as $business)
                        <div class="bg-red-500 h-20 flex items-center justify-center cursor-pointer"
                            onclick="showBusinessDetails({{ $business->id }}, '{{ $business->name }}', '{{ $business->description }}')">
                            <h3 class="text-white font-bold">{{ $business->name }}</h3>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Main Content -->
        <div id="mainContent" class="w-3/4 p-4" style="display:none;">
            <!-- Business Image and Info -->
            <div class="mb-4 flex items-center space-x-2">
                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Profile Image" class="w-12 h-12 rounded-full">
                <h3 class="text-lg font-bold">{{ auth()->user()->name }}</h3> <!-- Display logged-in user's name -->
            </div>

            <!-- Business Description and Image -->
            <div id="businessImageContainer" class="mb-4 h-64 flex items-center justify-center">
                <img id="businessImage" src="" alt="Business Image" class="h-full object-contain">
            </div>
            <h2 id="businessName" class="text-xl font-bold"></h2>
            <p id="businessDescription" class="text-sm"></p>

            <!-- Arrow Controls (For Multiple Images) -->
            <div id="imageNav" class="flex justify-between mt-4">
                <button id="prevImage" class="bg-gray-300 p-2 rounded" onclick="prevImage()">← Prev</button>
                <button id="nextImage" class="bg-gray-300 p-2 rounded" onclick="nextImage()">Next →</button>
            </div>
        </div>

        <!-- Message when no business is selected -->
        <div id="selectBusinessMessage" class="w-3/4 p-4">
            @if ($businesses->isNotEmpty())
                <p class="text-lg font-bold text-center">Select a business to view details</p>
            @endif
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
                    document.getElementById('prevImage').style.display = 'block'; // Show arrow controls
                    document.getElementById('nextImage').style.display = 'block'; // Show arrow controls
                } else {
                    // If no images, clear the image and hide arrow controls
                    document.getElementById('businessImage').src = '';
                    document.getElementById('prevImage').style.display = 'none';
                    document.getElementById('nextImage').style.display = 'none';
                }
            });

        // Hide the initial message and show the business details
        document.getElementById('selectBusinessMessage').style.display = 'none';
        document.getElementById('mainContent').style.display = 'block';
    }

    function prevImage() {
        if (images.length > 0) {
            currentImageIndex = (currentImageIndex === 0) ? images.length - 1 : currentImageIndex - 1;
            document.getElementById('businessImage').src = `/storage/${images[currentImageIndex].image_path}`;
        }
    }

    function nextImage() {
        if (images.length > 0) {
            currentImageIndex = (currentImageIndex === images.length - 1) ? 0 : currentImageIndex + 1;
            document.getElementById('businessImage').src = `/storage/${images[currentImageIndex].image_path}`;
        }
    }
</script>
@endsection
