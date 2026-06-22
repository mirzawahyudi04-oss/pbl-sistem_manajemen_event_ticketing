<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class AdminEventController extends Controller
{
    public function index()
{
    $events = Event::with('organizer', 'tikets')->get();

    $totalEvent = Event::count();
    $approvedEvent = Event::where('status', 'approved')->count();
    $pendingEvent = Event::where('status', 'pending')->count();
    $rejectedEvent = Event::where('status', 'rejected')->count();

    return view('pages.manajemen_admin', compact(
        'events',
        'totalEvent',
        'approvedEvent',
        'pendingEvent',
        'rejectedEvent'
    ));
}

    public function approve($id)
    {
        $event = Event::findOrFail($id);

        $event->status = 'approved';
        $event->save();

        return back();
    }

    public function reject($id)
{
    $event = Event::findOrFail($id);
    $event->status = 'rejected';
    $event->save();

    return back();
}
}