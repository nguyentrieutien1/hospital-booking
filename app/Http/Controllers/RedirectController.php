<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return view("login");
        } else {
            if (Auth::user()->roleId != 1) {
                return view("client.home");
            }
            return view("admin.home");
        }
    }
}
