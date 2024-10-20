<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index() {
        return view('dashboard.doctors.index');
    }

    public function create() {
        return view('dashboard.doctors.store');
    }

    public function profile() {
        return view('dashboard.doctors.profile');
    }
}
