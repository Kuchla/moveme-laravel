<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\DeleteImage;
use App\Helpers\ImageResize;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Activity;
use Alert;

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
        $this->validation($request);

        $activity->name = $request->activity['name'];
        $activity->description = $request->activity['description'];
        $activity->image = $request->activity['image']->store('activities');
        ImageResize::reduce($activity->image);
        $activity->save();

        Alert::success(trans('adminlte::pages.messages.saved'));
        return redirect(route('admin.activities.show', compact('activity')));
    }

    public function edit(Activity $activity)
    {
        return view('admin.activity.edit', compact('activity'));
    }

    public function destroy(Activity $activity)
    {
        DeleteImage::unlink($activity->image);
        $activity->delete();

        return redirect(route('admin.activities.index'));
    }

    public function update(Request $request, Activity $activity)
    {
        $this->validation($request);

        if(isset($request->activity['image'])){
            DeleteImage::unlink($activity->image);

            $activity->image_activity = $request->activity['image']->store('activities');
            ImageResize::reduce($activity->image);
        }
        $activity->name = $request->activity['name'];
        $activity->description = $request->activity['description'];
        $activity->update();

        Alert::success(trans('adminlte::pages.messages.updated'));
        return redirect(route('admin.activities.show', compact('activity')));
    }

    public function show(Activity $activity)
    {
        return view('admin.activity.show', compact('activity'));
    }

    private function validation(Request $request)
    {
        $request->validate([
            'activity.name' => 'required|min:4|max:50',
            'activity.description' => 'required',
            'activity.image' => $request->isMethod('post') ? 'required|image|mimes:jpeg,png,jpg' : 'nullable',
        ]);
    }
}
