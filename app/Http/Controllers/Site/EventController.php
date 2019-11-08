<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('site.event.index', compact('events'));
    }

    public function eventFilter(Request $request)
    {
        $events = Event::where('is_free', $request->is_free)
            ->where('is_limited', $request->is_limited)
            ->get();
        return view('site.event.partials._event-list', compact('events'));
    }

    public function eventFilterReset(Request $request)
    {
        $events = Event::all();
        return view('site.event.partials._event-list', compact('events'));
    }
}
