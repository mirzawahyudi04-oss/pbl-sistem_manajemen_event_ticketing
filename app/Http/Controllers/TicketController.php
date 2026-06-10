<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function buy(Event $event)
    {
        return view('tickets.buy', compact('event'));
    }

    // TAMBAHAN BARU
    public function payment(Request $request, Event $event)
{
    $harga = match($request->ticket_type) {
        'VIP' => 250000,
        default => 100000,
    };

    $total = $harga * $request->quantity;

    return view('tickets.payment', [
        'event' => $event,
        'ticket_type' => $request->ticket_type,
        'quantity' => $request->quantity,
        'total' => $total
    ]);
}
    public function store(Request $request, Event $event)
    {
        $request->validate([
            'ticket_type' => 'required',
            'quantity' => 'required',
            'payment_method' => 'required',
            'payment_proof' => 'required|image'
        ]);

        $proof = null;

        if ($request->hasFile('payment_proof')) {

            $proof = $request->file('payment_proof')
                ->store('payments', 'public');
        }

        Ticket::create([

            'user_id' => auth()->id(),

            'event_id' => $event->id,

            'ticket_type' => $request->ticket_type,

            'quantity' => $request->quantity,

            'payment_method' => $request->payment_method,

            'payment_proof' => $proof,

            'status' => 'pending'
        ]);

        return back()->with(
            'success',
            'Bukti pembayaran berhasil dikirim. Menunggu verifikasi admin.'
        );
    }
}