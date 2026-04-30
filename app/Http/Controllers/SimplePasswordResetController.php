<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SimplePasswordResetController extends Controller
{
    // Tampilkan form input email
    public function showForm()
    {
        return view('auth.forgot-password');
    }

    // Cek email (sementara dummy dulu)
    public function checkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        // sementara kita langsung lanjut ke reset password
        return redirect()->route('password.reset-form')
                         ->with('email', $request->email);
    }

    // Tampilkan form reset password
    public function showResetForm()
    {
        return view('auth.reset-password');
    }

    // Proses update password (dummy sederhana)
    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed'
        ]);

        // ini belum simpan ke database (masih simple)
        return redirect('/login')->with('success', 'Password berhasil diubah');
    }
}