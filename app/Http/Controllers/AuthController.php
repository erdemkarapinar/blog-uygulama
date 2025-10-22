<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
    
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            $titleLabel = $request->getLabel('email');
            return redirect()->route('layouts.dashboard')->with('success',"{$titleLabel} Welcome.");;
        }
    
        return back()->withErrors([
            'email' => 'This credential does not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {   

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();


        return redirect()->route('login')->with('status', 'The session is closed.');
    }

     public function registerView()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {

        $user = User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('layouts.dashboard')->with('success', 'Registration successful, welcome!');
        
    }

}
