<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;

class fundBusinessController extends Controller
{
    public function showFundBusiness(){
        return view("fundBusiness");
    }

    public function showByCategory(Request $request){
        $category = $request->category;
        $businesses = Business::where('category',$category)->with('images')->get();

        return view('fundBusiness', compact('businesses', 'category'));
    }

    public function showTopBusinesses(Request $request)
    {

    }

    public function show($id)
    {
        $business = Business::findOrFail($id);
        return view("fundPage", ['business' => $business]);
    }

    public function donate(Request $request, $id) {
        $request->validate([
            'amount' => 'required|integer|min:1000'
        ]);

        $business = Business::findOrFail($id);

        $business->raised_amount += $request->input('amount');

        if ($business->raised_amount >= $business->goal_amount) {
            $business->status = 'done';
        }
    
        $business->save();

        return redirect()->back()->with('success', 'Thank you for your donation!');
    }
}
