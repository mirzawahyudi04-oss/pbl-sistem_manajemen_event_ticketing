<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Transaction;
use App\Models\Tiket;

class TransactionController extends Controller
{
    public function create($id)
    {
        $event = Event::findOrFail($id);

        // total semua kuota tiket
        $totalKuota = $event->tikets->sum('kuota');

        // kalau tiket habis
        if ($totalKuota <= 0) {

            return redirect()
                ->back()
                ->with(
                    'error',
                    'Tiket sudah habis terjual'
                );
        }

        return view(
            'pages.beli_tiket',
            compact('event')
        );
    }

    public function store(Request $request, $id)
{
    $event = Event::findOrFail($id);

    $request->validate([
        'ticket_type' => 'required',
        'qty' => 'required|integer|min:1',
        'payment_method' => 'required',
        'payment_proof' => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // cari tiket berdasarkan nama tiket
    $tiket = Tiket::where('id_event', $event->id_event)
                ->where('nama_tiket', $request->ticket_type)
                ->first();

    if (!$tiket) {
        return back()->with('error', 'Tiket tidak ditemukan');
    }

    if ($tiket->kuota <= 0) {
        return back()->with('error', 'Tiket sudah habis terjual');
    }

    if ($tiket->kuota < $request->qty) {
        return back()->with('error', 'Kuota tiket tidak cukup');
    }

    // upload bukti pembayaran
    $proofPath = $request->file('payment_proof')
                        ->store('payment_proofs', 'public');

    // hitung total harga
    $total = $tiket->harga * $request->qty;

    // simpan transaksi
    Transaction::create([
        'user_id' => auth()->id(),
        'event_id' => $event->id_event,
        'ticket_type' => $request->ticket_type,
        'qty' => $request->qty,
        'total_price' => $total,
        'payment_method' => $request->payment_method,
        'payment_proof' => $proofPath,
        'status' => 'pending',
    ]);

    return redirect()
        ->back()
        ->with('success', 'Pembayaran berhasil dikirim dan menunggu verifikasi admin!');
}}