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
        return view('users.login');
    }

    public function login(LoginRequest $request)
    {
    
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
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
        return view('users.register');
    }

    public function register(RegisterRequest $request)
    {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('dashboard')->with('status', 'Registration successful, welcome!');
    }

    public function destroy(Request $request)
    {
        $user = Auth::user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('users.register')->with('status', 'Your account has been deleted.');
    }
}
