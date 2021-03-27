<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Session;
use Crypt;

class customerController extends Controller


{


    function store(Request $req)
    {

        $validateData = $req->validate([
            'name' => 'required|min:3|alpha_dash',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6|max:12',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        if (!empty(request()->image)) {
            $imageName = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $imageName);
        } else {
            $imageName = 'default.png';
        }

        $result = DB::table('users')
            ->where('email', $req->input('email'))
            ->get();
        $res = json_decode($result, true);



        if (sizeof($res) == 0) {
            $data = $req->input();
            $user = new User;
            $user->name = $data['name'];
            $user->email = $data['email'];
            $encrypted_password = crypt::encrypt($data['password']);
            $user->password = $encrypted_password;
            $user->image = $imageName;
            $user->save();
            $users = User::all();
            session::put('user', $users[count($users) - 1]);
            $req->session()->flash('register_status', 'User has been registered successfully');
            return redirect('index');
        } else {
            $req->session()->flash('register_status', 'This Email already exists.');
            return redirect('/userReg');
        }
    }
    public function login(Request $req)
    {
        $validatedData = $req->validate([
            'email' => 'required',
            'password' => 'required'
        ]);



        $result = DB::table('users')
            ->where('email', $req->input('email'))
            ->get();
        $res = json_decode($result, true);


        // die($res[0]['password']);
        if (sizeof($res) == 0) {
            $req->session()->flash('error', 'Email does not exist. Please register yourself first');
            echo "Email Id Does not Exist.";
            return redirect('userLog');
        } else {

            $encrypted_password = $result[0]->password;
            $decrypted_password = crypt::decrypt($encrypted_password);
            if ($decrypted_password == $req->input('password')) {
                echo "You are logged in Successfully";
                $req->session()->put('user', $result[0]->name);
                return redirect('index');
            } else {
                $req->session()->flash('error', 'Email does not exist. Please register yourself first');
                echo "Email Id Does not Exist.";
                return redirect('userLog');
            }
        }
    }

    function logout()
    {
        session()->flush('user');
        return redirect('index');
    }
}
