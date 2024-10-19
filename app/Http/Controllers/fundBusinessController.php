<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class fundBusinessController extends Controller
{
    public function showFundBusiness(){
        return view("FundBusiness");
    }
}
