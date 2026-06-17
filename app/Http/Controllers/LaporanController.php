<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{public function index()
{
    $events = Event::where(
        'id_organizer',
        Auth::user()->id_organizer
    )->get();

    $totalEvent = $events->count();

    return view('pages.laporan', compact(
        'events',
        'totalEvent'
    ));
}
}


