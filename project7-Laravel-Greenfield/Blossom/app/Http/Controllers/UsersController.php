<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;


use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{

    public function index()
    {
        $user = User::all();
        return view('pages.users', compact('user'));
    }

    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required|min:3',
            'email' => 'required',
            'password' => 'required|min:6|max:16',
        ]);
        if (!empty(request()->image)) {
            $imageName = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $imageName);
        } else {
            $imageName = 'default.png';
        }
        $var = new User();
        $var->name = $request->input('name');
        $var->email = $request->input('email');
        $var->role = $request->get('type');
        $var->password = Hash::make($request->input('password'));
        $var->image = $imageName;
        $var->save();
        return back()->with('success', 'Product created successfully.');
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('pages.editUser', compact('user'));
    }
    public function update(Request $request, $id)
    {
        request()->validate([
            'name' => 'required|min:3',
            'email' => 'required',
            'password' => 'required|min:6|max:500',
        ]);
        if (!empty(request()->image)) {
            $imageName = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $imageName);
        } else {
            $imageName = 'default.png';
        }
        $var = User::find($id);
        $var->name = $request->get('name');
        $var->email = $request->get('email');
        $var->role = $request->get('type');
        $var->password = Hash::make($request->get('password'));
        $var->image = $imageName;
        $var->save();
        return redirect('user')->with('success', 'Contact updated!');
    }
    public function destroy($id)
    {
        $var = User::find($id);
        $var->delete();
        return back()->with('success', 'User deleted!');
    }
}
