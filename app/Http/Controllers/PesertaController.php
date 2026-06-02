<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class PesertaController extends Controller
{
    public function show()
    {
        $peserta = Transaksi::all();
        return view('pages.peserta', ['peserta' => $peserta]);
    }

    public function simpan(Request $request)
    {
        $transaksi = new Transaksi();
        $transaksi->id_user            = $request->input('id_user');
        $transaksi->metode_pembayaran  = $request->input('metode_pembayaran');
        $transaksi->total_harga        = $request->input('total_harga');
        $transaksi->tanggal_transaksi  = $request->input('tanggal_transaksi');
        $transaksi->status             = $request->input('status');
        $transaksi->save();

        return redirect()->back()->with('success', 'Data peserta berhasil disimpan!');
    }
}