<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Admin\Activity;
use App\Models\Admin\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $activities = Activity::all();
        $events = Event::whereDate('date', '>', now())
            ->orderBy('date', 'asc')
            ->paginate(4);

        return view('site.event.index', compact('events', 'activities'));
    }

    public function eventFilter(Request $request)
    {
        $events = Event::where('is_free', $request->is_free)
            ->where('is_limited', $request->is_limited)
            ->whereMonth('date', now()->month + $request->month)
            ->when($request->activity, function ($query) use ($request) {
                $query->whereHas('activities', function ($q) use ($request) {
                    $q->where('activity_id', $request->activity);
                });
            })
            ->get();

        return view('site.event.partials._event-list', compact('events'));
    }
}
