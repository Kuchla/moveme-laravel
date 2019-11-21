<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\AccessLevel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Alert;

class AdminController extends Controller
{
    public function index()
    {
        if(AccessLevel::isSimpleAdmin()){
            $admin = AccessLevel::isSimpleAdmin();
            return redirect(route('admin.admins.show', compact('admin')));
        }

        $admins = Admin::all();
        return view('admin.admin.index', compact('admins'));
    }

    public function create()
    {
        if(AccessLevel::isSimpleAdmin()){
            return Redirect::back();
        }

        return view('admin.admin.create');
    }

    public function store(Request $request, Admin $admin)
    {
        $this->validation($request);

        $admin->name = $request->admin['name'];
        $admin->email = $request->admin['email'];
        $admin->password = Hash::make($request->admin['password']);
        $admin->save();

        Alert::success(trans('adminlte::pages.messages.saved'));
        return redirect(route('admin.admins.show', compact('admin')));
    }

    public function edit(Admin $admin)
    {
        if(AccessLevel::isSimpleAdmin()){
            $admin = Admin::where('id', AccessLevel::isSimpleAdmin())->first();
        }
        return view('admin.admin.edit', compact('admin'));
    }

    public function destroy(Admin $admin)
    {
        if(AccessLevel::isSimpleAdmin()){
            return Redirect::back();
        }

        $admin->delete();
        return redirect(route('admin.admins.index'));
    }

    public function update(Request $request, Admin $admin)
    {
        $this->validation($request);

        $admin->name = $request->admin['name'];
        $admin->email = $request->admin['email'];
        $admin->admin_password = isset($request->admin['password']) ? Hash::make($request->admin['password']) : null;

        $admin->update();
        Alert::success(trans('adminlte::pages.messages.updated'));
        return redirect(route('admin.admins.show', compact('admin')));
    }

    public function show(Admin $admin)
    {
        if(AccessLevel::isSimpleAdmin()){
            $admin = Admin::where('id', AccessLevel::isSimpleAdmin())->first();
            return view('admin.admin.show', compact('admin'));
        }

        return view('admin.admin.show', compact('admin'));
    }

    public function validation(Request $request)
    {
        $request->validate([
           'admin.name' => 'required|min:4|max:50',
           'admin.email' => $request->isMethod('post') ? 'required|email|unique:admins,email' : 'required|email|unique:admins,email,'.Auth::guard('admin')->user()->id,
           'admin.password' => $request->isMethod('post') ? 'required|min:8' : 'nullable',
       ]);
    }
}
