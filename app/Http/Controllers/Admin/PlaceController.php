<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlaceController extends Controller
{
    public function index()
    {
        return view('admin.place.index');
    }

    public function create()
    {
        return view('admin.place.create');
    }

    public function edit()
    {
        return view('admin.place.edit');
    }

    public function show()
    {
        return view('admin.place.show');
    }
}
