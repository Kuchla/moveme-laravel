<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Images;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Activity;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    public function index(Activity $activity)
    {
        $activities = Activity::all();
        return view('admin.activity.index', compact('activities'));
    }
    public function create()
    {
        return view('admin.activity.create');
    }
    public function store(Request $request, Activity $activity)
    {
        // dd($request->hasFile('image'));
        $this->validation($request);

        $activity->user_id = Auth::id();
        $activity->name = $request->activity['name'];
        $activity->image = $request->activity['image']->store('activities');
        $activity->description = $request->activity['description'];
        $activity->save();
        return redirect(route('admin.activities.show', compact('activity')));
    }
    public function edit(Activity $activity)
    {
        return view('admin.activity.edit', compact('activity'));
    }
    public function destroy(Activity $activity)
    {
        $activity->delete();
        return redirect(route('admin.activities.index'));
    }
    public function update(Request $request, Activity $activity)
    {
        $this->validation($request);
        $activity->user_id = Auth::id();
        $activity->name = $request->activity['name'];
        $activity->image_activity = isset($request->activity['image']) ? $request->activity['image']->store('activities') : null;
        $activity->description = $request->activity['description'];
        $activity->update();
        return redirect(route('admin.activities.show', compact('activity')));
    }
    public function show(Activity $activity)
    {
        return view('admin.activity.show', compact('activity'));
    }
    private function validation(Request $request)
    {
        $request->validate([
            'activity.name'       => 'required|min:4|max:50',
            'activity.description'      => 'required',
            'activity.image'      => $request->isMethod('post') ? 'required|image|mimes:jpeg,png,jpg' : 'nullable',
        ]);
    }
}