<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Organizer;
use App\Models\User;
use App\Models\Tiket;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalEvent = Event::count();

        $approvedEvent = Event::where('status', 'approved')->count();
        $pendingEvent = Event::where('status', 'pending')->count();
        $rejectedEvent = Event::where('status', 'rejected')->count();

        $totalOrganizer = Organizer::count();

        $totalPeserta = User::count();

        $totalKuota = Tiket::sum('kuota');

        return view('pages.dashboard_admin', [
            'totalEvent' => $totalEvent,
            'approvedEvent' => $approvedEvent,
            'pendingEvent' => $pendingEvent,
            'rejectedEvent' => $rejectedEvent,
            'totalOrganizer' => $totalOrganizer,
            'totalPeserta' => $totalPeserta,
            'totalKuota' => $totalKuota,
        ]);
    }
}