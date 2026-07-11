<?php

namespace App\Http\Controllers;

use App\Models\Event;

class HomeController extends Controller
{
    public function index()
    {
        $events = Event::with([
        'organizer',
        'tikets'
    ])
    ->where('status', 'approved')
    ->whereDate('tanggal', '>=', now())
    ->get();

        return view('pages.home', compact('events'));
    }
}