<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    /*
    |--------------------------------------------------------------------------
    | LOGIN USER
    |--------------------------------------------------------------------------
    */
    public function showLoginUser()
{
    return view('pages.login');
}
    public function login(Request $request)
{
    $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required']
    ]);

    if (Auth::attempt([
        'email' => $request->email,
        'password' => $request->password
    ])) {

        $request->session()->regenerate();

        $user = Auth::user();

        if ($user->role == 'organizer') {
            return redirect()->route('dashboard_organizer');
        }

        return redirect()->route('dashboard_user');
    }

    return back()->with('error', 'Email atau password salah');
}


//LOGIN ORGANIZER
    public function register(Request $request)
{
    $request->validate([
        'name'     => ['required'],
        'email'    => ['required', 'email', 'unique:users,email'],
        'password' => ['required', 'min:3'],
        'role'     => ['required']
    ]);

    $user = User::create([
        'name'     => $request->name,
        'email'    => $request->email,
        'password' => Hash::make($request->password),
        'role'     => $request->role
    ]);

    // Otomatis buat data organizer kalau role organizer
    if ($request->role === 'organizer') {
        \App\Models\Organizer::create([
            'id_user'        => $user->id,
            'nama_organizer' => $request->name,
            'kontak'         => $request->phone,
        ]);
    }

    return redirect()->route('login')
        ->with('success', 'Registrasi berhasil, silakan login');
}
    /*
    |--------------------------------------------------------------------------
    | LOGIN ADMIN
    |--------------------------------------------------------------------------
    */
    public function showLoginAdmin()
    {
        return view('pages.login_admin');
    }

    public function loginAdmin(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        // SIMULASI LOGIN ADMIN
        if (
            $request->email === 'admin@gmail.com' &&
            $request->password === '123456'
        ) {
            session([
                'admin' => $request->email,
                'nama' => 'Admin',
                'role' => 'admin'
            ]);

            return redirect()->route('dashboard_admin');
        }

        return back()
            ->withInput()
            ->with('error', 'Email atau password salah (admin)');
    }


    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */
   public function logout()
{
    Auth::logout();
    session()->flush();
    return redirect()->route('login');
}
}

