@extends('layouts.store')
@section('content')
<div class="page-wrapper">
    <div class="content">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Doctors </a></li>
                        <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                        <li class="breadcrumb-item active">Add Doctor</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ isset($doctor) ? route('dashboard.doctor.update', $doctor->id) : route('dashboard.doctor.store') }}"
                            method="POST" enctype="multipart/form-data">
                          @csrf
                          @if(isset($doctor))
                              @method('PUT')
                          @endif

                          <h4>Doctor Details</h4>

                          @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                          <!-- First Name -->
                          <div class="input-block local-forms">
                              <label>First Name <span class="login-danger">*</span></label>
                              <input type="text" name="first_name" class="form-control" value="{{ old('first_name', $doctor->first_name ?? '') }}" required>
                          </div>

                          <!-- Last Name -->
                          <div class="input-block local-forms">
                              <label>Last Name <span class="login-danger">*</span></label>
                              <input type="text" name="last_name" class="form-control" value="{{ old('last_name', $doctor->last_name ?? '') }}" required>
                          </div>

                          <!-- Username -->
                          <div class="input-block local-forms">
                              <label>Username <span class="login-danger">*</span></label>
                              <input type="text" name="username" class="form-control" value="{{ old('username', $doctor->username ?? '') }}" required>
                          </div>

                          <!-- Mobile -->
                          <div class="input-block local-forms">
                              <label>Mobile <span class="login-danger">*</span></label>
                              <input type="number" name="mobile" class="form-control" value="{{ old('mobile', $doctor->mobile ?? '') }}" required>
                          </div>

                          <!-- Email -->
                          <div class="input-block local-forms">
                              <label>Email <span class="login-danger">*</span></label>
                              <input type="email" name="email" class="form-control" value="{{ old('email', $doctor->email ?? '') }}" required>
                          </div>

                          <!-- Password -->
                          {{-- @if(!isset($doctor)) <!-- Show password fields only on create -->
                              <div class="input-block local-forms">
                                  <label>Password <span class="login-danger">*</span></label>
                                  <input type="password" name="password" class="form-control" required>
                              </div>

                              <div class="input-block local-forms">
                                  <label>Confirm Password <span class="login-danger">*</span></label>
                                  <input type="password" name="password_confirmation" class="form-control" required>
                              </div>
                          @endif --}}

                          <!-- Date of Birth -->
                          <div class="input-block local-forms cal-icon">
                              <label>Date of Birth <span class="login-danger">*</span></label>
                              <input type="date" name="date_of_birth" class="form-control" value="{{ old('date_of_birth', $doctorInfo->date_of_birth ?? '') }}" required>
                          </div>

                          <!-- Gender -->
                          <div class="input-block select-gender">
                              <label>Gender <span class="login-danger">*</span></label>
                              <label><input type="radio" name="gender" value="Male" {{ old('gender', $doctorInfo->gender ?? '') == 'Male' ? 'checked' : '' }}> Male</label>
                              <label><input type="radio" name="gender" value="Female" {{ old('gender', $doctorInfo->gender ?? '') == 'Female' ? 'checked' : '' }}> Female</label>
                          </div>

                          <!-- Education -->
                          <div class="input-block local-forms">
                              <label>Education <span class="login-danger">*</span></label>
                              <input type="text" name="education" class="form-control" value="{{ old('education', $doctorInfo->education ?? '') }}" required>
                          </div>

                          <!-- Designation -->
                          <div class="input-block local-forms">
                              <label>Designation <span class="login-danger">*</span></label>
                              <input type="text" name="designation" class="form-control" value="{{ old('designation', $doctorInfo->designation ?? '') }}" required>
                          </div>

                          <!-- Department -->
                          <div class="input-block local-forms">
                              <label>Department <span class="login-danger">*</span></label>
                              <select name="department" class="form-control" required>
                                  <option>Select Department</option>
                                  <option value="Orthopedics" {{ old('department', $doctorInfo->department ?? '') == 'Orthopedics' ? 'selected' : '' }}>Orthopedics</option>
                                  <option value="Radiology" {{ old('department', $doctorInfo->department ?? '') == 'Radiology' ? 'selected' : '' }}>Radiology</option>
                                  <option value="Dentist" {{ old('department', $doctorInfo->department ?? '') == 'Dentist' ? 'selected' : '' }}>Dentist</option>
                              </select>
                          </div>

                          <!-- Address -->
                          <div class="input-block local-forms">
                              <label>Address <span class="login-danger">*</span></label>
                              <textarea name="address" class="form-control" rows="3" required>{{ old('address', $doctorInfo->address ?? '') }}</textarea>
                          </div>

                          <!-- City -->
                          <div class="input-block local-forms">
                              <label>City <span class="login-danger">*</span></label>
                              <input type="text" name="city" class="form-control" value="{{ old('city', $doctorInfo->city ?? '') }}" required>
                          </div>

                          <!-- Country -->
                          <div class="input-block local-forms">
                              <label>Country <span class="login-danger">*</span></label>
                              <input type="text" name="country" class="form-control" value="{{ old('country', $doctorInfo->country ?? '') }}" required>
                          </div>

                          <!-- State -->
                          <div class="input-block local-forms">
                              <label>State/Province <span class="login-danger">*</span></label>
                              <input type="text" name="state" class="form-control" value="{{ old('state', $doctorInfo->state ?? '') }}" required>
                          </div>

                          <!-- Postal Code -->
                          <div class="input-block local-forms">
                              <label>Postal Code <span class="login-danger">*</span></label>
                              <input type="number" name="postal_code" class="form-control" value="{{ old('postal_code', $doctorInfo->postal_code ?? '') }}" required>
                          </div>

                          <!-- Biography -->
                          <div class="input-block local-forms">
                              <label>Biography <span class="login-danger">*</span></label>
                              <textarea name="biography" class="form-control" rows="3" required>{{ old('biography', $doctorInfo->biography ?? '') }}</textarea>
                          </div>

                          <!-- Avatar -->
                          <div class="input-block local-top-form">
                              <label>Avatar <span class="login-danger">*</span></label>
                              <input type="file" name="avatar" accept="image/*" class="form-control">
                          </div>

                          <!-- Status -->
                          <div class="input-block select-gender">
                              <label>Status <span class="login-danger">*</span></label>
                              <label><input type="radio" name="status" value="Active" {{ old('status', $doctorInfo->status ?? '') == 'Active' ? 'checked' : '' }}> Active</label>
                              <label><input type="radio" name="status" value="Inactive" {{ old('status', $doctorInfo->status ?? '') == 'Inactive' ? 'checked' : '' }}> Inactive</label>
                          </div>

                          <!-- Submit and Cancel Buttons -->
                          <div class="doctor-submit text-end">
                              <button type="submit" class="btn btn-primary">{{ isset($doctor) ? 'Update' : 'Submit' }}</button>
                              <a href="{{ route('dashboard.doctor.profile', $id) }}" class="btn btn-secondary">Cancel</a>
                          </div>
                      </form>

                      <!-- Delete Form -->
                      @if(isset($doctor))
                          <form action="{{ route('dashboard.doctor.destroy', $doctor->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this doctor?');">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                      @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="notification-box">
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
    </div> --}}
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
