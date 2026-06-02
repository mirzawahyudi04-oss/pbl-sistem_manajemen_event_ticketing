<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminAuthController extends Controller
{
    // tampil halaman login
    public function showLogin()
    {
        return view('admin.login');
    }

    // proses login
    public function login(Request $request)
    {
        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {

            Session::put('admin_id', $admin->id_admin);
            Session::put('admin_nama', $admin->nama);

            return redirect('/admin/dashboard');
        }

        return back()->with('error', 'Email atau Password salah');
    }

    // logout
    public function logout()
    {
        Session::flush();
        return redirect('/admin/login');
    }
}