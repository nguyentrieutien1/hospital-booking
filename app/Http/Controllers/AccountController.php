<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AccountController extends Controller
{
    public $update  = false;
    public function index()
    {
        $roles = DB::table("roles")->get();
        $accounts = DB::table('users')->get();
        return view("admin.account.account", ["update" => $this->update, "roles" => $roles, "accounts" => $accounts]);
    }
    public function getViewUpdateAccount($id)
    {
        $this->update = true;
        $account = DB::table("users")->where("id", $id)->get();
        $roles = DB::table("roles")->get();
        $accounts = DB::table('users')->get();
        return view("admin.account.account", ["update" => $this->update, "roles" => $roles, "accounts" => $accounts, "account" => $account[0]]);
    }
    public function handleUpdateAccount(Request $request, $id)
    {
        if ($request->password) {
            $request->validate([
                'username' => ['required', 'max:255'],
                'address' => ['required', 'max:255'],
                'email' => ['required', 'email:rfc,dns'],
                'password' => ['required'],
                'repassword' => ['required', 'same:password'],

            ]);
            DB::table('users')->where("id", $id)->update(["username" => $request->username, "address" => $request->address, "email" => $request->email, "password" => Hash::make($request->password), "roleId" => $request->role]);
        } else {
            $request->validate([
                'username' => ['required', 'max:255'],
                'address' => ['required', 'max:255'],
                'email' => ['required', 'email:rfc,dns'],
            ]);
            DB::table('users')->where("id", $id)->update(["username" => $request->username, "address" => $request->address, "email" => $request->email, "roleId" => $request->role]);
        }
        Alert::success("Messenge", "Update Account Successfully !");
        return redirect('/accounts');
    }
    public function handleDeleteAccount($id)
    {
        DB::table("users")->where("id", $id)->delete();
        Alert("Message", "Delete Account Successfully !");
        return redirect('/accounts');
    }
}
