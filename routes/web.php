<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PatientAppointmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MedController;
use App\Http\Controllers\AmbulanceBookingController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PatientProfileController;
use App\Http\Controllers\DoctorProfileController;
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
        Route::get('/report', [PatientController::class, 'seeReport'])->name('report');

        // Book appointment
        Route::get('/book-appointment', [PatientAppointmentController::class, 'create'])
            ->name('book-appointment');   // <-- keep this name so links don't break
        Route::post('/book-appointment', [PatientAppointmentController::class, 'store'])
            ->name('book-appointment.store');

        // Medicine store
        Route::get('/medicine-store', [MedController::class, 'index'])->name('medicine.index');
        Route::post('/medicine-store/purchase', [MedController::class, 'purchase'])->name('medicine.purchase');

        // Ambulance booking
        Route::get('/ambulance-booking', [AmbulanceBookingController::class, 'create'])->name('ambulance-booking');
        Route::post('/ambulance-booking', [AmbulanceBookingController::class, 'store'])->name('ambulance.store');

        Route::get('/profile', [PatientProfileController::class, 'edit'])->name('profile');
        Route::post('/profile', [PatientProfileController::class, 'update'])->name('profile.update');
        Route::get('/patient/reports', [ReportController::class, 'patientReports'])->name('reports');


    });



// doctor routes
Route::middleware(['auth', 'doctor'])
            ->prefix('doctor')
            ->name('doctor.')
            ->group(function () {

                Route::get('/dashboard', [DoctorController::class, 'doctorDashboard'])->name('dashboard');

                Route::get('/appointment', [DoctorController::class, 'appointment'])->name('appointment');
                Route::post('/appointment/{id}/approve', [DoctorController::class, 'approve'])->name('appointment.approve');
                Route::post('/appointment/{id}/cancel', [DoctorController::class, 'cancel'])->name('appointment.cancel');

                Route::get('/patienthistory', [DoctorController::class, 'patienthistory'])->name('patienthistory');
                Route::get('/income', [DoctorController::class, 'income'])->name('income');

                Route::get('/doctor/reports', [ReportController::class, 'doctorReports'])->name('reports');
                Route::get('/doctor/reports/create/{appointment}', [ReportController::class, 'create'])->name('reports.create');
                Route::post('/doctor/reports/store/{appointment}', [ReportController::class, 'store'])->name('reports.store');
                Route::get('/profile', [DoctorProfileController::class, 'edit'])->name('profile');
                Route::post('/profile', [DoctorProfileController::class, 'update'])->name('profile.update');

        });

        
 

//admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'home'])->name('dashboard');
    Route::get('/patients', [AdminController::class, 'patients'])->name('patient');
    Route::get('/doctors', [AdminController::class, 'doctors'])->name('doctor');
    Route::get('/ambulance/bookings', [AdminController::class, 'ambulanceBookings'])->name('ambulance.bookings');
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
