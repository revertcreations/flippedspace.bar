<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function show(User $user) 
    {
        $user = Auth::user();
        return view('auth.dashboard', ['user' => $user]);
    }

    public function store(User $user) 
    {
        $user = Auth::user();
        return view('auth.dashboard', ['user' => $user]);

        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8'
        ]);

        Auth::login($user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]));

        event(new Registered($user));

    }
}
