<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    public function index()
    {
        if(Session::has('user')){
            return redirect()->route('home.user');
        }
        if(Session::has('admin')) {
            return redirect()->route('home.admin');
        }
        return view('index');
    }
}
