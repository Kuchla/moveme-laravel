<?php

namespace App\Http\Controllers\Site;

use App\Helpers\DeleteImage;
use App\Helpers\ImageResize;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Activity;
use App\Models\Site\Profile;
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

        if(isset($request->profile['image'])){
            $profile->image = $request->profile['image']->store('profiles');
            ImageResize::reduceUser($profile->image);
        }

        $profile->info = $request->profile['info'];
        $profile->user_id = Auth::id();
        $profile->save();

        Auth::user()->activities()->sync((array) $request->input('profile.activity'));
        $this->updateUser($profile->user, $request->profile['user']);

        return back();
    }

    public function update(Request $request, Profile $profile)
    {
        $this->validation($request);

        if(isset($request->profile['image'])){
            if($profile->image){
                DeleteImage::unlink($profile->image);
            }

            $profile->profile_image= $request->profile['image']->store('profiles');
            ImageResize::reduceUser($profile->image);
        }

        $profile->info = $request->profile['info'];
        $profile->update();

        Auth::user()->activities()->sync((array) $request->input('profile.activity'));
        $this->updateUser($profile->user, $request->profile['user']);

        return back();
    }

    public function updateUser($user, $request)
    {
        $user->user_password = isset($request['password']) ? Hash::make($request['password']) : null;
        $user->name = $request['name'];
        $user->email = $request['email'];

        $user->update();
    }

    private function validation(Request $request)
    {
        $request->validate([
            'profile.user.name' => 'required|min:4|max:25',
            'profile.image' => 'nullable',
            'profile.info' => 'required|min:4|max:250',
            'profile.user.email' => 'required|email|unique:users,email,'.Auth::user()->id,
            'profile.user.password' => 'nullable',
        ]);
    }
}
