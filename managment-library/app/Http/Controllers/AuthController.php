<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //

    public function auth(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }else{
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect('/')->with('success', 'Logout successfully');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'phone' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
        ]);

        if($user){
            return redirect()->back()->with('success', 'Register successfully');
        }else{
            return redirect()->back()->with('error', 'Register failed');
        }
    }

    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $user = User::find($id);

        $user->update([
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        if($user){
            return redirect()->back()->with('success', 'Profile updated successfully');
        }else{
            return redirect()->back()->with('error', 'Profile update failed');
        }
    }
}
