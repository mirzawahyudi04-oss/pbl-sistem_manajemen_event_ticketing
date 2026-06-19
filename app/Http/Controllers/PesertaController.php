<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class PesertaController extends Controller
{
    public function show()
    {
        $peserta = Transaksi::all();

        return view('pages.peserta', [
            'peserta' => $peserta
        ]);
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
        ->where('status', 'approved')
        ->latest()
        ->get();

    return view('pages.tiket_user', compact('tikets'));
}
}