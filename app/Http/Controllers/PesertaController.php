<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PesertaController extends Controller
{
    public function index(Request $request)
{
    $search = $request->search;

    $pesertas = User::where('role', 'buyer')

        ->when($search, function ($query) use ($search) {

            $query->where(function ($q) use ($search) {

                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");

            });

        })

        ->withSum('transactions', 'qty')

        ->get();

    return view('pages.peserta_admin', compact('pesertas'));
}




    public function blokir($id)
{
    $user = User::findOrFail($id);

    $user->status = 'nonaktif';

    $user->save();

    return redirect()->back()
        ->with('success','Peserta berhasil diblokir.');
}


public function aktifkan($id)
{
    $user = User::findOrFail($id);

    $user->status = 'aktif';

    $user->save();

    return redirect()->back()
        ->with('success','Peserta berhasil diaktifkan.');
}

    public function simpan(Request $request)
    {
        $transaksi = new Transaksi();

        $transaksi->id_user = $request->input('id_user');
        $transaksi->metode_pembayaran = $request->input('metode_pembayaran');
        $transaksi->total_harga = $request->input('total_harga');
        $transaksi->tanggal_transaksi = $request->input('tanggal_transaksi');
        $transaksi->status = $request->input('status');

        $transaksi->save();

        return redirect()->back()
            ->with('success', 'Data peserta berhasil disimpan!');
    }

    public function dashboardUser()
    {
        $user = Auth::user();

        $transaksi = Transaction::with('event')
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        $jumlahTiket = $transaksi->count();
        $jumlahRiwayat = $transaksi->count();
        $jumlahPending = $transaksi->where('status', 'pending')->count();

        $tiketTerbaru = $transaksi->take(5);
        $pendingTransaksi = $transaksi->where('status', 'pending')->take(5);

        return view('pages.dashboard_user', compact(
            'jumlahTiket',
            'jumlahRiwayat',
            'jumlahPending',
            'tiketTerbaru',
            'pendingTransaksi'
        ));
    }

    public function tiketSaya()
{
    $tikets = Transaction::with('event')
        ->where('user_id', auth()->id())
        ->where('status', 'paid')
        ->latest()
        ->get();

    return view('pages.tiket_user', compact('tikets'));
}

public function riwayat()
{
    $riwayat = Transaction::with('event')
        ->where('user_id', Auth::id())
        ->latest()
        ->get();

    return view('pages.riwayat_user', compact('riwayat'));
}
}