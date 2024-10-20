@extends('layouts.master')
@section('title', 'Start Your Business')
@section('content')
<div class="h-screen bg-cover bg-center flex items-center justify-end relative" style="background-image: url('your-background-image.jpg');">

    <div class="absolute top-0 left-0 h-full w-1/3 bg-orange-300 bg-opacity-50 flex flex-col justify-center items-center">
        <h2 class="text-3xl font-semibold text-black text-center leading-tight">Help Others</h2>
        <div class="flex gap-1 mt-2">
            <h2 class="text-4xl font-extrabold text-black text-center">Thrive</h2>
            <h2 class="text-3xl font-light text-black text-center">Together</h2>
        </div>
    </div>

    <div class="w-2/3 h-full flex justify-center pr-8 items-center">
        <div class="bg-white bg-opacity-90 p-6 rounded-lg shadow-xl w-full max-w-sm text-center">
            <h2 class="text-2xl font-extrabold mb-4 text-orange-600">Start Your Business</h2>
            <p class="text-sm text-gray-600 mb-4">Share your passion with the world and raise funds to turn your ideas into reality!</p>

            <form action="{{ route('startBusiness.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <!-- Business Name -->
                <div class="text-left">
                    <label for="businessName" class="text-sm font-semibold mb-1">Business Name</label>
                    <input type="text" id="businessName" name="businessName" placeholder="Business Name" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent placeholder-gray-400 transition duration-150 ease-in-out text-sm">
                </div>

                <!-- Business Description -->
                <div class="text-left">
                    <label for="productDescription" class="text-sm font-semibold mb-1">Business Description</label>
                    <textarea id="productDescription" name="productDescription" placeholder="Describe your business..." required
                        class="w-full h-24 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent placeholder-gray-400 resize-none transition duration-150 ease-in-out text-sm"></textarea>
                </div>

                <!-- Business Category -->
                <div class="text-left">
                    <label for="category" class="text-sm font-semibold mb-1">Business Category</label>
                    <select id="category" name="category" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition duration-150 ease-in-out text-sm">
                        <option value="" disabled selected>Choose Category</option>
                        <option value="Food & Beverages">Food and Beverages</option>
                        <option value="Services">Services</option>
                        <option value="Retail">Retail</option>
                        <option value="Apparels">Apparels</option>
                        <option value="Art & Crafts">Art and Crafts</option>
                        <option value="Games">Games</option>
                        <option value="Movie & Short Films">Movie and Short Films</option>
                    </select>
                </div>

                <!-- Goal Amount -->
                <div class="text-left">
                    <label for="goalAmount" class="text-sm font-semibold text-gray-700 mb-1">Goal Amount (in Rupiah)</label>
                    <input type="number" id="goalAmount" name="goalAmount" placeholder="Fundraising goal" min="0" step="1000" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent placeholder-gray-400 transition duration-150 ease-in-out text-sm">
                </div>

                <!-- Upload Business Images -->
                <div class="text-left">
                    <label for="productPhotos" class="text-sm font-semibold mb-1">Upload Business Images</label>
                    <input type="file" id="productPhotos" name="productPhotos[]" accept="image/*" multiple required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition duration-150 ease-in-out text-sm">
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full bg-orange-600 text-white py-2 rounded-md font-semibold hover:bg-orange-700 transition-colors duration-200 ease-in-out text-sm">
                    Launch Business
                </button>
            </form>
        </div>
    </div>
</div>
@endsection