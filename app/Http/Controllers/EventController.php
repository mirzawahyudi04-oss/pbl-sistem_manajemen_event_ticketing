<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Tiket;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // Tampil semua event (halaman utama)
    public function index()
    {
        $events = Event::with(['organizer', 'tikets'])->get();
        return view('pages.events', compact('events'));
    }
    

    // Tampil detail 1 event
    public function show($id)
    {
        $event = Event::with(['organizer', 'tikets'])
                      ->findOrFail($id);
        return view('pages.detail_event', compact('event'));
    }

    // Form tambah event
    public function create()
    {
        return view('events.create');
    }

    // Simpan event baru
    public function store(Request $request)
{
    $request->validate([
        'nama_event'  => 'required|string',
        'deskripsi'   => 'required|string',
        'tanggal'     => 'required|date',
        'lokasi'      => 'required|string',
        'gambar'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'tiket'       => 'required|array|min:1',
        'tiket.*.nama_tiket' => 'required|string',
        'tiket.*.harga'      => 'required|numeric|min:0',
        'tiket.*.kuota'      => 'required|integer|min:1',
    ]);

    // Upload gambar
    $gambar = null;
    if ($request->hasFile('gambar')) {
        $gambar = $request->file('gambar')->getClientOriginalName();
        $request->file('gambar')->move(public_path('images'), $gambar);
    }

    // Ambil organizer milik user yang login
    $organizer = \App\Models\Organizer::where('id_user', auth()->id())->first();

    // Simpan event
    $event = Event::create([
        'id_organizer' => $organizer->id_organizer,
        'nama_event'   => $request->nama_event,
        'deskripsi'    => $request->deskripsi,
        'tanggal'      => $request->tanggal,
        'lokasi'       => $request->lokasi,
        'gambar'       => $gambar,
    ]);

    // Simpan tiket
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

    // Form edit event
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('events.edit', compact('event'));
    }

    public function kelolaEvent()
{
    $organizer = \App\Models\Organizer::where('id_user', auth()->id())->first();
    $events = $organizer ? Event::where('id_organizer', $organizer->id_organizer)->with('tikets')->get() : collect();
    return view('pages.kelola_event', compact('events'));
}

    // Update event
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_event' => 'required|string',
            'deskripsi'  => 'required|string',
            'tanggal'    => 'required|date',
            'lokasi'     => 'required|string',
        ]);

        $event = Event::findOrFail($id);
        $event->update($request->all());

        return redirect()->route('events.index')
                         ->with('success', 'Event berhasil diupdate!');
    }

    // Hapus event
    public function destroy($id)
    {
        Event::findOrFail($id)->delete();
        return redirect()->route('events.index')
                         ->with('success', 'Event berhasil dihapus!');
    }
}