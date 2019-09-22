<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\City;
use App\Models\Admin\Place;
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
        return view('admin.place.create', compact('cities'));
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
        return view('admin.places.edit', compact('place', 'cities'));
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
        $place->image = $request->place['image']->store('places');
        $place->update();

        return redirect(route('admin.places.show', compact('place')));
    }
    public function show(Place $place)
    {
        return view('admin.places.show', compact('news'));
    }
    private function validation(Request $request)
    {
        $request->validate([
            'place.name'        => 'required|min:4|max:50',
            'place.city'    => 'required|not_in:Selecione',
            'place.image'        => 'required|image|mimes:jpeg,png,jpg',
            'place.location' => 'required|min:50',
            'place.description' => 'required|min:50',
        ]);
    }
}
