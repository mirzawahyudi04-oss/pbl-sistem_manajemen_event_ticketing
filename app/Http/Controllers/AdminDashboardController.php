<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Organizer;
use App\Models\Peserta;
use App\Models\Tiket;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalEvent = Event::count();

        $totalOrganizer = Organizer::count();

        $totalPeserta = Peserta::count();

        $totalKuota = Tiket::sum('kuota');

        $eventTerbaru = Event::with('organizer')
            ->orderBy('id_event', 'desc')
            ->take(5)
            ->get();

        return view('pages.dashboard_admin', compact(
            'totalEvent',
            'totalOrganizer',
            'totalPeserta',
            'totalKuota',
            'eventTerbaru'
        ));
    }
}