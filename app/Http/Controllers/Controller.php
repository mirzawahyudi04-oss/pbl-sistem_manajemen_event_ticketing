<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //
    public function index()
{
    $peserta = Peserta::all();

    return view('pages.peserta', compact('peserta'));
}
}

