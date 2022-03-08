<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class AdminAllAttendancesController extends Controller
{
    public function index()
    {
        if(Session::has('admin')) {
            $no = 1;
            $attendances = Attendance::join('users','attendances.user_id','=','users.id')->where('attendances.attendance_status', 'completed')->get();
            // dd($attendances);
            return view('admin.all-attendances.index',['attendances'=>$attendances,'no'=>$no]);
        } else {
            return redirect()->route('auth.login.index');
        }

    }

    public function delete($id)
    {
        if(Session::has('admin')) {
            $attendances = Attendance::where('id', $id)->first();
            $attendances->delete();
            return redirect()->route('all-attendances.admin');
        } else {
            return redirect()->route('auth.login.index');
        }
    }
}
