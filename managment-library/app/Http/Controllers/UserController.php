<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //

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

        if($user){
            return redirect()->back()->with('success', 'User updated successfully');
        }else{
            return redirect()->back()->with('error', 'User update failed');
        }
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
