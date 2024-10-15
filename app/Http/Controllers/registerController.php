<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class registerController extends Controller
{
    public function showRegisterPage()
    {
        return view('registerPage');
    }

    public function accountRegister(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'username' => 'required|unique:users,username|max:255|min:4',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'name' => 'required|string|min:4',
        ], [
            'password.confirmed' => 'Password does not match.',
        ]);

        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
        }

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Account created successfully!');
    }
}
