<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index() {
        return view('dashboard.staffs.index');
    }

    public function create() {
        return view('dashboard.staffs.store');
    }

    public function profile() {
        return view('dashboard.staffs.profile');
    }

}
