<?php

namespace App\Http\Controllers;

use App\Models\Organizer;
use App\Models\Transaction;
use App\Models\Event;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrganizerDashboardController extends Controller
{
    public function index()
{
    $organizer = Organizer::where('id_user', auth()->id())->firstOrFail();

    $events = $organizer->events;

    $eventIds = $events->pluck('id_event');

    $totalTiketTerjual = Transaction::whereIn('event_id', $eventIds)
    ->where('status', 'paid')
    ->sum('qty');

    $totalPendapatan = Transaction::whereIn('event_id', $eventIds)
    ->where('status', 'paid')
    ->sum('total_price');

    // Top 5 Event Terlaris
    $topEvents = $events
    ->map(function ($event) {

        $event->tiket_terjual = Transaction::where('event_id', $event->id_event)
            ->where('status', 'paid')
            ->sum('qty');

        return $event;
    })
    ->sortByDesc('tiket_terjual')
    ->take(5);

   
   // Grafik Penjualan
$months = [];
$sales = [];

for ($i = 5; $i >= 0; $i--) {

    $date = now()->subMonths($i);

    $months[] = $date->translatedFormat('M');

    $sales[] = Transaction::whereIn('event_id', $eventIds)
    ->where('status', 'paid')
    ->whereYear('created_at', $date->year)
    ->whereMonth('created_at', $date->month)
    ->sum('qty');
}

    return view('pages.dashboard_organizer', compact(
        'organizer',
        'events',
        'totalTiketTerjual',
        'totalPendapatan',
        'topEvents',
        'months',
        'sales'
    ));
}
}