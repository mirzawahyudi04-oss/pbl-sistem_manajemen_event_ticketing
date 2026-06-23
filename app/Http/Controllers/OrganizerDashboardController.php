<?php

namespace App\Http\Controllers;

use App\Models\Organizer;
use App\Models\Transaction;

class OrganizerDashboardController extends Controller
{
    public function index()
    {
        $organizer = Organizer::where('id_user', auth()->id())->firstOrFail();

        $events = $organizer->events;

        $eventIds = $events->pluck('id_event');

        $totalTiketTerjual = Transaction::whereIn('event_id', $eventIds)
            ->sum('qty');

        $totalPendapatan = Transaction::whereIn('event_id', $eventIds)
            ->sum('total_price');

        return view('pages.dashboard_organizer', compact(
            'organizer',
            'events',
            'totalTiketTerjual',
            'totalPendapatan'
        ));
    }
}