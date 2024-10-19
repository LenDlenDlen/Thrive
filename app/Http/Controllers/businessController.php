<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Business;

class businessController extends Controller
{
    public function store(Request $request)
    {
        // dd(csrf_token(), $request->input('_token'));
        // Validate the request data
        $validated = $request->validate([
            'businessName' => 'required|string|max:255',
            'productDescription' => 'nullable|string',
            'category' => 'required|string',
            'productPhoto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // File upload
        ]);

        // Handle file upload
        if ($request->hasFile('productPhoto')) {
            $photoPath = $request->file('productPhoto')->store('business_photos', 'public');
        } else {
            $photoPath = null;
        }

        // Create a new business entry
        $business = new Business;
        $business->user_id = auth()->id(); // assuming the user is authenticated
        $business->name = $validated['businessName'];
        $business->description = $validated['productDescription'];
        $business->category = $validated['category'];
        $business->photo = $photoPath;
        $business->save();

        // Redirect after saving
        return redirect()->back()->with('success', 'Business created successfully!');
    }
}
