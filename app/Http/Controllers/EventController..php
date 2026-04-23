<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    //
}

   public function index() 
    {
        $events = Event::all(); 
        return view('explore', compact('events'));
    }
}
}
