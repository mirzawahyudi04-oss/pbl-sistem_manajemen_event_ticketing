<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TicketController extends Controller
{
   public function buy(Event $event)
{
    $tikets = \App\Models\Tiket::where('id_event', $event->id_event)->get();

    return view('tickets.buy', compact('event', 'tikets'));
}

    public function payment(Request $request, Event $event)
    {
        $harga = match ($request->ticket_type) {
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
            'quantity' => 'required|integer|min:1',
        ]);

        $harga = match ($request->ticket_type) {
            'VIP' => 250000,
            default => 100000,
        };

        Transaction::create([
            'user_id' => auth()->id(),
            'event_id' => $event->id_event,
            'ticket_type' => $request->ticket_type,
            'qty' => $request->quantity,
            'total_price' => $harga * $request->quantity,
        ]);

        return redirect()
            ->route('events.index')
            ->with('success', 'Tiket berhasil dibeli.');
    }
}