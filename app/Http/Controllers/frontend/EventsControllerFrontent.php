<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventsControllerFrontent extends Controller
{
    public function previousEvents()
    {
        $events = Event::where('start', '<', now())->get();
        return view('Events.previous', compact('events'));
    }

    public function upcomingEvents()
    {
        $events = Event::where('start', '>', now())->get();
        return view('Events.upcoming', compact('events'));
    }
}
