<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index()
    {
        return view("login");
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email:rfc,dns'],
            'password' => ['required'],
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/');
        }
        Alert::error("Password or email is wrong !!!");
        return redirect()->back();
    }
}
