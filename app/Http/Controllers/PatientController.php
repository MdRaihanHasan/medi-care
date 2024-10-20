<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index() {
        return view('dashboard.patients.index');
    }

    public function create() {
        return view('dashboard.patients.store');
    }

    public function profile() {
        return view('dashboard.patients.profile');
    }
}
