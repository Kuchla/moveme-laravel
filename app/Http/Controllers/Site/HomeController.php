<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Activity;
use App\Models\Admin\City;
use App\Models\Admin\Event;
use App\Models\Admin\Place;

class HomeController extends Controller
{
    public function index()
    {
        $events = Event::all();
        $places = Place::all();
        $activities = Activity::all();
        $cities = City::all();
        return view('site.home.index', compact('events', 'places', 'activities', 'cities'));
    }

    public function eventFilter(Request $request)
    {
        $events = Event::where('is_free', $request->is_free)
            ->where('is_limited', $request->is_limited)
            ->get();

        return view('site.home.partials._event-list', compact('events'));
    }

    public function eventFilterReset(Request $request)
    {
        $events = Event::all();
        return view('site.home.partials._event-list', compact('events'));
    }

    public function placeFilter(Request $request)
    {
        $places = Place::where('visitation', $request->is_free)
            ->when($request->activity, function ($query) use ($request) {
                $query->whereHas('activities', function ($q) use ($request) {
                    $q->where('activity_id', $request->activity);
                });
            })
            ->when($request->city, function ($query) use ($request) {
                $query->where('city_id', $request->city);
            })
            ->get();

        return view('site.home.partials._place-list', compact('places'));
    }

    public function placeFilterReset(Request $request)
    {
        $places = Place::all();
        return view('site.home.partials._place-list', compact('places'));
    }

    public function placeShow(Place $place)
    {
        return view('site.home.partials._show-place', compact('place'));
    }
}
