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
}
