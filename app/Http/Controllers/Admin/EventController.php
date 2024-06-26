<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\DeleteImage;
use App\Helpers\FormatDate;
use Illuminate\Http\Request;
use App\Models\Admin\Event;
use App\Http\Controllers\Controller;
use App\Models\Admin\Activity;
use App\Models\Admin\Place;
use Alert;

class EventController extends Controller
{
    public function index(Event $event)
    {
        $events = Event::orderBy('created_at', 'desc')->get();
        return view('admin.event.index', compact('events'));
    }

    public function create()
    {
        $places = Place::all()->pluck('name', 'id');
        $activities = Activity::all()->pluck('name', 'id');
        return view('admin.event.create', compact('places', 'activities'));
    }

    public function store(Request $request, Event $event)
    {
        $this->validation($request);

        $event->name = $request->event['name'];
        $event->image = $request->event['image']->store('events');
        $event->description = $request->event['description'];
        $event->date = FormatDate::dateDefault($request->event['date']);
        $event->place_id = $request->event['place'];
        $event->is_free = $request->event['is_free'];
        $event->is_limited = $request->event['is_limited'];
        $event->save();

        $event->activities()->sync((array) $request->input('event.activity'));

        Alert::success(trans('adminlte::pages.messages.saved'));
        return redirect(route('admin.events.show', compact('event')));
    }

    public function edit(Event $event)
    {
        $activities = Activity::all()->pluck('name', 'id');
        $places = Place::all()->pluck('name', 'id');

        return view('admin.event.edit', compact('event', 'places', 'activities'));
    }

    public function destroy(Event $event)
    {
        DeleteImage::unlink($event->image);
        $event->delete();

        Alert::success(trans('adminlte::pages.messages.deleted'));
        return redirect(route('admin.events.index'));
    }
    public function update(Request $request, Event $event)
    {
        $this->validation($request);

        if (isset($request->event['image'])) {
            DeleteImage::unlink($event->image);
            $event->event_image = $request->event['image']->store('events');
        }

        $event->name = $request->event['name'];
        $event->description = $request->event['description'];
        $event->date = FormatDate::dateDefault($request->event['date']);
        $event->place_id = $request->event['place'];
        $event->is_free = $request->event['is_free'];
        $event->is_limited = $request->event['is_limited'];
        $event->update();

        $event->activities()->sync((array) $request->input('event.activity'));

        Alert::success(trans('adminlte::pages.messages.updated'));
        return redirect(route('admin.events.show', compact('event')));
    }

    public function show(Event $event)
    {
        return view('admin.event.show', compact('event'));
    }

    private function validation(Request $request)
    {
        $request->validate([
            'event.name' => 'required|min:4|max:50',
            'event.description' => 'required|min:5',
            'event.image' => $request->isMethod('post') ? 'required|image|mimes:jpeg,png,jpg' : 'nullable',
            'event.date' => 'required',
            'event.place' => 'required|not_in:Escolha...',
            'event.is_free' => 'required',
            'event.is_limited' => 'required',
        ]);
    }
}
