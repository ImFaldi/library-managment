<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //

    public function addUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'role' => 'required',
            'password' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['message' => 'User created successfully', 'user' => $user]);
    }

    public function getUsers()
    {
        $users = User::all();

        return response()->json(['users' => $users]);
    }

    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'email' => 'required',
        ]);

        $user = User::find($id);

        $user->update([
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
        ]);

        return response()->json(['message' => 'User updated successfully', 'user' => $user]);
    }

    public function deleteUser($id)
    {
        $user = User::find($id);

        $user->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }

    public function getUserById($id)
    {
        $user = User::find($id);

        return response()->json(['user' => $user]);
    }

    public function changePassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required',
        ]);

        $user = User::find($id);

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['message' => 'Password changed successfully']);
    }
}
