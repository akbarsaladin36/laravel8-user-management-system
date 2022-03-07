<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminAllNotesController extends Controller
{
    public function index()
    {
        if(Session::has('admin')){
            $no = 1;
            $notes = DB::table('attendances')->join('users', 'attendances.user_id', '=', 'users.id')->get();
            return view('admin.all-notes.index', ['all_notes'=>$notes,'no'=>$no]);
        } else {
            return redirect()->route('auth.login.index');
        }
    }

    public function show($id)
    {
        if(Session::has('admin')){
            $note = Attendance::join('users', 'attendances.user_id', '=', 'users.id')->where('attendances.id', $id)->first();
            return view('admin.all-notes.show',['note'=>$note]);
        }
        return redirect()->route('auth.login.index');
    }

    public function delete($id)
    {
        if(Session::has('admin')){
            $note = Attendance::where('id',$id)->first();
            $note->delete();
            return redirect()->route('all-notes.admin');
        } else {
            return redirect()->route('auth.login.index');
        }
    }


}
