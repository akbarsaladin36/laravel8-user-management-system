<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function show()
    {
        if(Session::get('admin')){
            $adminId = Session::get('admin')->id;
            $admin = User::where('id', $adminId)->first();
            return view('admin.profile.show',['admin'=>$admin]);
        } else {
            return redirect()->route('auth.login.index');
        }
    }

    public function edit()
    {
        if(Session::get('admin')){
            $adminId = Session::get('admin')->id;
            $admin = User::where('id', $adminId)->first();
            return view('admin.profile.edit',['admin'=>$admin]);
        } else {
            return redirect()->route('auth.login.index');
        }
    }

    public function update(Request $request)
    {
        if(Session::get('admin')){
            $adminId = Session::get('admin')->id;
            $admin = User::where('id', $adminId)->first();
            $admin->first_name = $request->first_name;
            $admin->last_name = $request->last_name;
            $admin->address = $request->address;
            $admin->phone_number = $request->phone_number;
            $admin->save();

            return redirect()->route('profile.admin');
        } else {
            return redirect()->route('auth.login.index');
        }
    }
}
