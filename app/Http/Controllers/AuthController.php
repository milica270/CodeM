<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register() {
        return view('auth.register');
    }

    public function store(RegisterUserRequest $request) {
        $validated = $request->validated();
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);
        return redirect()->route('dashboard');
    }

    public function login() {
        return view('auth.login');
    }

    public function authenticate(LoginUserRequest $request) {
        $validated = $request->validated();
        if(auth()->attempt($validated)) {
            request()->session()->regenerate();
            return redirect()->route('dashboard');
        }
        return redirect()->route('login')->withErrors([
            'email' => 'No matching user found with provided email and password',
        ]);
    }

    public function logout() {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('dashboard');
    }
}
