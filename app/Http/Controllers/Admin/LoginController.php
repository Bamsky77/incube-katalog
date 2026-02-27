<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // For this project, we'll automatically log in the first admin user
        $user = User::where('email', 'ibam@admin.com')->first();
        
        if ($user) {
            Auth::login($user);
            return redirect()->route('admin.dashboard');
        }

        return redirect()->back()->with('error', 'Administrator tidak ditemukan.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
