<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Admin\Activity;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::orderBy('name', 'asc')->paginate(6);
        return view('site.activity.index', compact('activities'));
    }
}
