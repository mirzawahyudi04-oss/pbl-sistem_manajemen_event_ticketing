<?php

namespace App\Http\Controllers;

use App\Models\Organizer;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tiket;

class OrganizerTransactionController extends Controller
{
    public function index(Request $request)
    {
        $organizer = Organizer::where('id_user', Auth::id())->first();

        // Untuk dropdown filter
        $events = $organizer->events;

        $query = Transaction::join('users', 'transactions.user_id', '=', 'users.id')
            ->join('events', 'transactions.event_id', '=', 'events.id_event')
            ->where('events.id_organizer', $organizer->id_organizer)
            ->select(
                'transactions.id',
                'transactions.payment_proof',
                'transactions.status',
                'users.name',
                'events.nama_event',
                'events.id_event',
                'transactions.ticket_type',
                'transactions.qty',
                'transactions.total_price',
                'transactions.created_at'
            );

        // Filter by event kalau dipilih
        if ($request->filled('event_id')) {
            $query->where('events.id_event', $request->event_id);
        }

        $transaksi = $query->latest()->get();

        return view('pages.transaksi_organizer', compact('transaksi', 'events'));
    }

    public function approve($id)
    {
        $trx = Transaction::findOrFail($id);
        $trx->status = 'paid';
        $trx->save();

        return back()->with('success', 'Pembayaran diterima');
    }

   public function reject($id)
{
    $transaction = Transaction::findOrFail($id);

    // Hanya kembalikan kuota jika transaksi masih pending
    if ($transaction->status == 'pending') {

        $tiket = Tiket::where('id_event', $transaction->event_id)
            ->where('nama_tiket', $transaction->ticket_type)
            ->first();

        if ($tiket) {
            $tiket->increment('kuota', $transaction->qty);
        }

        $transaction->status = 'rejected';
        $transaction->save();
    }

    return back()->with('success', 'Transaksi berhasil ditolak.');
}
}