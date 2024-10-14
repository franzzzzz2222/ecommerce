<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    // Display the profile form
    public function index()
    {
        return view('admin.profile.index');
    }

    // Update the user's profile
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'current_password' => 'required',
            'password' => 'nullable|min:8|confirmed',
        ]);

        $user = Auth::user();

        // Verify current password
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Current password is incorrect.');
        }

        // Update user details
        $user->name = $request->name;
        $user->email = $request->email;

        // Update password if provided
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return back()->with('success', 'Profile updated successfully.');
    }

    // Delete the user's account
    public function destroy()
    {
        $user = Auth::user();
        $user->delete();

        Auth::logout();

        return redirect('/')->with('success', 'Your account has been deleted.');
    }
}
