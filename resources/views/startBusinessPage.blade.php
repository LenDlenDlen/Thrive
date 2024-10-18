@extends('layouts.master')
@section('title','Start Your Business')
@section('content')
<div class="h-screen bg-cover bg-center flex items-center justify-end relative" style="background-image: url('your-background-image.jpg');">

    <div class="absolute top-0 left-0 h-full w-1/3 bg-orange-300 bg-opacity-50 flex flex-col justify-center items-center">
        <h2 class="text-3xl font-meidum text-black text-center">Help Others</h2>
        <div class="flex">
            <h2 class="text-3xl font-extrabold text-black text-center">Thrive </h2>
            <h2 class="text-3xl font-medium text-black text-center"> Together</h2>
        </div>

    </div>

    <div class="w-2/3 h-full flex justify-center pr-12 items-center">
        <div class="bg-white bg-opacity-80 p-8 rounded-lg shadow-lg w-full max-w-md text-center">
            <h2 class="text-2xl font-bold mb-6">Let's start your own Business</h2>

            <form action="{{ route('startBusiness.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <input type="text" name="businessName" placeholder="Business Name" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                </div>

                <div class="mb-4">
                    <textarea name="productDescription" placeholder="Describe your business" required
                        class="w-full h-32 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent text-sm resize-none"></textarea>
                </div>

                <div class="mb-4">
                    <select name="category" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                        <option value="" disabled selected>Category</option>
                        <option value="Food and Beverages">Food and Beverages</option>
                        <option value="Services">Services</option>
                        <option value="Retail">Retail</option>
                    </select>
                </div>

                <div class="mb-6">
                    <input type="file" name="productPhoto" accept="image/*" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                </div>

                <button type="submit"
                    class="w-full bg-orange-500 text-white py-2 rounded-md hover:bg-orange-600 transition-colors">
                    Start Business
                </button>
            </form>

        </div>
    </div>

</div>
@endsection
