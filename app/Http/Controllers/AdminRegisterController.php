<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail; // Import Mail facade
use App\Mail\AdminRegistered; // Import Mailable class
use App\Http\Controllers\Controller;

class AdminRegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('layouts.register');
    }

    public function register(Request $req)
    {
        // Create a new Admin instance
        $user = new Admin;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);

        // Save the new Admin to the database
        $user->save();

        // Send email notification to the registered email
        Mail::to($user->email)->send(new AdminRegistered($user));

        // Redirect to login page with a success message
        return redirect('/login')->with('success', 'Registration successful! Check your email for confirmation.');
    }
}
