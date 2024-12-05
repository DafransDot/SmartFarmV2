<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
     // Menampilkan halaman login
     public function tampilHalamanLogin()
     {
         return view('auth.login');
     }
 
     // Menangani login
     public function login(Request $request)
     {
         $credentials = $request->validate([
             'email' => ['required', 'email'],
             'password' => ['required'],
         ]);
 
         if (Auth::attempt($credentials)) {
             $request->session()->regenerate();
             return redirect()->intended('dashboard');
         }
 
         throw ValidationException::withMessages([
             'email' => 'Email atau password salah.',
         ]);
     }
 
     // Menampilkan halaman register
     public function tampilHalamanRegister()
     {
         return view('auth.register');
     }
 
     // Menangani register
     public function register(Request $request)
     {
         $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|string|email|max:255|unique:users',
             'password' => 'required|string|min:8|confirmed',
         ]);
 
         User::create([
             'name' => $request->name,
             'email' => $request->email,
             'password' => Hash::make($request->password),
         ]);
 
         return redirect()->route('login');
     }
 
     // Menangani logout
     public function logout(Request $request)
     {
         Auth::logout();
         $request->session()->invalidate();
         $request->session()->regenerateToken();
         return redirect('/login');
     }
}
