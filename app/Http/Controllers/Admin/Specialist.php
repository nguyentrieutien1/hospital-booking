<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class Specialist extends Controller
{
    public $isUpdate = false;
    public function index()
    {
        $specialists = $this->getSpecialist();
        return view("admin.specialist.specialist", ["specialists" => $specialists, "isUpdate" => $this->isUpdate]);
    }
    public function specialistCreate(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
        ]);
        DB::table("specialists")->insert(["name" => $request->name]);
        Alert::success("Messnger", "Create Specialist Successfully !");
        return redirect()->back();
    }
    public function getSpecialist()
    {
        return  DB::table("specialists")->get();
    }
    public function getViewSpecialistUpdate($id)
    {
        $this->isUpdate = true;
        $specialists = $this->getSpecialist();
        $specialist = DB::table('specialists')->where("id", $id)->get();
        return view("admin.specialist.specialist", ["specialists" => $specialists, "isUpdate" => $this->isUpdate, "specialist" => $specialist[0]]);
    }
    public function specialistUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
        ]);

        DB::table("specialists")->where("id", $id)->update(["name" => $request->name]);
        Alert::success("Messenge", "Update Specialist Succssfully !");
        return redirect()->route('specialist');
    }
    public function specialistDelete($id)
    {
        DB::table("specialists")->where("id", $id)->delete();
        Alert("Message", "Delete Specialist Successfully !");
        return redirect()->route('specialist');
    }
}
