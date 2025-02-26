@extends('layouts.store')
@section('content')
<div class="page-wrapper">
    <div class="content">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="patients.html">Patients </a></li>
                        <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                        <li class="breadcrumb-item active">Patient Profile</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="about-info">
                                    <h4>Patients Profile <span><a href="javascript:;"><i
                                                    class="feather-more-vertical"></i></a></span></h4>
                                </div>
                                <div class="doctor-profile-head">
                                    <div class="profile-bg-img">
                                        <img src="{{ asset('/') }}assets/img/profile-bg.jpg" alt="Profile">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-xl-4 col-md-4">
                                            <div class="profile-user-box">
                                                <div class="profile-user-img">
                                                    <img src="{{ asset('/') }}assets/img/profile-user-01.jpg" alt="Profile">
                                                    <div
                                                        class="mb-0 input-block doctor-up-files profile-edit-icon">
                                                        <div class="uplod d-flex">
                                                            <label class="mb-0 file-upload profile-upbtn">
                                                                <img src="{{ asset('/') }}assets/img/icons/camera-icon.svg"
                                                                    alt="Profile"><input type="file">
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="names-profiles">
                                                    <h4>Smith Bruklin</h4>
                                                    <h5>Engineer</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 d-flex align-items-center">
                                            <div class="follow-group">
                                                <div class="doctor-follows">
                                                    <h5>Followers</h5>
                                                    <h4>850</h4>
                                                </div>
                                                <div class="doctor-follows">
                                                    <h5>Following</h5>
                                                    <h4>18K</h4>
                                                </div>
                                                <div class="doctor-follows">
                                                    <h5>Posts</h5>
                                                    <h4>250</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-xl-4 d-flex align-items-center">
                                            <div class="py-3 follow-btn-group">
                                                <button type="submit"
                                                    class="btn btn-info follow-btns">Follow</button>
                                                <button type="submit"
                                                    class="btn btn-info message-btns">Message</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="doctor-personals-grp">
                            <div class="card">
                                <div class="card-body">
                                    <div class="heading-detail ">
                                        <h4 class="mb-3">About me</h4>
                                        <p>Hello I am Smith Bruklin a Gynaecologist in Sanjivni Hospital Surat.
                                            I love to work with all my hospital staff and seniour doctors.</p>
                                    </div>
                                    <div class="about-me-list">
                                        <ul class="list-space">
                                            <li>
                                                <h4>Gender</h4>
                                                <span>Male</span>
                                            </li>
                                            <li>
                                                <h4>Operation Done</h4>
                                                <span>30+</span>
                                            </li>
                                            <li>
                                                <h4>Designation</h4>
                                                <span>Engineer</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="doctor-personals-grp">
                            <div class="card">
                                <div class="card-body">
                                    <div class="heading-detail">
                                        <h4>Skills:</h4>
                                    </div>
                                    <div class="skill-blk">
                                        <div class="skill-statistics">
                                            <div class="skills-head">
                                                <h5>Heart Beat</h5>
                                                <p>45%</p>
                                            </div>
                                            <div class="mb-0 progress">
                                                <div class="progress-bar bg-operations" role="progressbar"
                                                    style="width: 45%" aria-valuenow="45" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="skill-statistics">
                                            <div class="skills-head">
                                                <h5>Haemoglobin</h5>
                                                <p>85%</p>
                                            </div>
                                            <div class="mb-0 progress">
                                                <div class="progress-bar bg-haemoglobin" role="progressbar"
                                                    style="width: 85%" aria-valuenow="85" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="skill-statistics">
                                            <div class="skills-head">
                                                <h5>Blood Pressure </h5>
                                                <p>65%</p>
                                            </div>
                                            <div class="mb-0 progress">
                                                <div class="progress-bar bg-statistics" role="progressbar"
                                                    style="width: 65%" aria-valuenow="65" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="skill-statistics">
                                            <div class="skills-head">
                                                <h5>Sugar </h5>
                                                <p>90%</p>
                                            </div>
                                            <div class="mb-0 progress">
                                                <div class="progress-bar bg-visit" role="progressbar"
                                                    style="width: 90%" aria-valuenow="90" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="doctor-personals-grp">
                            <div class="card">
                                <div class="card-body">
                                    <div class="tab-content-set">
                                        <ul class="nav">
                                            <li>
                                                <a href="patient-profile.html" class="active"><span
                                                        class="set-about-icon me-2"><img
                                                            src="{{ asset('/') }}assets/img/icons/menu-icon-02.svg"
                                                            alt=""></span>About me</a>
                                            </li>
                                            <li>
                                                <a href="patient-setting.html"><span
                                                        class="set-about-icon me-2"><img
                                                            src="{{ asset('/') }}assets/img/icons/menu-icon-16.svg"
                                                            alt=""></span>Settings</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="personal-list-out">
                                        <div class="row">
                                            <div class="col-xl-3 col-md-6">
                                                <div class="detail-personal">
                                                    <h2>Full Name</h2>
                                                    <h3>Smith Bruklin</h3>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <div class="detail-personal">
                                                    <h2>Mobile </h2>
                                                    <h3>264-625-2583</h3>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <div class="detail-personal">
                                                    <h2>Email</h2>
                                                    <h3><a href="/cdn-cgi/l/email-protection"
                                                            class="__cf_email__"
                                                            data-cfemail="295a44405d41694c44484045074a4644">[email&#160;protected]</a>
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <div class="detail-personal">
                                                    <h2>Location</h2>
                                                    <h3>USA</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hello-park">
                                        <p>Completed my graduation in Gynaecologist Medicine from the well known
                                            and renowned institution of India – SARDAR PATEL MEDICAL COLLEGE,
                                            BARODA in 2000-01, which was affiliated to M.S. University. I ranker
                                            in University exams from the same university from 1996-01.</p>
                                        <p>Worked as Professor and Head of the department ; Community medicine
                                            Department at Sterline Hospital, Rajkot, Gujarat from 2003-2015</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title ">Medical History</h4>
                                </div>
                                <div class="p-0 card-body table-dash">
                                    <div class="table-responsive">
                                        <table
                                            class="table mb-0 border-0 datatable custom-table patient-profile-table">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <div class="form-check check-tables">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="something">
                                                        </div>
                                                    </th>
                                                    <th>Date</th>
                                                    <th>Doctor</th>
                                                    <th>Treatment</th>
                                                    <th>Charges ($)</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="form-check check-tables">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="something">
                                                        </div>
                                                    </td>
                                                    <td>29/09/2022 </td>
                                                    <td>Dr.Jenny Smith</td>
                                                    <td>Check up</td>
                                                    <td>$ 60</td>
                                                    <td class="text-end">
                                                        <div class="dropdown dropdown-action">
                                                            <a href="#"
                                                                class="action-icon dropdown-toggle"
                                                                data-bs-toggle="dropdown"
                                                                aria-expanded="false"><i
                                                                    class="fa fa-ellipsis-v"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item"
                                                                    href="edit-appointment.html"><i
                                                                        class="fa-solid fa-pen-to-square m-r-5"></i>
                                                                    Edit</a>
                                                                <a class="dropdown-item" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#delete_appointment"><i
                                                                        class="fa fa-trash-alt m-r-5"></i>
                                                                    Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check check-tables">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="something">
                                                        </div>
                                                    </td>
                                                    <td>19/09/2022 </td>
                                                    <td>Andrea Lalema</td>
                                                    <td>Blood Test </td>
                                                    <td>$ 50</td>
                                                    <td class="text-end">
                                                        <div class="dropdown dropdown-action">
                                                            <a href="#"
                                                                class="action-icon dropdown-toggle"
                                                                data-bs-toggle="dropdown"
                                                                aria-expanded="false"><i
                                                                    class="fa fa-ellipsis-v"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item"
                                                                    href="edit-appointment.html"><i
                                                                        class="fa-solid fa-pen-to-square m-r-5"></i>
                                                                    Edit</a>
                                                                <a class="dropdown-item" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#delete_appointment"><i
                                                                        class="fa fa-trash-alt m-r-5"></i>
                                                                    Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check check-tables">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="something">
                                                        </div>
                                                    </td>
                                                    <td>20/09/2022 </td>
                                                    <td>Dr.William Stephin</td>
                                                    <td>Blood Pressure</td>
                                                    <td>$ 30</td>
                                                    <td class="text-end">
                                                        <div class="dropdown dropdown-action">
                                                            <a href="#"
                                                                class="action-icon dropdown-toggle"
                                                                data-bs-toggle="dropdown"
                                                                aria-expanded="false"><i
                                                                    class="fa fa-ellipsis-v"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item"
                                                                    href="edit-appointment.html"><i
                                                                        class="fa-solid fa-pen-to-square m-r-5"></i>
                                                                    Edit</a>
                                                                <a class="dropdown-item" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#delete_appointment"><i
                                                                        class="fa fa-trash-alt m-r-5"></i>
                                                                    Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                <img src="{{ asset('/') }}assets/img/sent.png" alt="" width="50" height="46">
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
