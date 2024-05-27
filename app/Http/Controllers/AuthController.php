<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);

            return $this->authenticated();
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    protected function authenticated()
    {
        if (Auth::user()->role_as == '1') {
            // 1 = Admin Login
            return redirect('/dashboard')->with('status', 'Welcome to your dashboard');
        } elseif (Auth::user()->role_as == '0') {
            // 0 = Normal or Default User Login
            return redirect('/')->with('status', 'Logged in successfully');
        }
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($user) {
            // Put user ID in session
            $request->session()->put('user', $user->id);

            // Redirect to the login page
            return redirect('/login')->with('success', 'Registration successful. Please log in.');
        } else {
            // If user creation failed, return back with an error message
            return back()->withErrors(['error' => 'Registration failed. Please try again.']);
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget('user');
        Auth::logout();
        return redirect('/login');
    }
}
