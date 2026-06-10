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
            'qty' => 'required|integer|min:1'
        ]);

        // cari tiket berdasarkan nama tiket
        $tiket = Tiket::where(
                        'id_event',
                        $event->id_event
                    )
                    ->where(
                        'nama_tiket',
                        $request->ticket_type
                    )
                    ->first();

        // cek tiket ada atau tidak
        if (!$tiket) {

            return back()->with(
                'error',
                'Tiket tidak ditemukan'
            );
        }

        // cek kuota habis
        if ($tiket->kuota <= 0) {

            return back()->with(
                'error',
                'Tiket sudah habis terjual'
            );
        }

        // cek kuota cukup atau tidak
        if ($tiket->kuota < $request->qty) {

            return back()->with(
                'error',
                'Kuota tiket tidak cukup'
            );
        }

        // hitung total harga
        $total = $tiket->harga * $request->qty;

        // simpan transaksi
        Transaction::create([
            'user_id' => auth()->id(),
            'event_id' => $event->id_event,
            'ticket_type' => $request->ticket_type,
            'qty' => $request->qty,
            'total_price' => $total,
            'status' => 'pending',
        ]);

        // kurangi kuota tiket
        $tiket->kuota -= $request->qty;

        // simpan perubahan
        $tiket->save();

        return redirect()
            ->back()
            ->with(
                'success',
                'Pembayaran berhasil dibuat!'
            );
    }
}