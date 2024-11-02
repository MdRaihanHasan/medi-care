@extends('layouts.store')
@section('content')
<div class="page-wrapper">
    <div class="content">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="appointments.html">Appointment </a></li>
                        <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                        <li class="breadcrumb-item active">Book Appointment</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('dashboard.appoinment.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <!-- Patient Selection -->
                                <div class="col-12">
                                    <div class="form-heading">
                                        <h4>Patient Selection</h4>
                                    </div>
                                </div>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="col-12 col-md-6 col-xl-6">
                                    <div class="input-block local-forms">
                                        <label>Select Existing Patient</label>
                                        <select class="form-control select" name="existing_patient_id" id="existing_patient_id">
                                            <option value="">New Patient</option>
                                            @foreach ($patients as $patient)
                                                <option value="{{ $patient->id }}">
                                                    {{ $patient->first_name }} {{ $patient->last_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Patient Details Heading -->
                                <div class="col-12 new-patient-fields" >
                                    <div class="form-heading">
                                        <h4>Patient Details</h4>
                                    </div>
                                </div>

                                <!-- First Name -->
                                <div class="col-12 col-md-6 col-xl-4 new-patient-fields">
                                    <div class="input-block local-forms">
                                        <label>First Name <span class="login-danger">*</span></label>
                                        <input class="form-control" type="text" name="first_name" id="first_name" required>
                                    </div>
                                </div>

                                <!-- Last Name -->
                                <div class="col-12 col-md-6 col-xl-4 new-patient-fields">
                                    <div class="input-block local-forms">
                                        <label>Last Name <span class="login-danger">*</span></label>
                                        <input class="form-control" type="text" name="last_name" id="last_name" required>
                                    </div>
                                </div>

                                <!-- Mobile -->
                                <div class="col-12 col-md-6 col-xl-4 new-patient-fields">
                                    <div class="input-block local-forms">
                                        <label>Mobile <span class="login-danger">*</span></label>
                                        <input class="form-control" type="text" name="mobile" id="mobile" required>
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="col-12 col-md-6 col-xl-4 new-patient-fields">
                                    <div class="input-block local-forms">
                                        <label>Email <span class="login-danger">*</span></label>
                                        <input class="form-control" type="email" name="email" id="email" required>
                                    </div>
                                </div>

                                <div class="col-12 col-md-12col-xl-12 new-patient-fields">
                                    <div class="input-block select-gender">
                                        <label class="gen-label">Gender <span class="login-danger">*</span></label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="gender" value="Male" class="form-check-input"> Male
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="gender" value="Female" class="form-check-input"> Female
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Address -->
                                <div class="col-12 new-patient-fields">
                                    <div class="input-block local-forms">
                                        <label>Address <span class="login-danger">*</span></label>
                                        <textarea class="form-control" rows="3" name="address" id="address" required></textarea>
                                    </div>
                                </div>

                                <!-- Appointment Details Heading -->
                                <div class="col-12">
                                    <div class="form-heading">
                                        <h4>Appointment Details</h4>
                                    </div>
                                </div>

                                <!-- Date of Appointment -->
                                <div class="col-12 col-md-6 col-xl-4">
                                    <div class="input-block local-forms cal-icon">
                                        <label>Date of Appointment <span class="login-danger">*</span></label>
                                        <input class="form-control datetimepicker" type="text" name="appointment_date" required>
                                    </div>
                                </div>

                                <!-- Time From -->
                                <div class="col-12 col-md-6 col-xl-4">
                                    <div class="input-block local-forms">
                                        <label>From <span class="login-danger">*</span></label>
                                        <div class="time-icon">
                                            <input type="text" class="form-control" id="datetimepicker3" name="appointment_from" required>
                                        </div>
                                    </div>
                                </div>

                                <!-- Time To -->
                                <div class="col-12 col-md-6 col-xl-4">
                                    <div class="input-block local-forms">
                                        <label>To <span class="login-danger">*</span></label>
                                        <div class="time-icon">
                                            <input type="text" class="form-control" id="datetimepicker4" name="appointment_to" required>
                                        </div>
                                    </div>
                                </div>

                                <!-- Consulting Doctor -->
                                <div class="col-12 col-md-6 col-xl-6">
                                    <div class="input-block local-forms">
                                        <label>Consulting Doctor</label>
                                        <select class="form-control select" name="doctor_id" required>
                                            <option value="">Select Doctor</option>
                                            @foreach ($doctors as $doctor)
                                                <option value="{{ $doctor->id }}">{{ $doctor->first_name }} {{ $doctor->last_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Notes -->
                                <div class="col-12">
                                    <div class="input-block local-forms">
                                        <label>Notes <span class="login-danger">*</span></label>
                                        <textarea class="form-control" rows="3" name="notes" required></textarea>
                                    </div>
                                </div>

                                <!-- Submit and Cancel Buttons -->
                                <div class="col-12">
                                    <div class="doctor-submit text-end">
                                        <button type="submit" class="btn btn-primary submit-form me-2">Submit</button>
                                        <a href="{{ route('dashboard.appoinment') }}" class="btn btn-secondary">Cancel</a>
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
<div id="delete_patient" class="modal fade delete-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="text-center modal-body">
                <img src="assets/img/sent.png" alt="" width="50" height="46">
                <h3>Are you sure want to delete this ?</h3>
                <div class="m-t-20"> <a href="#" class="btn btn-white"
                        data-bs-dismiss="modal">Close</a>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // JavaScript to populate form fields based on selected patient
    document.getElementById('existing_patient_id').addEventListener('change', function () {
        let selectedPatientId = this.value;

        if (selectedPatientId) {
            fetch(`/dashboard/patients/${selectedPatientId}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('first_name').value = data.first_name;
                    document.getElementById('last_name').value = data.last_name;
                    document.getElementById('mobile').value = data.mobile;
                    document.getElementById('email').value = data.email;
                    document.getElementById('address').value = data.address;
                    // Populate other fields as needed...
                });
        } else {
            // Clear fields for a new patient
            document.getElementById('first_name').value = '';
            document.getElementById('last_name').value = '';
            document.getElementById('mobile').value = '';
            document.getElementById('email').value = '';
            document.getElementById('address').value = '';
        }
    });
</script>

<script>
    $(document).ready(function() {
        $('#existing_patient_id').on('change', function() {
            if ($(this).val() === '') {
                // Show all fields
                $('.new-patient-fields').show();
            } else {
                // Hide all fields
                $('.new-patient-fields').hide();
            }
        });
    });
</script>


@endsection
