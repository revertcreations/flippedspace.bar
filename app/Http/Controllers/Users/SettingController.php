<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(User $user)
    {
        $user = Auth::user();
        return view('users.settings.index', ['user' => $user]);
    }

    // public function store(User $user)
    // {
    //     $user = Auth::user();
    //     return view('my.dashboard.store', ['user' => $user]);

    //     $request->validate([
    //         'username' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users',
    //         'password' => 'required|string|min:8'
    //     ]);

    //     Auth::login($user = User::create([
    //         'username' => $request->username,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //     ]));

    //     event(new Registered($user));

    // }
}
