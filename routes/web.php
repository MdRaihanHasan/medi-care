<?php

use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BedController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\WardController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AppoinmentController;
use App\Http\Controllers\DoctorSheduleController;
use App\Http\Controllers\HospitalChargeController;
use App\Http\Controllers\ServiceScheduleController;
use App\Http\Controllers\MedicineCategoryController;
use App\Http\Controllers\PatientTreatmentController;
use App\Http\Controllers\PatientServiceScheduleController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => ['auth']], function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/doctors', [DoctorController::class, 'index'])->name('doctor');
    Route::get('/doctor/create', [DoctorController::class, 'create'])->name('doctor.create');
    Route::post('/doctor/create', [DoctorController::class, 'store'])->name('doctor.store');
    Route::get('/doctor/profile/{id}', [DoctorController::class, 'profile'])->name('doctor.profile');
    Route::get('/doctor/{id}/edit', [DoctorController::class, 'edit'])->name('doctor.edit');
    Route::put('/doctor/update/{id}', [DoctorController::class, 'update'])->name('doctor.update');
    Route::delete('/doctor/delete/{id}', [DoctorController::class, 'destroy'])->name('doctor.destroy');

    Route::get('/patients', [PatientController::class, 'index'])->name('patient');
    Route::get('/patient/create', [PatientController::class, 'create'])->name('patient.create');
    Route::get('/patient/profile', [PatientController::class, 'profile'])->name('patient.profile');
    Route::post('/patients/store', [PatientController::class, 'store'])->name('patient.store');
    Route::delete('/patients/{id}', [PatientController::class, 'destroy'])->name('patients.destroy');


    Route::get('/staffs', [StaffController::class, 'index'])->name('staff');
    Route::get('/staff/create', [StaffController::class, 'create'])->name('staff.create');
    Route::get('/staff/profile', [StaffController::class, 'profile'])->name('staff.profile');

    Route::get('/appointments', [AppoinmentController::class, 'index'])->name('appoinment');
    Route::get('/appointment/create', [AppoinmentController::class, 'create'])->name('appoinment.create');
    Route::post('/appointment/create', [AppoinmentController::class, 'store'])->name('appoinment.store');
    Route::get('/appointment/profile/{id}', [AppoinmentController::class, 'profile'])->name('appoinment.profile');
    Route::get('/appointment/{id}/edit', [AppoinmentController::class, 'edit'])->name('appoinment.edit');
    Route::put('/appointment/update/{id}', [AppoinmentController::class, 'update'])->name('appoinment.update');
    Route::delete('/appointment/delete/{id}', [AppoinmentController::class, 'destroy'])->name('appoinment.destroy');

    Route::get('/doctor-schedules', [DoctorSheduleController::class, 'index'])->name('schedule');
    Route::get('/doctor-schedule/create', [DoctorSheduleController::class, 'create'])->name('schedule.create');
    Route::post('/doctor-schedule/create', [DoctorSheduleController::class, 'store'])->name('schedule.store');
    Route::get('/doctor-schedule/profile/{id}', [DoctorSheduleController::class, 'profile'])->name('schedule.profile');
    Route::get('/doctor-schedule/{id}/edit', [DoctorSheduleController::class, 'edit'])->name('schedule.edit');
    Route::put('/doctor-schedule/update/{id}', [DoctorSheduleController::class, 'update'])->name('schedule.update');
    Route::delete('/doctor-schedule/delete/{id}', [DoctorSheduleController::class, 'destroy'])->name('schedule.destroy');

    Route::resource('wards', WardController::class);
    Route::resource('rooms', RoomController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('patient-treatments', PatientTreatmentController::class);
    Route::resource('room-type', RoomTypeController::class);
    Route::Resource('medicine-categories', MedicineCategoryController::class);
    Route::Resource('medicines', MedicineController::class);
    Route::Resource('hospital-charge', HospitalChargeController::class);
    Route::resource('service_schedules', ServiceScheduleController::class);
    Route::resource('beds', BedController::class);
    Route::resource('patient_service_schedules', PatientServiceScheduleController::class);
    Route::resource('admissions', AdmissionController::class);
    Route::get('guardians', [AdmissionController::class, 'guardian'])->name('guardians');

    Route::get('/treatment/outdoor', [PatientTreatmentController::class, 'outdoor'])->name('treatment.outdoor');
    Route::get('/treatment/indoor', [PatientTreatmentController::class, 'indoor'])->name('treatment.indoor');


});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
