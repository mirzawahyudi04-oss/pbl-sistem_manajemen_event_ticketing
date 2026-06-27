<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SimplePasswordResetController extends Controller
{
    /**
     * Tampilkan halaman lupa password (step 1)
     */
    public function showForm()
    {
        return view('auth.forgot-password');
    }

    /**
     * Verifikasi email + nomor HP
     * Jika cocok → simpan user_id di session → redirect ke form reset
     */
    public function checkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'no_handphone' => 'required|string',
        ]);

        // Cari user berdasarkan email + phone
        // Sesuaikan nama kolom 'phone' dengan kolom di tabel users kalian
        $user = User::where('email', $request->email)
                    ->where('no_handphone', $request->no_handphone)
                    ->first();


        if (!$user) {
            return back()
                ->withInput()
                ->with('error', 'Email atau Nomor Handphone tidak sesuai dengan data kami.');
        }

        // Simpan id user di session (bukan password atau data sensitif)
        session(['reset_user_id' => $user->id]);

        return redirect()->route('password.reset-form');
    }

    /**
     * Tampilkan halaman buat password baru (step 2)
     * Guard: kalau belum lewat step 1, lempar balik
     */
    public function showResetForm()
    {
        if (!session()->has('reset_user_id')) {
            return redirect()->route('password.request')
                ->with('error', 'Silakan verifikasi identitas terlebih dahulu.');
        }

        return view('auth.reset-password');
    }

    /**
     * Simpan password baru
     */
    public function updatePassword(Request $request)
    {
        // Guard: pastikan session masih ada
        if (!session()->has('reset_user_id')) {
            return redirect()->route('password.request')
                ->with('error', 'Sesi habis. Silakan mulai lagi.');
        }

        $request->validate([
            'password' => 'required|min:6|confirmed',
        ], [
            'password.min'       => 'Password minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        $user = User::find(session('reset_user_id'));

        if (!$user) {
            return redirect()->route('password.request')
                ->with('error', 'Akun tidak ditemukan. Silakan coba lagi.');
        }

        // Update password dengan bcrypt
        $user->password = Hash::make($request->password);
        $user->save();

        // Hapus session reset agar tidak bisa dipakai ulang
        session()->forget('reset_user_id');

        return redirect()->route('login')
            ->with('success', '✅ Password berhasil diubah! Silakan login dengan password baru.');
    }
}