<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Event;
use App\Models\Admin\Place;

class ProfileController extends Controller
{
    public function index()
    {

        return view('site.profile.index');
    }

}
