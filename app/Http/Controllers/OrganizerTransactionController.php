<?php

namespace App\Http\Controllers;

use App\Models\Organizer;
use App\Models\Transaction;
use App\Models\Tiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganizerTransactionController extends Controller
{
    public function index(Request $request)
    {
        $organizer = Organizer::where('id_user', Auth::id())->firstOrFail();

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

        // Search transaksi
        if ($request->filled('search')) {

            $search = trim($request->search);

            // Jika user mengetik TRX00001
            if (preg_match('/^TRX(\d+)$/i', $search, $match)) {

                $query->where('transactions.id', $match[1]);

            } else {

                $query->where(function ($q) use ($search) {

                    $q->where('users.name', 'like', "%{$search}%")
                      ->orWhere('events.nama_event', 'like', "%{$search}%")
                      ->orWhere('transactions.id', 'like', "%{$search}%");

                });

            }
        }

        $transaksi = $query->oldest()->get();

        return view('pages.transaksi_organizer', compact('transaksi'));
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