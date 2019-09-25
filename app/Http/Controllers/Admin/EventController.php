<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Event;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function index(Event $event)
    {
        $activities = Event::all();
        return view('admin.event.index', compact('events'));
    }
    public function create()
    {
        return view('admin.event.create');
    }
    public function store(Request $request, Event $event)
    {
        $this->validation($request);

        $event->user_id = Auth::id();
        $event->name = $request->activity['name'];
        $event->image = $request->activity['image']->store('events');
        $event->description = $request->activity['description'];
        $event->save();
        return redirect(route('admin.events.show', compact('events')));
    }
    public function edit(Event $event)
    {
        return view('admin.event.edit', compact('events'));
    }
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect(route('admin.events.index'));
    }
    public function update(Request $request, Event $event)
    {
        $this->validation($request);
        $event->user_id = Auth::id();
        $event->name = $request->activity['name'];
        $event->image_activity = isset($request->activity['image']) ? $request->activity['image']->store('events') : null;
        $event->description = $request->activity['description'];
        $event->update();
        return redirect(route('admin.events.show', compact('events')));
    }
    public function show(Event $event)
    {
        return view('admin.event.show', compact('events'));
    }
    private function validation(Request $request)
    {
        $request->validate([
            'events.name'       => 'required|min:4|max:50',
            'events.description'      => 'required',
            'events.image'      => $request->isMethod('post') ? 'required|image|mimes:jpeg,png,jpg' : 'nullable',
        ]);
    }
}
