<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function showProfile()
    {
        $user = Auth::user();

        // Get user statistics
        $stats = [
            'accounts_count' => $user->accounts()->count(),
            'categories_count' => $user->categories()->count(),
            'movements_count' => $user->movements()->count(),
            'member_since' => $user->created_at->format('M Y'),
        ];

        return view('profile.index', compact('user', 'stats'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'current_password' => ['nullable', 'current_password'],
            'password' => ['nullable', 'confirmed', Password::defaults()],
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        // Only update password if provided
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('profile.index')->with('success', 'Profil mis à jour avec succès !');
    }
}

