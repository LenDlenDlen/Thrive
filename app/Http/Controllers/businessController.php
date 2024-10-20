<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Business;
use App\Models\BusinessImage;
use Illuminate\Support\Facades\Auth;

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
            'goalAmount' => 'required|integer',
            'productPhotos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $business = new Business;
        $business->user_id = Auth::id();
        $business->name = $validated['businessName'];
        $business->description = $validated['productDescription'];
        $business->category = $validated['category'];
        $business->goal_amount = $validated['goalAmount'];
        $business->save();

        if ($request->hasFile('productPhotos')) {
            foreach ($request->file('productPhotos') as $photo) {
                $photoPath = $photo->store('business_photos', 'public');
                $businessImage = new BusinessImage;
                $businessImage->business_id = $business->id;
                $businessImage->image_path = $photoPath;
                $businessImage->save();
            }
        }

        return redirect()->back()->with('success', 'Business created successfully!');
    }

    public function showBusinessList() {
        // Fetch all businesses for the authenticated user
        $businesses = Business::where('user_id', Auth::id())->get();

        // Pass the businesses to the view
        return view('yourBusiness', compact('businesses'));
    }
}
