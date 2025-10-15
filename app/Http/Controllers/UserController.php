<?php

namespace App\Http\Controllers;

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
        $users = User::latest()->paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * Display a specific user profile (by slug)
     */
    public function show(User $user)
    {
        $posts = $user->posts()->latest('created_at')->paginate(10);
        return view('users.show', compact('user', 'posts'));
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

        $user->update($request->only(['username', 'bio']));

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
        Auth::logout();
        $user->delete();

        return redirect('/')->with('success', 'Your account has been deleted.');
    }
}
