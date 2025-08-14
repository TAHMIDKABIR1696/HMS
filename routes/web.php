<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PatientAppointmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MedController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', [HomeController::class, 'redirect'])->name('redirect');


// Patient routes
Route::middleware(['auth', 'patient'])
    ->prefix('patient')
    ->name('patient.')
    ->group(function () {
        
        Route::get('/dashboard', [PatientController::class, 'dashboard'])->name('dashboard');
        Route::get('/book-appointment', [PatientController::class, 'bookAppointment'])->name('book-appointment');
        Route::get('/ambulance-booking', [PatientController::class, 'ambulanceBooking'])->name('ambulance-booking');
        Route::get('/report', [PatientController::class, 'seeroprt'])->name('report');
        Route::get('/patient/home', [PatientController::class, 'home'])->name('patient.home');

        // Book appointment form & store
        Route::get('/book-appointment-form', [PatientAppointmentController::class, 'create'])->name('book-appointment.form');
        Route::post('/book-appointment-form', [PatientAppointmentController::class, 'store'])->name('book-appointment.store');

        


        // Medicine store
        Route::get('/medstore', [PatientController::class, 'medStore'])->name('medstore');
        Route::get('/medicine-store', [App\Http\Controllers\MedController::class, 'index'])->name('medicine.index');
        Route::post('/medicine-store/purchase', [App\Http\Controllers\MedController::class, 'purchase'])->name('medicine.purchase');


    });


//doctor routes
Route::middleware(['auth', 'doctor'])->prefix('doctor')->name('doctor.')->group(function () {
    Route::get('/dashboard', [DoctorController::class, 'doctorDashboard'])->name('dashboard');
    
    Route::get('/doctor/appointment', [DoctorController::class, 'appointment'])->name('appointment');
    Route::get('/doctor/report', [DoctorController::class, 'report'])->name('report');
    Route::get('/doctor/patienthistory', [DoctorController::class, 'patienthistory'])->name('patienthistory');
});
 

//admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    
}); 

Route::get('/admin/home', function () {
    return view('admin.home');
})->middleware(['auth', 'verified'])->name('admin.home');

Route::get('/doctor/home', function () {
    return view('doctor.home');
})->middleware(['auth', 'verified'])->name('doctor.home');

Route::get('/patient/home', function () {
    return view('patient.home');
})->middleware(['auth', 'verified'])->name('patient.home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
