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
                                <!-- Patient Details Heading -->
                                <div class="col-12">
                                    <div class="form-heading">
                                        <h4>Patient Details</h4>
                                    </div>
                                </div>
                        
                                <!-- First Name -->
                                <div class="col-12 col-md-6 col-xl-4">
                                    <div class="input-block local-forms">
                                        <label>First Name <span class="login-danger">*</span></label>
                                        <input class="form-control" type="text" name="first_name" required>
                                    </div>
                                </div>
                        
                                <!-- Last Name -->
                                <div class="col-12 col-md-6 col-xl-4">
                                    <div class="input-block local-forms">
                                        <label>Last Name <span class="login-danger">*</span></label>
                                        <input class="form-control" type="text" name="last_name" required>
                                    </div>
                                </div>
                        
                                <!-- Gender -->
                                <div class="col-12 col-md-6 col-xl-4">
                                    <div class="input-block select-gender">
                                        <label class="gen-label">Gender<span class="login-danger">*</span></label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="gender" value="Male" class="form-check-input" required>Male
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="gender" value="Female" class="form-check-input" required>Female
                                            </label>
                                        </div>
                                    </div>
                                </div>
                        
                                <!-- Mobile -->
                                <div class="col-12 col-md-6 col-xl-6">
                                    <div class="input-block local-forms">
                                        <label>Mobile <span class="login-danger">*</span></label>
                                        <input class="form-control" type="text" name="mobile" required>
                                    </div>
                                </div>
                        
                                <!-- Email -->
                                <div class="col-12 col-md-6 col-xl-6">
                                    <div class="input-block local-forms">
                                        <label>Email <span class="login-danger">*</span></label>
                                        <input class="form-control" type="email" name="email" required>
                                    </div>
                                </div>
                        
                                <!-- Address -->
                                <div class="col-12 col-sm-12">
                                    <div class="input-block local-forms">
                                        <label>Address <span class="login-danger">*</span></label>
                                        <textarea class="form-control" rows="3" name="address" required></textarea>
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
                                            <!-- Loop through doctors dynamically -->
                                            @foreach ($doctors as $doctor)
                                                <option value="{{ $doctor->id }}">{{ $doctor->first_name }} {{ $doctor->last_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                        
                                <!-- Treatment -->
                                <div class="col-12 col-md-6 col-xl-6">
                                    <div class="input-block local-forms">
                                        <label>Treatment </label>
                                        <input class="form-control" type="text" name="treatment">
                                    </div>
                                </div>
                        
                                <!-- Notes -->
                                <div class="col-12 col-sm-12">
                                    <div class="input-block local-forms">
                                        <label>Notes <span class="login-danger">*</span></label>
                                        <textarea class="form-control" rows="3" name="notes" required></textarea>
                                    </div>
                                </div>
                        
                                <!-- Avatar Upload -->
                                <div class="col-12 col-md-6 col-xl-6">
                                    <div class="input-block local-top-form">
                                        <label class="local-top">Avatar <span class="login-danger">*</span></label>
                                        <div class="settings-btn upload-files-avatar">
                                            <input type="file" accept="image/*" name="avatar" id="file" class="hide-input" required>
                                            <label for="file" class="upload">Choose File</label>
                                        </div>
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
            <div class="modal-body text-center">
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
