@extends('layouts.store')
@section('content')
<div class="page-wrapper">
    <div class="content">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">beds </a></li>
                        <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                        <li class="breadcrumb-item active">Add beds</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form
    action="{{ isset($patientServiceSchedule) ? route('dashboard.patient_service_schedules.update', $patientServiceSchedule->id) : route('dashboard.patient_service_schedules.store') }}"
    method="POST"
    enctype="multipart/form-data"
>
    @csrf
    @if(isset($patientServiceSchedule))
        @method('PUT')
    @endif

    <div class="row">
        <div class="col-12">
            <div class="form-heading">
                <h4>Patient Service Schedule Details</h4>
            </div>
        </div>

        <div class="col-12 col-md-6 col-xl-6">
            <div class="input-block local-forms">
                <label>Service Name <span class="login-danger">*</span></label>
                <select name="service_id" class="form-control" required>
                    <option value="">Select Service</option>
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}" {{ isset($patientServiceSchedule) && $patientServiceSchedule->service_id == $service->id ? 'selected' : '' }}>
                            {{ $service->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-12 col-md-6 col-xl-6">
            <div class="input-block local-forms">
                <label>Patient Name <span class="login-danger">*</span></label>
                <select name="patient_id" class="form-control" required>
                    <option value="">Select Patient</option>
                    @foreach ($patients as $patient)
                        <option value="{{ $patient->id }}" {{ isset($patientServiceSchedule) && $patientServiceSchedule->patient_id == $patient->id ? 'selected' : '' }}>
                            {{ $patient->first_name }} {{ $patient->last_name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-12 col-md-6 col-xl-6">
            <div class="input-block local-forms">
                <label>Patient Type <span class="login-danger">*</span></label>
                <select name="patient_type" class="form-control" required>
                    <option value="indoor" {{ isset($patientServiceSchedule) && $patientServiceSchedule->patient_type == 'indoor' ? 'selected' : '' }}>Indoor</option>
                    <option value="outdoor" {{ isset($patientServiceSchedule) && $patientServiceSchedule->patient_type == 'outdoor' ? 'selected' : '' }}>Outdoor</option>
                </select>
            </div>
        </div>

        <div class="col-12 col-md-6 col-xl-6">
            <div class="input-block local-forms">
                <label>Schedule Date <span class="login-danger">*</span></label>
                <input class="form-control" type="date" name="date" value="{{ isset($patientServiceSchedule) ? $patientServiceSchedule->date : '' }}" required>
            </div>
        </div>

        <div class="col-12 col-md-6 col-xl-6">
            <div class="input-block local-forms">
                <label>Start Time <span class="login-danger">*</span></label>
                <input class="form-control" type="time" name="start_time" value="{{ isset($patientServiceSchedule) ? $patientServiceSchedule->start_time : '' }}" required>
            </div>
        </div>

        <div class="col-12 col-md-6 col-xl-6">
            <div class="input-block local-forms">
                <label>End Time <span class="login-danger">*</span></label>
                <input class="form-control" type="time" name="end_time" value="{{ isset($patientServiceSchedule) ? $patientServiceSchedule->end_time : '' }}" required>
            </div>
        </div>

        <div class="col-12 col-md-6 col-xl-6">
            <div class="input-block local-forms">
                <label>Status <span class="login-danger">*</span></label>
                <select name="status" class="form-control" required>
                    <option value="available" {{ isset($patientServiceSchedule) && $patientServiceSchedule->status == 'available' ? 'selected' : '' }}>Available</option>
                    <option value="unavailable" {{ isset($patientServiceSchedule) && $patientServiceSchedule->status == 'unavailable' ? 'selected' : '' }}>Unavailable</option>
                </select>
            </div>
        </div>

        <!-- New Field: Bill Amount -->
        <div class="col-12 col-md-6 col-xl-6">
            <div class="input-block local-forms">
                <label>Bill Amount <span class="login-danger">*</span></label>
                <input class="form-control" type="number" name="bill_amount" step="0.01" value="{{ isset($patientServiceSchedule) ? $patientServiceSchedule->bill_amount : '' }}" required>
            </div>
        </div>

        <!-- New Field: Paid Status -->
        <div class="col-12 col-md-6 col-xl-6">
            <div class="input-block local-forms">
                <label>Paid Status <span class="login-danger">*</span></label>
                <select name="paid_status" class="form-control" required>
                    <option value="Paid" {{ isset($patientServiceSchedule) && $patientServiceSchedule->paid_status == 'Paid' ? 'selected' : '' }}>Paid</option>
                    <option value="Unpaid" {{ isset($patientServiceSchedule) && $patientServiceSchedule->paid_status == 'Unpaid' ? 'selected' : '' }}>Unpaid</option>
                </select>
            </div>
        </div>

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
    <div class="notification-box">
        <div class="msg-sidebar notifications msg-noti">
            <div class="topnav-dropdown-header">
                <span>Messages</span>
            </div>
            <div class="drop-scroll msg-list-scroll" id="msg_list">
                <ul class="list-box">
                    <li>
                        <a href="chat.html">
                            <div class="list-item">
                                <div class="list-left">
                                    <span class="avatar">R</span>
                                </div>
                                <div class="list-body">
                                    <span class="message-author">Richard Miles </span>
                                    <span class="message-time">12:28 AM</span>
                                    <div class="clearfix"></div>
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                        adipiscing</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="chat.html">
                            <div class="list-item new-message">
                                <div class="list-left">
                                    <span class="avatar">J</span>
                                </div>
                                <div class="list-body">
                                    <span class="message-author">John Doe</span>
                                    <span class="message-time">1 Aug</span>
                                    <div class="clearfix"></div>
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                        adipiscing</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="chat.html">
                            <div class="list-item">
                                <div class="list-left">
                                    <span class="avatar">T</span>
                                </div>
                                <div class="list-body">
                                    <span class="message-author"> Tarah Shropshire </span>
                                    <span class="message-time">12:28 AM</span>
                                    <div class="clearfix"></div>
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                        adipiscing</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="chat.html">
                            <div class="list-item">
                                <div class="list-left">
                                    <span class="avatar">M</span>
                                </div>
                                <div class="list-body">
                                    <span class="message-author">Mike Litorus</span>
                                    <span class="message-time">12:28 AM</span>
                                    <div class="clearfix"></div>
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                        adipiscing</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="chat.html">
                            <div class="list-item">
                                <div class="list-left">
                                    <span class="avatar">C</span>
                                </div>
                                <div class="list-body">
                                    <span class="message-author"> Catherine Manseau </span>
                                    <span class="message-time">12:28 AM</span>
                                    <div class="clearfix"></div>
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                        adipiscing</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="chat.html">
                            <div class="list-item">
                                <div class="list-left">
                                    <span class="avatar">D</span>
                                </div>
                                <div class="list-body">
                                    <span class="message-author"> Domenic Houston </span>
                                    <span class="message-time">12:28 AM</span>
                                    <div class="clearfix"></div>
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                        adipiscing</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="chat.html">
                            <div class="list-item">
                                <div class="list-left">
                                    <span class="avatar">B</span>
                                </div>
                                <div class="list-body">
                                    <span class="message-author"> Buster Wigton </span>
                                    <span class="message-time">12:28 AM</span>
                                    <div class="clearfix"></div>
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                        adipiscing</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="chat.html">
                            <div class="list-item">
                                <div class="list-left">
                                    <span class="avatar">R</span>
                                </div>
                                <div class="list-body">
                                    <span class="message-author"> Rolland Webber </span>
                                    <span class="message-time">12:28 AM</span>
                                    <div class="clearfix"></div>
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                        adipiscing</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="chat.html">
                            <div class="list-item">
                                <div class="list-left">
                                    <span class="avatar">C</span>
                                </div>
                                <div class="list-body">
                                    <span class="message-author"> Claire Mapes </span>
                                    <span class="message-time">12:28 AM</span>
                                    <div class="clearfix"></div>
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                        adipiscing</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="chat.html">
                            <div class="list-item">
                                <div class="list-left">
                                    <span class="avatar">M</span>
                                </div>
                                <div class="list-body">
                                    <span class="message-author">Melita Faucher</span>
                                    <span class="message-time">12:28 AM</span>
                                    <div class="clearfix"></div>
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                        adipiscing</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="chat.html">
                            <div class="list-item">
                                <div class="list-left">
                                    <span class="avatar">J</span>
                                </div>
                                <div class="list-body">
                                    <span class="message-author">Jeffery Lalor</span>
                                    <span class="message-time">12:28 AM</span>
                                    <div class="clearfix"></div>
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                        adipiscing</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="chat.html">
                            <div class="list-item">
                                <div class="list-left">
                                    <span class="avatar">L</span>
                                </div>
                                <div class="list-body">
                                    <span class="message-author">Loren Gatlin</span>
                                    <span class="message-time">12:28 AM</span>
                                    <div class="clearfix"></div>
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                        adipiscing</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="chat.html">
                            <div class="list-item">
                                <div class="list-left">
                                    <span class="avatar">T</span>
                                </div>
                                <div class="list-body">
                                    <span class="message-author">Tarah Shropshire</span>
                                    <span class="message-time">12:28 AM</span>
                                    <div class="clearfix"></div>
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                        adipiscing</span>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="topnav-dropdown-footer">
                <a href="chat.html">See all messages</a>
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
@endsection