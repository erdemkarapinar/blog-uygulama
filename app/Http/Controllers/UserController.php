<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('homes.user', compact('users'));
    }

    /**
     * Display a specific user profile (by slug)
     */
    public function show($id)
    {   
        $user = User::findOrFail($id);
        $posts = $user->posts()->latest('created_at')->paginate(10);
        return view('homes.user_profile', compact('user', 'posts'));
    }

    /**
     * Show the form for editing the authenticated user's profile
     */
    public function edit()
    {
        $user = Auth::user();
        return view('users.edit', compact('user'));
    }

    /**
     * Update the authenticated user's profile
     */
    public function update(UpdateUserRequest $request)
    {
        
        $user = Auth::user();
        
        $user->update($request->validated());

        if ($request->hasFile('profile_photo')) {
            // Profil fotoğrafını güncelle
            $user->clearMediaCollection('profile_photo');
            $user->addMediaFromRequest('profile_photo')->toMediaCollection('profile_photo');
        }

        return redirect()->route('users.edit')->with('success', 'Profile updated successfully.');
    }

    /**
     * Remove the authenticated user's account
     */
    public function destroy()
    {
        $user = Auth::user();
        $user->delete();
        Auth::logout();

        return redirect('/')->with('success', 'Your account has been deleted.');
    }

    public function sendVerification(Request $request)
    {
        $user = Auth::user();

        if ($user && !$user->hasVerifiedEmail()) {
            $user->sendEmailVerificationNotification();
        }

        return back()->with('status', 'verification-link-sent');
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        $user = Auth::user();

        $user->update($request->validated());

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('status', 'password-updated');
    }
}
