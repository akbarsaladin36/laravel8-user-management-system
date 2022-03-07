<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        if(Session::has('admin')){
            $admin = Session::get('admin');
            $users = User::select('id')->get();
            $all_notes = Attendance::select('attendance_notes')->get();
            $all_attends = Attendance::select('attendance_start_dttm')->get();
            return view('admin.home', ['admin'=>$admin,'users'=>$users,'all_notes'=>$all_notes,'all_attends'=>$all_attends]);
        }
        return redirect()->route('auth.login.index');
    }

    public function logout()
    {
        Session::forget('admin');
        return redirect()->route('auth.login.index');
    }
}
