<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $user = User::where(['email' => $request->email])->first();

        // dd($user);

        if(!$user || !Hash::check($request->password, $user->password)) {
            return redirect()->route('auth.login.index')->with('danger', 'Your email or password is not matched. Please try again!');
        } else {
            if($user && $user->role === "admin") {
                $request->session()->put('admin', $user);
                return redirect()->route('home.admin');
            }
            $request->session()->put('user', $user);
            return redirect()->route('home.user');
        }
    }
}
