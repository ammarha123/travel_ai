<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ManageUserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.manage-user.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('admin.manage-user.edit', compact('user')); // You'll need to create this view
    }

    public function update(Request $request, User $user)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'role' => 'required|string|max:255',
    ]);

    $user->update($validatedData);

    return redirect()->route('manage.users')->with('success', 'User updated successfully');
}


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('manage.users')->with('success', 'User deleted successfully');
    }
}
