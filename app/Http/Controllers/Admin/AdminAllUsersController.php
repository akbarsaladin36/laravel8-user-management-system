<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminAllUsersController extends Controller
{
    public function index()
    {
        if(Session::has('admin')){
            $no = 1;
            $all_users = User::where('role','user')->get();
            return view('admin.all-users.index', ['all_users'=>$all_users,'no'=>$no]);
        } else {
            return redirect()->route('auth.login.index');
        }
    }

    public function create()
    {
        if(Session::has('admin')){
            return view('admin.all-users.create');
        } else {
            return redirect()->route('auth.login.index');
        }
    }

    public function store(Request $request)
    {
        if(Session::has('admin')){
            $newUser = new User;
            $newUser->username = $request->username;
            $newUser->email = $request->email;
            $newUser->password = Hash::make($request->password);
            $newUser->save();

            return redirect()->route('all-users.admin');
        } else {
            return redirect()->route('auth.login.index');
        }
    }

    public function delete($id)
    {
        if(Session::has('admin')){
            $user = User::where('id',$id)->first();
            $user->delete();
            return redirect()->route('all-users.admin');
        } else {
            return redirect()->route('auth.login.index');
        }
    }
}
