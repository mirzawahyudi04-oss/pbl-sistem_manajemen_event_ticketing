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
        $organizer = Organizer::findOrFail($id);

        $organizer->nama_organizer = $request->nama_organizer;
        $organizer->kontak = $request->kontak;

        $organizer->save();

        return redirect()->route('admin.organizer');
    }

    // DELETE
    public function destroy($id)
    {
        Organizer::findOrFail($id)->delete();

        return redirect()->route('admin.organizer');
    }
}