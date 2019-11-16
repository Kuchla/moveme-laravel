<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Activity;
use App\Models\Admin\Event;
use App\Models\Admin\Place;
use App\User;

class HomeController extends Controller
{
    public function index()
    {
        $events = Event::count();
        $places = Place::count();
        $activities = Activity::count();
        $users = User::count();
        $siteUsers = User::take(8)->get();

        return view('admin.home.index', compact('events', 'places', 'activities', 'users', 'siteUsers'));
    }
}
