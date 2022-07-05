<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\Specialist;
use App\Http\Controllers\LogoutController;
use Illuminate\Routing\RouteFileRegistrar;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Client\AppointmentController;


// HANDLE REDIRECT WHEN ACCOUNT LOGIN TO HOME
Route::get('/', [RedirectController::class, "index"]);
// HANDLE GET REGISTER VIEW
Route::get("/register", [RegisterController::class, "index"])->name('register');
// HANDLE CREATE ACCOUNT
Route::post("/register", [RegisterController::class, "register"])->name('register.create');
// HANDLE GET LOGIN VIEW
Route::get("/login", [LoginController::class, "index"])->name('login');
// HANDLE  LOGIN
Route::post("/login", [LoginController::class, "login"])->name('login.create');
// HANDLE LOGOUT
Route::get("/logout", [LogoutController::class, "handleLogout"])->name("logout");

// HANDLE CREATE APPOINTMENT
Route::post('/appointment', [AppointmentController::class, "createAppointment"]);
// GET MY APPOINTMENT
Route::get("/appointment/{id}", [AppointmentController::class, 'getMyAppointment']);



Route::middleware(['auth.admin'])->group(function () {
    // GET  DOCTOR VIEW
    Route::get("/doctors", [DoctorController::class, 'index'])->name("doctor");
    // GET  DOCTOR UPDATE VIEW
    Route::get("/doctor/update/{id}", [DoctorController::class, 'getViewUpdateDoctor'])->name("doctors.update.view");
    // CREATE  DOCTOR
    Route::post("/doctor/create", [DoctorController::class, 'doctorCreate']);
    // UPDATE  DOCTOR
    Route::put("/doctor/update/{id}", [DoctorController::class, 'doctorUpdate']);
    // DELETE  DOCTOR
    Route::get("/doctor/delete/{id}", [DoctorController::class, 'doctorDelete'])->name("doctor.delete");
    // GET  SPECIALIST VIEW
    Route::get("/specialist", [Specialist::class, 'index'])->name("specialist");
    // CREATE  SPECIALIST
    Route::post("/specialist/create", [Specialist::class, 'specialistCreate'])->name("specialist.create");
    // GET  SPECIALIST UPDATE VIEW
    Route::get("/specialist/update/{id}", [Specialist::class, 'getViewSpecialistUpdate'])->name("specialist.update.view");
    // UPDATE  SPECIALIST
    Route::put("/specialist/update/{id}", [Specialist::class, 'specialistUpdate'])->name("specialist.update");
    // DELETE  SPECIALIST
    Route::get("/specialist/delete/{id}", [Specialist::class, 'specialistDelete']);
    // GET ACCOUNT VIEW
    Route::get("/accounts", [AccountController::class, "index"]);
    // GET ACCOUNT UPDATE VIEW
    Route::get("/account/update/{id}", [AccountController::class, "getViewUpdateAccount"]);
    // HANDLE UPDATE ACCOUNT
    Route::put("/account/update/{id}", [AccountController::class, "handleUpdateAccount"]);
    // HANDLE DELETE ACCOUNT
    Route::get("/account/delete/{id}", [AccountController::class, "handleDeleteAccount"]);

    // GET APPOINTMENT VIEW
    Route::get("/appointments", [AppointmentController::class, 'index']);
    // UPDATE APPOINTMENT STATUS
    Route::put("/appointments/update/{id}", [AppointmentController::class, 'handleUpdaStatusAppointment']);
});
