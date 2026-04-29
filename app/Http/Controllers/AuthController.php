<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validasi
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // USER SEMENTARA
        if ($request->email == "user@gmail.com" && $request->password == "123") {

            // Simpan session
            session(['user' => $request->email]);

            // 👉 arahkan ke dashboard user
            return redirect('/dashboard-user');
        }

        return back()->with('error', 'Email atau password salah');
    }

    public function register(Request $request)
    {
        return back()->with('success', 'Register berhasil (dummy)');
    }
}