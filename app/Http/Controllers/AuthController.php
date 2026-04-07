<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    public function showLogin()
    {
        return view('login');
    }

    
    public function login(Request $request)
{
    $data = $request->only('email', 'password');

    if (Auth::attempt($data)) {
        $request->session()->regenerate();

        if (auth()->user()->role == 'admin') {
            return redirect('/admin');
        }

        return redirect('/dashboard');
    }

    return back()->with('error', 'Email atau password salah');
}
    
    public function showRegister()
    {
        return view('register');
    }

    
    public function register(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'siswa'
        ]);

        return redirect('/login')->with('success', 'Register berhasil!');
    }

   
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}