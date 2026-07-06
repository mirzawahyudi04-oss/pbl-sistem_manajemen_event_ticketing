<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Organizer;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function index()
    {
        $organizer = Organizer::where('id_user', Auth::id())->firstOrFail();

        $events = Event::where('id_organizer', $organizer->id_organizer)->get();

        $totalEvent = $events->count();

        $eventIds = $events->pluck('id_event');

        $totalTiketTerjual = Transaction::whereIn('event_id', $eventIds)
            ->where('status', 'paid')
            ->sum('qty');

        $totalPendapatan = Transaction::whereIn('event_id', $eventIds)
            ->where('status', 'paid')
            ->sum('total_price');

        // Tiket terjual & pendapatan per event
        $events = $events->map(function ($event) {
            $event->tiket_terjual = Transaction::where('event_id', $event->id_event)
                ->where('status', 'paid')
                ->sum('qty');

            $event->pendapatan = Transaction::where('event_id', $event->id_event)
                ->where('status', 'paid')
                ->sum('total_price');

            return $event;
        });

        return view('pages.laporan', compact(
            'events',
            'totalEvent',
            'totalTiketTerjual',
            'totalPendapatan'
        ));
    }
        public function exportPdf()
{
    $organizer = Organizer::where('id_user', Auth::id())->firstOrFail();

    $events = Event::where('id_organizer', $organizer->id_organizer)->get();

    $eventIds = $events->pluck('id_event');

    $totalTiketTerjual = Transaction::whereIn('event_id', $eventIds)
        ->where('status', 'paid')
        ->sum('qty');

    $totalPendapatan = Transaction::whereIn('event_id', $eventIds)
        ->where('status', 'paid')
        ->sum('total_price');

    $events = $events->map(function ($event) {

        $event->tiket_terjual = Transaction::where('event_id', $event->id_event)
            ->where('status', 'paid')
            ->sum('qty');

        $event->pendapatan = Transaction::where('event_id', $event->id_event)
            ->where('status', 'paid')
            ->sum('total_price');

        return $event;
    });

    $pdf = Pdf::loadView('pages.laporan_pdf', compact(
    'organizer',
    'events',
    'totalTiketTerjual',
    'totalPendapatan'
));

    return $pdf->download('Laporan_Penjualan.pdf');
}
    }
