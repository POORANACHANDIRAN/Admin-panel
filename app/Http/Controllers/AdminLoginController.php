<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('layouts.login'); // Ensure this view exists
    }

    public function login(Request $req)
    {
        $user = Admin::where('email', $req->email)->first();
        
        if ($user && Hash::check($req->password, $user->password)) {
            return redirect('/dashboard')->with('success', 'Login successful!');
        } else {
            return redirect('/login')->with('error', 'Invalid credentials!');
        }
    }
}
