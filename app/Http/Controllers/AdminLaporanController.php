<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class AdminLaporanController extends Controller
{
    public function index(Request $request)
    {
        $query = Event::with([
            'organizer',
            'kategori',
            'tikets'
        ]);

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('tanggal')) {
            $query->whereDate('tanggal', $request->tanggal);
        }

        $events = $query->orderBy('tanggal')->get();

        return view('pages.laporan_admin', compact('events'));
    }
}