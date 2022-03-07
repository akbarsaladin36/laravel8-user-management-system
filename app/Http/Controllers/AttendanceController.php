<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function store(Request $request)
    {
        if($request->session()->has('user')){
            $attendance = new Attendance;
            $attendance->user_id = $request->session()->get('user')->id;
            $attendance->attendance_notes = $request->attendance_notes;
            $attendance->attendance_start_dttm = date('Y-m-d H:i:s');
            $attendance->attendance_status = 'working';
            $attendance->save();
            return redirect()->route('home.user');
        } else {
            return redirect()->route('auth.login.index');
        }
    }

    public function edit($id)
    {
        if(Session::has('user')){
            $attendance = Attendance::where('id',$id)->first();
            return view('users.notes.edit', ['attendance'=>$attendance]);
        }
        return redirect()->route('auth.login.index');
    }

    public function update(Request $request, $id)
    {
        if($request->session()->has('user')){
            $attendance = Attendance::where('id',$id)->first();
            $attendance->attendance_notes = $request->attendance_notes;
            $attendance->attendance_stop_dttm = date('Y-m-d H:i:s');
            $attendance->attendance_status = 'completed';
            $attendance->save();
            return redirect()->route('home.user');
        } else {
            return redirect()->route('auth.login.index');
        }
    }
    
}
