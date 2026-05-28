<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Tiket;
use App\Models\Organizer;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // READ - Tampil semua event
    public function index()
    {
        $events = Event::with(['organizer', 'tikets'])->get();
        return view('pages.events', compact('events'));
    }

    // READ - Detail 1 event
    public function show($id)
    {
        $event = Event::with(['organizer', 'tikets'])->findOrFail($id);
        return view('pages.detail_event', compact('event'));
    }

    // READ - Kelola event milik organizer
    public function kelolaEvent()
    {
        $organizer = Organizer::where('id_user', auth()->id())->first();
        $events = $organizer
            ? Event::where('id_organizer', $organizer->id_organizer)->with('tikets')->get()
            : collect();
        return view('pages.kelola_event', compact('events'));
    }

    // CREATE - Form tambah event
    public function create()
    {
        return view('events.create');
    }

    // CREATE - Simpan event baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama_event'         => 'required|string',
            'deskripsi'          => 'required|string',
            'tanggal'            => 'required|date',
            'lokasi'             => 'required|string',
            'gambar'             => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'tiket'              => 'required|array|min:1',
            'tiket.*.nama_tiket' => 'required|string',
            'tiket.*.harga'      => 'required|numeric|min:0',
            'tiket.*.kuota'      => 'required|integer|min:1',
        ]);

        // Upload gambar jika ada
        $gambar = null;
        if ($request->hasFile('gambar')) {
            $file   = $request->file('gambar');
            $gambar = $file->getClientOriginalName();
            $file->move(public_path('images'), $gambar);
        }

        // Ambil organizer milik user yang login
        $organizer = Organizer::where('id_user', auth()->id())->first();

        // Simpan event
        $event = Event::create([
            'id_organizer' => $organizer->id_organizer,
            'nama_event'   => $request->nama_event,
            'deskripsi'    => $request->deskripsi,
            'tanggal'      => $request->tanggal,
            'lokasi'       => $request->lokasi,
            'gambar'       => $gambar,
        ]);

        // Simpan tiket-tiket yang terkait
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

    // UPDATE - Form edit event
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('events.edit', compact('event'));
    }

    // UPDATE - Simpan perubahan event
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_event' => 'required|string',
            'deskripsi'  => 'required|string',
            'tanggal'    => 'required|date',
            'lokasi'     => 'required|string',
        ]);

        $event = Event::findOrFail($id);
        $event->update($request->only([
            'nama_event', 'deskripsi', 'tanggal', 'lokasi'
        ]));

        return redirect()->route('manajemen')->with('success', 'Event berhasil diupdate!');
    }

    // DELETE - Hapus event
    public function destroy($id)
    {
        Event::findOrFail($id)->delete();
        return redirect()->route('manajemen')->with('success', 'Event berhasil dihapus!');
    }
}