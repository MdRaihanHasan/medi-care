@extends('layouts.store')
@section('content')
<div class="page-wrapper">
    <div class="content">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Patient Treatment </a></li>
                        <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                        <li class="breadcrumb-item active">Add Patient Treatment</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('dashboard.patient-treatments.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <!-- Heading -->
                                <div class="col-12">
                                    <div class="form-heading">
                                        <h4>Patient Treatment Details</h4>
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

                                <!-- Treatment Type -->
                                <div class="col-12 col-md-6 col-xl-6">
                                    <div class="input-block local-forms">
                                        <label>Treatment Type <span class="login-danger">*</span></label>
                                        <select class="form-control" name="treatment_type" required>
                                            <option value="" disabled selected>Select Treatment Type</option>
                                            <option value="indoor">Indoor</option>
                                            <option value="outdoor">Outdoor</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Treatment Date -->
                                <div class="col-12 col-md-6 col-xl-6">
                                    <div class="input-block local-forms">
                                        <label>Treatment Date <span class="login-danger">*</span></label>
                                        <input class="form-control" type="date" name="treatment_date" required>
                                    </div>
                                </div>

                                <!-- Treatment Details -->
                                <div class="col-12">
                                    <div class="input-block local-forms">
                                        <label>Treatment Details</label>
                                        <textarea class="form-control" name="treatment_details" placeholder="Enter Treatment Details (optional)"></textarea>
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
