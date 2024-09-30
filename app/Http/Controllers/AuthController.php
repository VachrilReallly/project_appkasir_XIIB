<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
    
    public function login(Request $request)
{
    // Skipping validation for simplicity
    Auth::loginUsingId(1); // Login bypass
    return redirect()->route('dashboard');
}
}
