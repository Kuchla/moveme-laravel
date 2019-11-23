<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Activity;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(6);
        $activities = Activity::all();

        return view('site.user.index', compact('users', 'activities'));
    }

    public function userFilter(Request $request)
    {
        $users = User::when($request->activity, function ($query) use ($request) {
            $query->whereHas('activities', function ($q) use ($request) {
                $q->where('activity_id', $request->activity);
            });
        })->get();

        return view('site.user.partials._user-list', compact('users'));
    }
}
