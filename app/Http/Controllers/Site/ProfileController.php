<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Activity;
use App\Models\Site\Profile;
use App\Models\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        Auth::user()->profile
            ? $route = route('site.profile.update', Auth::user()->profile->id)
            : $route = route('site.profile.store');

        $activities = Activity::all()->pluck('name', 'id');

        return view('site.profile.index', compact('route', 'activities'));
    }

    public function store(Request $request, Profile $profile)
    {
        $this->validation($request);

        $profile->image = $request->profile['image']->store('profiles');
        $profile->info = $request->profile['info'];
        $profile->user_id = Auth::id();
        $profile->save();

        Auth::user()->activities()->sync((array) $request->input('profile.activity'));
        $this->updateUser($profile->user, $request->profile['user']);

        Auth::user()->activities()->sync((array) $request->input('user.activity'));
        return back();
    }

    public function update(Request $request, Profile $profile)
    {
        $this->validation($request);

        $profile->profile_image = isset($request->profile['image'])
            ? $request->event['image']->store('profiles')
            : null;
        $profile->info = $request->profile['info'];
        $profile->update();

        Auth::user()->activities()->sync((array) $request->input('profile.activity'));
        $this->updateUser($profile->user, $request->profile['user']);

        return back();
    }

    public function updateUser($user, $request)
    {
        Auth::user()->password != $request['password']
            ? $user->password = $request['password']
            : $user->password = Hash::make($request['password']);
        $user->name = $request['name'];
        $user->email = $request['email'];

        $user->update();
    }

    private function validation(Request $request)
    {
        $request->validate([
            'profile.user.name' => 'required|min:4|max:25',
            'profile.user.email' => 'sometimes|email|unique:users,email,' . Auth::id(),
            'profile.user.password' => 'min:8',
            'profile.image' => $request->isMethod('post') ? 'required|image|mimes:jpeg,png,jpg' : 'nullable',
            'profile.info' => 'required|min:4|max:50',
        ]);
    }
}
