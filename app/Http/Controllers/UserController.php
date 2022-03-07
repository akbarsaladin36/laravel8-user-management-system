<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show()
    {
        if(Session::has('user')){
            $userId = Session::get('user')->id;
            $user = User::where('id', $userId)->first();
            return view('users.profile.show', ['user'=>$user]);
        }
        return redirect()->route('auth.login.index');
    }

    public function edit()
    {
        if(Session::has('user')){
            $userId = Session::get('user')->id;
            $user = User::where('id', $userId)->first();
            return view('users.profile.edit', ['user'=>$user]);
        }
        return redirect()->route('auth.login.index');
    }

    public function update(Request $request)
    {
        if(Session::has('user')){
            $userId = Session::get('user')->id;
            $user = User::where('id', $userId)->first();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->address = $request->address;
            $user->phone_number = $request->phone_number;
            $user->save();

            return redirect()->route('profile.user');
        }
    }
}
