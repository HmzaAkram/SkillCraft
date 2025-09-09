<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // Show profile page
    public function show()
    {
        $user = Auth::user();
        return view('profile.show', compact('user')); // alag view banayenge show ke liye
    }

    // Show edit form
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user')); // yahan form ayega
    }

    // Update profile
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|confirmed|min:8',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'skill_interests' => 'nullable|string',
            'learning_goals' => 'nullable|string',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profiles', 'public');
            $user->profile_picture = $path;
        }

        $user->skill_interests = $request->skill_interests;
        $user->learning_goals = $request->learning_goals;
        $user->save();

       return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');

    }

    // Delete account
public function destroy(Request $request)
{
    $user = Auth::user();

    Auth::logout(); // Logout user pehle
    $user->delete(); // User ka account delete

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/')->with('success', 'Your profile has been deleted successfully.');
}

}
