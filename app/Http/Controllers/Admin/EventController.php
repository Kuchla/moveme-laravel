<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Event;
use App\Http\Controllers\Controller;
use App\Models\Admin\Place;

class EventController extends Controller
{
    public function index(Event $event)
    {
        $events = Event::all();
        return view('admin.event.index', compact('events'));
    }
    public function create()
    {
        $places = Place::all()->pluck('name', 'id');
        return view('admin.event.create', compact('places'));
    }
    public function store(Request $request, Event $event)
    {
        $this->validation($request);

        $event->user_id = Auth::id();
        $event->name = $request->event['name'];
        $event->image = $request->event['image']->store('events');
        $event->description = $request->event['description'];
        $event->save();
        return redirect(route('admin.events.show', compact('events')));
    }
    public function edit(Event $event)
    {
        $places = Place::all()->pluck('name', 'id');
        return view('admin.event.edit', compact('event', 'places'));
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
        $event->name = $request->event['name'];
        $event->image_event = isset($request->event['image']) ? $request->event['image']->store('events') : null;
        $event->description = $request->event['description'];
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
