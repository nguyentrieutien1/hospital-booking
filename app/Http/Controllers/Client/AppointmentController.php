<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = DB::table("appointments")->select(DB::raw('*, appointments.id as appointment_id'))->join('users', 'users.id', 'appointments.user_id')->join('doctors', 'doctors.id', 'appointments.doctor_id')->get();
        return view("admin.appointment.appointment", ['appointments' => $appointments]);
    }
    public function createAppointment(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'phone' => ['required', 'max:255'],
            'email' => ['required', 'email:rfc,dns'],
            'time' => ['required'],
            'doctor' => ['required'],
        ]);
        DB::table('appointments')->insert(["name" => $request->name, "phone" => $request->phone, "email" => $request->email, "time" => $request->time, "doctor_id" => $request->doctor, "user_id" => Auth::user()->id]);
        Alert::success("Messenge", "Order Appointment Successfully !");
        return redirect()->back();
    }
    public function handleUpdaStatusAppointment($id)
    {
        $appointment = DB::table("appointments")->where("id", $id)->get();
        DB::table("appointments")->where("id", $id)->update(["status" => !$appointment[0]->status]);
        return ["messege" => "Update Status Successfully !", "statusCode" => 201];
    }
    public function getMyAppointment($id)
    {
        $appointments = DB::table("appointments")->select(DB::raw('*, appointments.id as appointment_id'))->where("user_id", $id)->join('users', 'users.id', 'appointments.user_id')->join('doctors', 'doctors.id', 'appointments.doctor_id')->get();
        return view("client.appointment.appointment", ['appointments' => $appointments]);
    }
}
