<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function showLoginPage()
    {
        return view('loginPage');
    }
    public function accountLogin(Request $request)
    {

        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('username', $credentials['username'])->first();

       if($user){
        if(Hash::check($credentials['password'], $user->password)){
            Auth::login($user);
            $request->session()->regenerate();

            return redirect()->intended('/');
            }else{
                return back()->withErrors([
                    'password' => 'The provided password is incorrect.',
                ])->withInput();
            }
        }else{
            return back()->withErrors([
                'username' => 'The provided account does not exist.',
            ])->withInput();
        }
    }

    public function accountLogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
