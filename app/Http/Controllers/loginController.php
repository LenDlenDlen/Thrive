<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
    public function showLoginPage()
    {
        return view('loginPage');
    }
    public function accountLogin(Request $request)
    {
        
    }
}
