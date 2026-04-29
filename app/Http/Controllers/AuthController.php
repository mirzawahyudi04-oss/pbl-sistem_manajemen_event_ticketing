<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LOGIN USER
    |--------------------------------------------------------------------------
    */
    public function showLoginUser()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        // SIMULASI LOGIN USER
        if (
            $request->email === 'user@gmail.com' &&
            $request->password === '123'
        ) {
            session([
                'user' => $request->email,
                'nama' => 'Mirza',
                'role' => 'user'
            ]);

            return redirect()->route('dashboard_user');
        }

        return back()
            ->withInput()
            ->with('error', 'Email atau password salah');
    }


    /*
    |--------------------------------------------------------------------------
    | LOGIN ADMIN
    |--------------------------------------------------------------------------
    */
    public function showLoginAdmin()
    {
        return view('login_admin');
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
        session()->flush();
        return redirect()->route('login');
    }
}