@extends('layouts.store')
@section('content')
<div class="page-wrapper">
    <div class="content">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Admission  </a></li>
                        <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                        <li class="breadcrumb-item active">Add Admission </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">

                    <div class="card-body">
                        <form action="{{ route('dashboard.admissions.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <!-- Heading -->
                                <div class="col-12">
                                    <div class="form-heading">
                                        <h4>Patient Admission Details</h4>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-xl-6">
                                    <div class="input-block local-forms">
                                        <label>Patient <span class="login-danger">*</span></label>
                                        <select class="form-control" name="patient_id" required>
                                            <option value="" disabled selected>Select Patient</option>
                                            @foreach ($patients as $patient)
                                                <option value="{{ $patient->id }}">{{ $patient->first_name }} {{ $patient->last_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Admission Reason -->
                                <div class="col-12 col-md-6 col-xl-6">
                                    <div class="input-block local-forms">
                                        <label>Admission Reason <span class="login-danger">*</span></label>
                                        <input class="form-control" type="text" name="admission_reason" required>
                                    </div>
                                </div>

                                <!-- Admission Date -->
                                <div class="col-12 col-md-6 col-xl-6">
                                    <div class="input-block local-forms">
                                        <label>Admission Date <span class="login-danger">*</span></label>
                                        <input class="form-control" type="date" name="admission_date" required>
                                    </div>
                                </div>

                                <!-- Ward -->
                                <div class="col-12 col-md-6 col-xl-6">
                                    <div class="input-block local-forms">
                                        <label>Ward</label>
                                        <select class="form-control" name="ward_id">
                                            <option value="" disabled selected>Select Ward</option>
                                            @foreach ($wards as $ward)
                                                <option value="{{ $ward->id }}">{{ $ward->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Room -->
                                <div class="col-12 col-md-6 col-xl-6">
                                    <div class="input-block local-forms">
                                        <label>Room</label>
                                        <select class="form-control" name="room_id">
                                            <option value="" disabled selected>Select Room</option>
                                            @foreach ($rooms as $room)
                                                <option value="{{ $room->id }}">{{ $room->room_number }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Guardian Name -->
                                <div class="col-12 col-md-6 col-xl-6">
                                    <div class="input-block local-forms">
                                        <label>Guardian First Name <span class="login-danger">*</span></label>
                                        <input class="form-control" type="text" name="guardian_first_name" required>
                                    </div>
                                </div>
                                <!-- Guardian Name -->
                                <div class="col-12 col-md-6 col-xl-6">
                                    <div class="input-block local-forms">
                                        <label>Guardian Last Name <span class="login-danger">*</span></label>
                                        <input class="form-control" type="text" name="guardian_last_name" required>
                                    </div>
                                </div>

                                <!-- Guardian Relationship -->
                                <div class="col-12 col-md-6 col-xl-6">
                                    <div class="input-block local-forms">
                                        <label>Guardian Relationship <span class="login-danger">*</span></label>
                                        <input class="form-control" type="text" name="guardian_relationship" required>
                                    </div>
                                </div>

                                <!-- Guardian Phone Number -->
                                <div class="col-12 col-md-6 col-xl-6">
                                    <div class="input-block local-forms">
                                        <label>Guardian Phone Number <span class="login-danger">*</span></label>
                                        <input class="form-control" type="tel" name="guardian_phone" required>
                                    </div>
                                </div>

                                <!-- Guardian Address -->
                                <div class="col-12 col-md-6 col-xl-6">
                                    <div class="input-block local-forms">
                                        <label>Guardian email</label>
                                        <textarea class="form-control" name="guardian_email" placeholder="Enter Guardian's email"></textarea>
                                    </div>
                                </div>

                                <!-- Submit Buttons -->
                                <div class="col-12">
                                    <div class="doctor-submit text-end">
                                        <button type="submit" class="btn btn-primary submit-form me-2">Submit</button>
                                        <button type="reset" class="btn btn-primary cancel-form">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>



                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

@endsection
