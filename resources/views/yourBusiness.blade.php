@extends('layouts.master')

@section('title', 'Your Business')

@section('content')
<div class="container mx-auto p-6">
    <div class="flex gap-6">
        <!-- Left Sidebar -->
        <div class="bg-orange-100 p-6 rounded-lg shadow-md" style="width: 25%; min-height: auto; max-height: 500px; overflow-y: auto;">
            <!-- Profile Section -->
            <div class="mb-6 flex items-center space-x-3">
                <h3 class="text-lg font-bold">{{ auth()->user()->name }}</h3> <!-- Display logged-in user's name -->
            </div>

            <!-- Business List (Clickable) -->
            @if ($businesses->isEmpty())
                <p class="text-gray-600">You have no business.</p>
            @else
                <!-- Dynamically adjust the height based on the number of businesses -->
                <div class="space-y-4">
                    @foreach($businesses as $business)
                        <div class="bg-orange-400 p-4 rounded-md shadow-md flex items-center justify-center cursor-pointer transition duration-200 ease-in-out hover:bg-orange-500"
                            onclick="showBusinessDetails({{ $business->id }}, '{{ $business->name }}', '{{ $business->description }}', {{ $business->goal_amount }}, {{ $business->raised_amount }})">
                            <h3 class="text-white font-bold">{{ $business->name }}</h3>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Main Content -->
        <div id="mainContent" class="w-3/4 p-6 bg-white rounded-lg shadow-md" style="display:none;">
            <!-- Business Title -->
            <h1 id="businessName" class="text-3xl font-bold mb-6"></h1>

            <!-- Business Description and Image -->
            <div id="businessImageContainer" class="relative mb-6 rounded-lg overflow-hidden bg-gray-100" style="height: 300px; position: relative;">
                <button id="prevImage" class="absolute left-3 top-1/2 transform -translate-y-1/2 bg-orange-300 h-10 w-10 flex items-center justify-center rounded-full shadow-lg hover:bg-orange-400 transition duration-200 ease-in-out" onclick="prevImage()">←</button>
                <img id="businessImage" src="" alt="Business Image" class="h-full w-full object-cover">
                <button id="nextImage" class="absolute right-3 top-1/2 transform -translate-y-1/2 bg-orange-300 h-10 w-10 flex items-center justify-center rounded-full shadow-lg hover:bg-orange-400 transition duration-200 ease-in-out" onclick="nextImage()">→</button>
            </div>

            <!-- Business Description -->
            <div class="bg-orange-100 p-4 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-2">Business Description</h2>
                <p id="businessDescription" class="text-base leading-6 text-gray-700"></p>
            </div>

            <!-- Goal Amount and Raised Amount -->
            <div class="bg-orange-100 p-4 rounded-lg shadow-md mt-4">
                <h2 class="text-xl font-semibold mb-2">Funding Progress</h2>
                <p><strong>Goal Amount:</strong> Rp. <span id="goalAmount"></span></p>
                <p><strong>Raised Amount:</strong> Rp. <span id="raisedAmount"></span></p>
            </div>
        </div>

        <!-- Message when no business is selected -->
        <div id="selectBusinessMessage" class="w-3/4 p-6 bg-white rounded-lg shadow-md">
            @if ($businesses->isNotEmpty())
                <p class="text-lg font-bold text-center">Select a business to view details</p>
            @endif
        </div>
    </div>
</div>

<script>
    let images = [];
    let currentImageIndex = 0;

    function showBusinessDetails(businessId, name, description, goalAmount, raisedAmount) {
        document.getElementById('businessName').textContent = name;
        document.getElementById('businessDescription').textContent = description;
        document.getElementById('goalAmount').textContent = goalAmount;
        document.getElementById('raisedAmount').textContent = raisedAmount;

        // Fetch images for the selected business
        fetch(`/business/${businessId}/images`)
            .then(response => response.json())
            .then(data => {
                images = data.images;
                currentImageIndex = 0;
                if (images.length > 0) {
                    // Show the first image using the correct path
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
