<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SimplePasswordResetController extends Controller
{
    // Halaman lupa password
    public function showForm()
    {
        return view('auth.forgot-password');
    }

    // Cek email + no hp
    public function checkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'no_hp' => 'required'
        ]);

        $user = User::where('email', $request->email)
                    ->where('no_hp', $request->no_hp)
                    ->first();

        if (!$user) {
            return back()->with('error', 'Email atau Nomor HP tidak sesuai.');
        }

        session(['reset_user' => $user->id]);

        return redirect()->route('password.reset-form');
    }

    // Halaman ubah password
    public function showResetForm()
    {
        if (!session()->has('reset_user')) {
            return redirect()->route('password.request');
        }

        return view('auth.reset-password');
    }

    // Simpan password baru
    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed'
        ]);

        $user = User::find(session('reset_user'));

        if (!$user) {
            return redirect()->route('password.request');
        }

        $user->password = Hash::make($request->password);
        $user->save();

        session()->forget('reset_user');

        return redirect()->route('login')
            ->with('success', 'Password berhasil diubah.');
    }
}