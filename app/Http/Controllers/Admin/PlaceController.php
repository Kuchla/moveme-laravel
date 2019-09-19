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
        $places  = Place::all();
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
        $place->description = $request->place['description'];
        $place->image = $request->place['image']->store('logos');
        $place->save();
        return redirect(route('admin.places.show', compact('news')));
    }
    public function edit(Place $place)
    {
        $categories = Category::toSelectArray();
        return view('admin.places.edit', compact('news', 'categories'));
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
        $place->city = $request->place['city'];
        $place->description = $request->place['description'];
        $place->news_image = isset($request->place['image']) ? $request->place['image']->store('news') : null;
        $place->update();

        return redirect(route('admin.places.show', compact('news')));
    }
    public function show(Place $place)
    {
        return view('admin.places.show', compact('news'));
    }
    private function validation(Request $request)
    {
        $request->validate([
            'places.name'        => 'required|min:4|max:50',
            'places.city'    => 'required|not_in:Selecione',
            'places.image'        => $request->isMethod('post') ? 'required|image|mimes:jpeg,png,jpg' : 'nullable',
            'places.location' => 'required|min:50',
            'places.description' => 'required|min:50',
        ]);
    }
}
