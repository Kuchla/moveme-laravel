<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\City;
use Alert;
use App\Models\Admin\Place;

class CityController extends Controller
{
    public function index(City $city)
    {
        $cities = City::all();
        return view('admin.city.index', compact('cities'));
    }

    public function create()
    {
        return view('admin.city.create');
    }

    public function store(Request $request, City $city)
    {
        $this->validation($request);

        $city->name = $request->city['name'];
        $city->about = $request->city['about'];
        $city->save();

        Alert::success(trans('adminlte::pages.messages.saved'));
        return redirect(route('admin.cities.show', compact('city')));
    }

    public function edit(City $city)
    {
        return view('admin.city.edit', compact('city'));
    }

    public function destroy(City $city)
    {
        if (Place::where('city_id', $city->id)->count()) {
            Alert::info(trans('adminlte::pages.messages.not_allowed'));
            return back();
        } else {
            $city->delete();
            Alert::success(trans('adminlte::pages.messages.deleted'));
        }

        return redirect(route('admin.cities.index'));
    }

    public function update(Request $request, City $city)
    {
        $this->validation($request);

        $city->name = $request->city['name'];
        $city->about = $request->city['about'];
        $city->update();

        Alert::success(trans('adminlte::pages.messages.updated'));
        return redirect(route('admin.cities.show', compact('city')));
    }

    public function show(City $city)
    {
        return view('admin.city.show', compact('city'));
    }

    public function validation(Request $request)
    {
        $request->validate([
            'city.name'       => 'required|min:4|max:50',
            'city.about'      => 'required',
        ]);
    }
}
