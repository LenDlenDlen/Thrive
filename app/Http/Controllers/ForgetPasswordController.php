<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class ForgetPasswordController extends Controller

{
    public function showChangePassword()
    {
        return view("auth.ForgetPassword");
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => ['required', 'confirmed', Password::min(6)],
        ]);

        // Check if the current password is correct
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        /** @var \App\Models\User $user **/
        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->save();
        // Log out the user after password change for security
        Auth::logout();

        return redirect()->route('login')->with('success', 'Password changed successfully. Please log in again.');
    }
}
