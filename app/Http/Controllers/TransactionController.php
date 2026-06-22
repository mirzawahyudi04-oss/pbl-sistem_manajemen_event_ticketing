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

        $totalKuota = $event->tikets->sum('kuota');

        if ($totalKuota <= 0) {
            return redirect()->back()
                ->with('error', 'Tiket sudah habis terjual');
        }

        return view('pages.beli_tiket', compact('event'));
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

        $proofPath = $request->file('payment_proof')
            ->store('payment_proofs', 'public');

        $total = $tiket->harga * $request->qty;

        $ticketCode = 'STV-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -6));

        $ticketCode = 'STV-' . date('Ymd') . '-' . strtoupper(substr(md5(uniqid()), 0, 6));

Transaction::create([
    'ticket_code' => $ticketCode,
    'user_id' => auth()->id(),
    'event_id' => $event->id_event,
    'ticket_type' => $request->ticket_type,
    'qty' => $request->qty,
    'total_price' => $total,
    'payment_method' => $request->payment_method,
    'payment_proof' => $proofPath,
    'status' => 'pending',
    'is_used' => false,
]);

        return redirect()->back()->with(
            'success',
            'Pembayaran berhasil dikirim dan menunggu verifikasi organizer.'
        );
    }

    public function eTicket($id)
{
    $ticket = Transaction::with('event', 'user')
        ->findOrFail($id);

    return view('tickets.e-ticket', compact('ticket'));
}
}