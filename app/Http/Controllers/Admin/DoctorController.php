<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Admin\Specialist;

class DoctorController extends Controller
{
    public $isUpdate = false;
    public function index()
    {
        $doctors = DB::table('doctors')->get();
        $specialists = new Specialist;
        return view("admin.doctor.doctor", ['doctors' => $doctors, "specialists" => $specialists->getSpecialist(), 'update' => $this->isUpdate]);
    }
    public function doctorCreate(Request $request)
    {

        $request->validate([
            'name' => ['required', 'max:255'],
            'specialist' => ['required', 'max:255'],
            'room' => ['required'],
            'avatar' => ['required'],
        ]);
        $imageName = time() . '.' . '__image__' . request()->file('avatar')->getClientOriginalExtension();
        request()->avatar->move(public_path('doctor/images'), $imageName);
        DB::table("doctors")->insert(["name" => $request->name, "specialist" => $request->specialist, "room" => $request->room, "avatar" =>  url('doctor/images/' . $imageName)]);
        Alert::success("Messnger", "Create Doctor Successfully !");
        return redirect()->back();
    }
    public function getViewUpdateDoctor($id)
    {
        $doctor = DB::table("doctors")->where(["id" => $id])->get();
        $this->isUpdate = true;
        $doctors = DB::table('doctors')->get();
        $specialists = new Specialist;
        return view("admin.doctor.doctor", ['doctors' => $doctors, "specialists" => $specialists->getSpecialist(), 'update' => $this->isUpdate, "doctor" => $doctor[0]]);
    }
    public function doctorUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'specialist' => ['required', 'max:255'],
            'room' => ['required'],
        ]);
        $imageName = null;
        if (request()->file('avatar')) {
            $imageName = time() . '.' . '__image__' . request()->file('avatar')->getClientOriginalExtension();
            request()->avatar->move(public_path('doctor/images'), $imageName);
            DB::table("doctos")->where("id", $id)->update(["name" => $request->name, "specialist" => $request->specialist, "room" => $request->room, "avatar" => $request->avatar]);
        }
        DB::table("doctors")->where("id", $id)->update(["name" => $request->name, "specialist" => $request->specialist, "room" => $request->room]);
        Alert::success("Messenge", "Update Doctor Succssfully !");
        return redirect()->route('doctor');
    }

    public function doctorDelete($id)
    {
        DB::table("doctors")->where("id", $id)->delete();
        Alert("Message", "Delete Doctor Successfully !");
        return redirect()->route('doctor');
    }
}
