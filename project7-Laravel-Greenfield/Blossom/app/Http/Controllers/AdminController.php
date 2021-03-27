<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        return view('pages.admin', compact('admins'));
    }

    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required|min:4',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $var = new Admin;
        $var->name = $request->input('name');
        $var->email = $request->input('email');
        $var->password = $request->input('password');

        $var->save();
        return back()->with('success', 'Admin created successfully.');
    }

    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('pages.editAdmin', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'admin_name' => 'required|min:4',
            'admin_email' => 'required|email',
            'admin_password' => 'required|min:6',
            'admin_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if (!empty(request()->admin_image)) {
            $imageName = time() . '.' . request()->admin_image->getClientOriginalExtension();
            request()->admin_image->move(public_path('images'), $imageName);
        } else {
            $admin = Admin::find($id);
            $imageName = $admin->admin_image;
        }

        $admin = Admin::find($id);
        $admin->admin_name =  $request->get('admin_name');
        $admin->admin_email = $request->get('admin_email');
        $admin->admin_password = $request->get('admin_password');
        $admin->admin_image = $imageName;
        $admin->save();

        return redirect('admin')->with('success', 'Contact updated!');
    }

    public function destroy($id)
    {
        $admin = Admin::find($id);
        $admin->delete();

        return back()->with('success', 'Admin deleted!');
    }
}
