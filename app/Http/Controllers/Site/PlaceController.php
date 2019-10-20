<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Event;
use App\Models\Admin\Place;

class PlaceController extends Controller
{
    public function index()
    {
        $events = Event::all();
        $places = Place::all();
        return view('site.home.index', compact('events', 'places'));
    }

    // public function eventFilter(Request $request)
    // {
    //     $events = Event::where('is_free', $request->is_free)
    //                 ->where('is_limited', $request->is_limited)
    //                 ->get();

    //     return view('site.home.partials._event-list', compact('events'));
    // }

    // public function eventFilterReset(Request $request)
    // {
    //     $events = Event::all();
    //     return view('site.home.partials._event-list', compact('events'));
    // }
}
