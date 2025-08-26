<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.index', compact('users'));
    }

    public function updateUserRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|in:user,designer',
        ]);

        $user->role = $request->role;
        $user->save();

        return redirect()->back()->with('success', 'User role updated successfully.');
    }
}
