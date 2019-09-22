<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\City;
use App\Models\Admin\Place;
use App\Models\Admin\Activity;
use Illuminate\Support\Facades\Auth;

class PlaceController extends Controller
{
    public function index(Place $place)
    {
        $places = Place::all();
        return view('admin.place.index', compact('places'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all()->pluck('name', 'id');
        $activities = Activity::all()->pluck('name', 'id');
        return view('admin.place.create', compact('cities', 'activities'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Place $place)
    {
        $this->validation($request);
        $place->user_id = Auth::id();
        $place->name = $request->place['name'];
        $place->city = $request->place['city'];
        $place->location = $request->place['location'];
        $place->description = $request->place['description'];
        $place->image = $request->place['image']->store('places');
        $place->save();
        return redirect(route('admin.places.show', compact('place')));
    }
    public function edit(Place $place)
    {
        $cities = City::all()->pluck('name', 'id');
        $activities = Activity::all()->pluck('name', 'id');
        return view('admin.place.edit', compact('place', 'cities', 'activities'));
    }
    public function destroy(Place $place)
    {
        $place->delete();
        return redirect(route('admin.places.index'));
    }
    public function update(Request $request, Place $place)
    {
        $this->validation($request);
        $place->user_id = Auth::id();
        $place->name = $request->place['name'];
        $place->city = $request->place['city'];
        $place->location = $request->place['location'];
        $place->description = $request->place['description'];
        $place->place_image = $request->place['image']->store('places');
        $place->update();

        return redirect(route('admin.places.show', compact('place')));
    }
    public function show(Place $place)
    {
        return view('admin.place.show', compact('place'));
    }
    private function validation(Request $request)
    {
        $request->validate([
            'place.name'        => 'required|min:4|max:50',
            'place.city'    => 'required|not_in:Selecione',
            'place.image'        => $request->isMethod('post') ? 'required|image|mimes:jpeg,png,jpg' : 'nullable',
            'place.location' => 'required|min:50',
            'place.description' => 'required|min:50',
        ]);
    }
}
