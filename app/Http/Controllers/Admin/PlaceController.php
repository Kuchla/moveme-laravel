<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\DeleteImage;
use App\Helpers\ImageResize;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\City;
use App\Models\Admin\Place;
use App\Models\Admin\Activity;
use Alert;
use App\Models\Admin\Event;

class PlaceController extends Controller
{
    public function index(Place $place)
    {
        $places = Place::orderBy('created_at', 'desc')->get();
        return view('admin.place.index', compact('places'));
    }

    public function create()
    {
        $cities = City::all()->pluck('name', 'id');
        $activities = Activity::all()->pluck('name', 'id');

        return view('admin.place.create', compact('cities', 'activities'));
    }

    public function store(Request $request, Place $place)
    {
        $this->validation($request);

        $place->name = $request->place['name'];
        $place->city_id = $request->place['city'];
        $place->location = $request->place['location'];
        $place->visitation = $request->place['visitation'];
        $place->description = $request->place['description'];
        $place->image = $request->place['image']->store('places');

        ImageResize::reduce($place->image);
        $place->save();
        $place->activities()->sync((array) $request->input('place.activity'));

        Alert::success(trans('adminlte::pages.messages.saved'));
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
        if (Event::where('place_id', $place->id)->count()) {
            Alert::info(trans('adminlte::pages.messages.not_allowed'));
            return back();
        } else {
            DeleteImage::unlink($place->image);
            $place->delete();
            Alert::success(trans('adminlte::pages.messages.deleted'));
        }

        return redirect(route('admin.places.index'));
    }

    public function update(Request $request, Place $place)
    {
        $this->validation($request);

        if (isset($request->place['image'])) {
            DeleteImage::unlink($place->image);

            $place->place_image = $request->place['image']->store('places');
            ImageResize::reduce($place->image);
        }

        $place->name = $request->place['name'];
        $place->city_id = $request->place['city'];
        $place->location = $request->place['location'];
        $place->visitation = $request->place['visitation'];
        $place->description = $request->place['description'];

        ImageResize::reduce($place->image);
        $place->update();
        $place->activities()->sync((array) $request->input('place.activity'));

        Alert::success(trans('adminlte::pages.messages.updated'));
        return redirect(route('admin.places.show', compact('place')));
    }

    public function show(Place $place)
    {
        return view('admin.place.show', compact('place'));
    }

    private function validation(Request $request)
    {
        $request->validate([
            'place.name' => 'required|min:4',
            'place.city' => 'required|not_in:Selecione',
            'place.image' => $request->isMethod('post') ? 'required|image|mimes:jpeg,png,jpg' : 'nullable',
            'place.location' => 'required|min:10',
            'place.description' => 'required|min:10',
            'place.activity' => 'required'
        ]);
    }
}
