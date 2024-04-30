<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;

class UserController extends Controller
{
    // Home screen
    public function home()
    {
        if(auth()->check()){
            $user = auth()->user();
            return view('home', compact('user'));
        } else {
            return redirect()->route('login.show')->with('errors', ['Log in first to access']);
        }
    }

    // Login form
    public function showLogin()
    {
        return view('auth.login');
    }

    // Login post
    public function login(Request $request)
    {
        // Login credentials validation
        $credentials = $request->validate([
            'nick' => 'required|string',
            'password' => 'required|string',
        ]);

        // Log in the user with Auth
        if(Auth::attempt($credentials)){
            return redirect()->intended('/');
        } else {
            return back()->with('errors', ['Invalid credentials']);
        }
    }

    // Register form
    public function showRegister()
    {
        return view('auth.register');
    }

    // Register
    public function register(Request $request)
    {
        try{
            // Register credentials validation
            $validatedData = $request->validate([
                "nick" => "required|string|max:255",
                "password" => "required|string|confirmed",
            ]);
    
            // Register the user
            $validatedData["password"] = Hash::make($validatedData["password"]);
            User::create($validatedData);
    
        } catch (\Exception $e) {
            return redirect()->back()->with("errors", [$e->getMessage()]);
        }
        return redirect()->route("login.show")->with("success", "Successfully registered");
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        return redirect('/');
    }
}
