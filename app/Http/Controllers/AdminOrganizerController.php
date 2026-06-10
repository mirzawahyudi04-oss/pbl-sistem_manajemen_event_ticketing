<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organizer;

class AdminOrganizerController extends Controller
{
    // READ
    public function index()
    {
        $organizers = Organizer::all();

        return view('pages.organizer_admin', compact('organizers'));
    }

    // FORM EDIT
    public function edit($id)
    {
        $organizer = Organizer::findOrFail($id);

        return view('pages.edit_organizer', compact('organizer'));
    }

    // UPDATE
    public function update(Request $request, $id)
{
    $request->validate([
        'nama_organizer' => 'required',
        'kontak' => 'required',
        'status' => 'required'
    ]);

    $organizer = Organizer::findOrFail($id);

    $organizer->nama_organizer = $request->nama_organizer;
    $organizer->kontak = $request->kontak;
    $organizer->status = $request->status;

    $organizer->save();

    return redirect() ->route('admin.organizer')
        ->with('success', 'Data organizer berhasil diperbarui');
}

    // DELETE
    public function destroy($id)
    {
        Organizer::findOrFail($id)->delete();

        return redirect()->route('admin.organizer');
    }
}