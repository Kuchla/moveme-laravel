<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;

class AdminController extends Controller
{
    public function index(Admin $admin)
    {
        $admins = Admin::all();
        return view('admin.admin.index', compact('admins'));
    }

    public function create()
    {
        return view('admin.admin.create');
    }

    public function store(Request $request, Admin $admin)
    {
        $this->validation($request);

        $admin->name = $request->admin['name'];
        $admin->email = $request->admin['email'];
        $admin->password = $request->admin['password'];
        $admin->save();

        return redirect(route('admin.admins.show', compact('admin')));
    }

    public function edit(Admin $admin)
    {
        return view('admin.admin.edit', compact('admin'));
    }

    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect(route('admin.admins.index'));
    }

    public function update(Request $request, Admin $admin)
    {
        $this->validation($request);

        $admin->name = $request->admin['name'];
        $admin->email = $request->admin['email'];
        $admin->password = $request->admin['password'];

        $admin->update();

        return redirect(route('admin.admins.show', compact('admin')));
    }

    public function show(Admin $admin)
    {
        return view('admin.admin.show', compact('admin'));
    }

    public function validation(Request $request)
    {
        $request->validate([
           'admin.name'       => 'required|min:4|max:50',
           'admin.email'      => 'required',
       ]);
    }
}
