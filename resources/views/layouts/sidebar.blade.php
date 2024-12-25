<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">Admin Menu</li>
                <li class="{{ request()->routeIs('dashboard.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.dashboard') }}"><span class="menu-side"><img src="{{ asset('/assets/img/icons/menu-icon-01.svg') }}"
                                alt=""></span> <span>Admin Dashboard </span> <span
                            class="menu-arrow"></span></a>
                </li>
                <li class="submenu {{ request()->routeIs('dashboard.doctor' , 'dashboard.doctor.create') ? 'active' : '' }}">
                    <a href="#"><span class="menu-side "><img src="{{ asset('/assets/img/icons/menu-icon-02.svg') }}"
                                alt=""></span> <span> Doctors </span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('dashboard.doctor') }}">Doctors List</a></li>
                        <li><a href="{{ route('dashboard.doctor.create') }}">Add Doctor</a></li>
                    </ul>
                </li>
                {{-- <li class="submenu {{ request()->routeIs('dashboard.doctor' , 'dashboard.doctor.create') ? 'active' : '' }}">
                    <a href="#"><span class="menu-side "><img src="{{ asset('/assets/img/icons/menu-icon-02.svg') }}"
                                alt=""></span> <span> Doctor visit </span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('dashboard.doctor.visits.index') }}">indoctor List</a></li>
                    </ul>
                </li> --}}
                <li class="submenu">
                    <a href="#"><span class="menu-side"><img src="{{ asset('/assets/img/icons/menu-icon-03.svg') }}"
                                alt=""></span> <span>Patients </span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('dashboard.patient') }}">Patients List</a></li>
                        <li><a href="{{ route('dashboard.patient.dis') }}">Discharge Patients</a></li>
                        <li><a href="{{ route('dashboard.patient.in') }}">Indoor Patients</a></li>
                        <li><a href="{{ route('dashboard.patient.out') }}">Outdoor Patients</a></li>

                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><span class="menu-side"><img src="{{ asset('/assets/img/icons/menu-icon-03.svg') }}"
                                alt=""></span> <span>Patient Treatment </span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('dashboard.patient-treatments.index') }}">Patient Treatment List</a></li>
                        <li><a href="{{ route('dashboard.treatment.outdoor') }}">Out Patient Treatment </a></li>
                        <li><a href="{{ route('dashboard.treatment.indoor') }}">In Patient Treatment </a></li>
                        {{-- <li><a href="{{ route('dashboard.patient-treatments.create') }}">Add Patient Treatment</a></li> --}}
                    </ul>
                </li>
                {{-- <li class="submenu">
                    <a href="#"><span class="menu-side"><img src="{{ asset('/assets/img/icons/menu-icon-08.svg') }}"
                                alt=""></span> <span> Staff </span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="staff-list.html">Staff List</a></li>
                        <li><a href="add-staff.html">Add Staff</a></li>
                        <li><a href="staff-profile.html">Staff Profile</a></li>
                        <li><a href="staff-leave.html">Leaves</a></li>
                        <li><a href="staff-holiday.html">Holidays</a></li>
                        <li><a href="staff-attendance.html">Attendance</a></li>
                    </ul>
                </li> --}}
                <li class="submenu">
                    <a href="#"><span class="menu-side"><img src="{{ asset('/assets/img/icons/menu-icon-04.svg') }}"
                                alt=""></span> <span> Appointments </span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('dashboard.appoinment') }}">Appointment List</a></li>
                        <li><a href="/dashboard/appointments?search=outdoor">Out Appointment</a></li>
                        <li><a href="/dashboard/appointments?search=indoor">In Appointment</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><span class="menu-side"><img src="{{ asset('/assets/img/icons/menu-icon-04.svg') }}"
                                alt=""></span> <span>Admission</span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('dashboard.admissions.index') }}">Admission list</a></li>
                        <li><a href="{{ route('dashboard.guardians') }}">Guardian list</a></li>
                        <li><a href="{{ route('dashboard.doctor.visits.index') }}">Doctor Visit</a></li>
                        {{-- <li><a href="{{ route('dashboard.appoinment.create') }}">Out Appointment</a></li> --}}
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><span class="menu-side"><img src="{{ asset('/assets/img/icons/menu-icon-05.svg') }}"
                                alt=""></span> <span> Doctor Schedule </span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('dashboard.schedule') }}">Schedule List</a></li>
                        <li><a href="{{ route('dashboard.schedule.create') }}">Add Schedule</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><span class="menu-side"><img src="{{ asset('/assets/img/icons/menu-icon-07.svg') }}"
                                alt=""></span> <span> Service </span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('dashboard.services.index') }}">Service List</a></li>
                        <li><a href="{{ route('dashboard.service_schedules.index') }}">Service Shedule</a></li>
                        <li><a href="{{ route('dashboard.patient_service_schedules.index') }}">Patient Service Shedule</a></li>

                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><span class="menu-side"><img src="{{ asset('/assets/img/icons/menu-icon-06.svg') }}"
                                alt=""></span> <span> Ward </span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('dashboard.wards.index') }}">Ward List</a></li>
                        <li><a href="{{ route('dashboard.wards.create') }}">Add Ward</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><span class="menu-side"><img src="{{ asset('/assets/img/icons/menu-icon-07.svg') }}"
                                alt=""></span> <span> Room </span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('dashboard.rooms.index') }}">Room List</a></li>
                        <li><a href="{{ route('dashboard.room-type.index') }}">Room Type</a></li>
                        <li><a href="{{ route('dashboard.bedInRoom') }}">Bed in Ward</a></li>
                        <li><a href="{{ route('dashboard.beds.index') }}">Bed in Room</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><span class="menu-side"><img src="{{ asset('/assets/img/icons/menu-icon-07.svg') }}"
                                alt=""></span> <span> Medicine </span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('dashboard.medicines.index') }}">Medicine List</a></li>
                        <li><a href="{{ route('dashboard.medicine-categories.index') }}">Medicine Category</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><span class="menu-side"><img src="{{ asset('/assets/img/icons/menu-icon-07.svg') }}"
                                alt=""></span> <span> Hospital Charge </span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('dashboard.hospital-charge.index') }}">Hospital Charge List</a></li>
                        {{-- <li><a href="{{ route('dashboard.medicine-categories.index') }}">Medicine Category</a></li> --}}
                    </ul>
                </li>


            <div class="logout-btn " style="cursor: pointer">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();"><span class="menu-side"><img src="{{ asset('/assets/img/icons/logout.svg') }}"></span> <span>Logout</span></a>

                </form>
            </div>
        </div>
    </div>
</div>
