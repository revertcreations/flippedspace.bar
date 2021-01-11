<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function show(User $user) {
        $user = Auth::user();
        return view('auth.dashboard', ['user' => $user]);
    }
}
