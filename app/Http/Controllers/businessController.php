<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Business;
use App\Models\BusinessImage;

class businessController extends Controller
{
    public function showStartBusiness(){
        return view('startBusinessPage');
    }

    public function showYourBusiness(){
        return view('yourBusiness');
    }

    public function getBusinessImages($id)
{
    // Fetch the images for the business
    $images = BusinessImage::where('business_id', $id)->get(['image_path']);

    // Return the images as a JSON response
    return response()->json(['images' => $images]);
}


    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'businessName' => 'required|string|max:255',
            'productDescription' => 'nullable|string',
            'category' => 'required|string',
            'productPhotos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate each image
        ]);

        // Create a new business entry
        $business = new Business;
        $business->user_id = auth()->id(); // assuming the user is authenticated
        $business->name = $validated['businessName'];
        $business->description = $validated['productDescription'];
        $business->category = $validated['category'];
        $business->save(); // Save the business first so we can attach images to it

        // Handle file uploads
        if ($request->hasFile('productPhotos')) {
            foreach ($request->file('productPhotos') as $photo) {
                $photoPath = $photo->store('business_photos', 'public');
                // Create BusinessImage for each uploaded image
                $businessImage = new BusinessImage;
                $businessImage->business_id = $business->id;
                $businessImage->image_path = $photoPath;
                $businessImage->save();
            }
        }

        // Redirect after saving
        return redirect()->back()->with('success', 'Business created successfully!');
    }

    public function showBusinessList() {
        // Fetch all businesses for the authenticated user
        $businesses = Business::where('user_id', auth()->id())->get();

        // Pass the businesses to the view
        return view('yourBusiness', compact('businesses'));
    }
}
