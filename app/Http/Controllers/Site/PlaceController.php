<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Activity;
use App\Models\Admin\City;
use App\Models\Admin\Place;

class PlaceController extends Controller
{
    public function index()
    {
        $activities = Activity::all();
        $places = Place::all();
        $cities = City::all();

        return view('site.place.index', compact('places', 'activities', 'cities'));
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
}
