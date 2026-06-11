<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Tiket;
use App\Models\Organizer;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function dashboardOrganizer()
    {
        $organizer = Organizer::where('id_user', auth()->id())->first();
        $events = $organizer
            ? Event::where('id_organizer', $organizer->id_organizer)->get()
            : collect();
        return view('pages.dashboard_organizer', compact('events'));
    }

    public function index()
{
    $events = Event::with('organizer','tikets')
        ->where('status','approved')
        ->latest()
        ->get();

    return view('pages.events', compact('events'));
}

    public function show($id)
    {
        $event = Event::with(['organizer', 'tikets'])->findOrFail($id);
        return view('pages.detail_event', compact('event'));
    }

    public function kelolaEvent()
    {
        $organizer = Organizer::where('id_user', auth()->id())->first();
        $events = $organizer
            ? Event::where('id_organizer', $organizer->id_organizer)->with('tikets')->get()
            : collect();
        return view('pages.kelola_event', compact('events'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_event'         => 'required|string',
            'deskripsi'          => 'required|string',
            'tanggal'            => 'required|date',
            'lokasi'             => 'required|string',
            'gambar'             => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'tiket.*.nama_tiket' => 'required|string',
            'tiket.*.harga'      => 'required|numeric|min:0',
            'tiket.*.kuota'      => 'required|integer|min:1',
        ]);

        $gambar = null;
        if ($request->hasFile('gambar')) {
            $file   = $request->file('gambar');
            $gambar = $file->getClientOriginalName();
            $file->move(public_path('images'), $gambar);
        }

        $organizer = Organizer::where('id_user', auth()->id())->first();

        $event = Event::create([
            'id_organizer' => $organizer->id_organizer,
            'nama_event'   => $request->nama_event,
            'deskripsi'    => $request->deskripsi,
            'tanggal'      => $request->tanggal,
            'lokasi'       => $request->lokasi,
            'gambar'       => $gambar,
            'status'       => 'pending',
        ]);

        foreach ($request->tiket as $t) {
            Tiket::create([
                'id_event'   => $event->id_event,
                'nama_tiket' => $t['nama_tiket'],
                'harga'      => $t['harga'],
                'kuota'      => $t['kuota'],
            ]);
        }

        return redirect()->route('manajemen')->with('success', 'Event berhasil ditambahkan!');
    }

    // edit

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_event'         => 'required|string',
            'deskripsi'          => 'required|string',
            'tanggal'            => 'required|date',
            'lokasi'             => 'required|string',
            'gambar'             => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'tiket.*.nama_tiket' => 'required|string',
            'tiket.*.harga'      => 'required|numeric|min:0',
            'tiket.*.kuota'      => 'required|integer|min:1',
        ]);

        $event = Event::findOrFail($id);

        $gambar = $event->gambar;
        if ($request->hasFile('gambar')) {
            $file   = $request->file('gambar');
            $gambar = $file->getClientOriginalName();
            $file->move(public_path('images'), $gambar);
        }

        $event->update([
            'nama_event' => $request->nama_event,
            'deskripsi'  => $request->deskripsi,
            'tanggal'    => $request->tanggal,
            'lokasi'     => $request->lokasi,
            'gambar'     => $gambar,
            'status'     => $request->status,
        ]);

        Tiket::where('id_event', $id)->delete();
        foreach ($request->tiket as $t) {
            Tiket::create([
                'id_event'   => $id,
                'nama_tiket' => $t['nama_tiket'],
                'harga'      => $t['harga'],
                'kuota'      => $t['kuota'],
            ]);
        }

        return redirect()->route('manajemen')->with('success', 'Event berhasil diupdate!');
    }

    public function destroy($id)
    {
        Tiket::where('id_event', $id)->delete();
        Event::findOrFail($id)->delete();
        return redirect()->route('manajemen')->with('success', 'Event berhasil dihapus!');
    }
}