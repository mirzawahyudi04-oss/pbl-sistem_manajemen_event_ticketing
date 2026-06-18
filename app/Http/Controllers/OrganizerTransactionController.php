<?php

namespace App\Http\Controllers;

use App\Models\Organizer;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class OrganizerTransactionController extends Controller
{
    public function index()
    {
        $organizer = Organizer::where(
            'id_user',
            Auth::id()
        )->first();

        $transaksi = Transaction::join(
                'users',
                'transactions.user_id',
                '=',
                'users.id'
            )
            ->join(
                'events',
                'transactions.event_id',
                '=',
                'events.id_event'
            )
            ->where(
                'events.id_organizer',
                $organizer->id_organizer
            )
            ->select(
                'users.name',
                'events.nama_event',
                'transactions.ticket_type',
                'transactions.qty',
                'transactions.total_price',
                'transactions.created_at'
            )
            ->latest()
            ->get();

        return view(
            'pages.transaksi_organizer',
            compact('transaksi')
        );
    }
}
