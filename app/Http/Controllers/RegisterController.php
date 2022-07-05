<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{
    public function index()
    {
        return view("register");
    }
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'username' => ['required', 'max:255'],
            'address' => ['required', 'max:255'],
            'email' => ['required', 'email:rfc,dns'],
            'password' => ['required'],
            'repassword' => ['required', 'same:password'],
        ]);
        list('username' => $username, "address" => $address, 'email' => $email, 'password' => $password) = $validatedData;
        $account = DB::table('users')->where('email', $email)->first();
        if ($account) {
            Alert::error("Message", "The account already exists in the system, please re-register");
            return redirect()->back();
        }
        if ($request->role) {
            DB::table("users")->insert(["email" => $email, "address" => $address, "username" => $username, "password" => Hash::make($password), "roleId" => $request->role]);
            Alert::success("Message", "Register Successfully !, Please Login Now :D");
            return redirect("/accounts");
        }
        DB::table("users")->insert(["email" => $email, "address" => $address, "username" => $username, "password" => Hash::make($password)]);
        Alert::success("Message", "Register Successfully !, Please Login Now :D");
        return redirect('/login');
    }
}
