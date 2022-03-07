<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        if(Session::has('user')) {
            $user = Session::get('user');
            $no = 1;
            $attendances = Attendance::where('user_id', $user->id)->get();
            return view('users.home', ['user'=>$user,'attendances'=>$attendances,'no'=>$no]);
        }
        return redirect()->route('auth.login.index');
    }

    public function logout()
    {
        Session::forget('user');
        return redirect()->route('auth.login.index');
    }
}
