@extends('layouts.store')
@section('content')
<div class="page-wrapper">
    <div class="content">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Admissions </a></li>
                        <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                        <li class="breadcrumb-item active">Admissions List</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table show-entire">
                    <div class="card-body">

                        <div class="mb-2 page-table-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    @if(session('success'))
                                        <div class="alert alert-success">{{ session('success') }}</div>
                                    @endif

                                    <div class="doctor-table-blk">
                                        <h3>Admissions List</h3>
                                        <div class="doctor-search-blk">
                                            @include('components.search-component', ['searchTerm' => $searchTerm])
                                            <div class="add-group">
                                                <a href="{{ route('dashboard.admissions.create') }}"
                                                    class="btn btn-primary add-pluss ms-2"><img
                                                        src="{{ asset('') }}assets/img/icons/plus.svg" alt=""></a>
                                                <a href="javascript:;"
                                                    class="btn btn-primary doctor-refresh ms-2"><img
                                                        src="{{ asset('') }}assets/img/icons/re-fresh.svg"
                                                        alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">
                                    <a href="javascript:;" class=" me-2"><img
                                            src="{{ asset('') }}assets/img/icons/pdf-icon-01.svg" alt=""></a>
                                    <a href="javascript:;" class=" me-2"><img
                                            src="{{ asset('') }}assets/img/icons/pdf-icon-02.svg" alt=""></a>
                                    <a href="javascript:;" class=" me-2"><img
                                            src="{{ asset('') }}assets/img/icons/pdf-icon-03.svg" alt=""></a>
                                    <a href="javascript:;"><img src="{{ asset('') }}assets/img/icons/pdf-icon-04.svg"
                                            alt=""></a>
                                </div>
                            </div>
                        </div>

                        <div class=" table-responsive">
                            {{-- <h4>Rooms</h4> --}}
                            <table class="table mb-0 border-0 custom-table comman-table datatable">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="form-check check-tables">
                                                <input class="form-check-input" type="checkbox">
                                            </div>
                                        </th>
                                        <th>Patient Name</th>
                                        <th>Admission Reason</th>
                                        <th>Admission Date</th>
                                        <th>Ward</th>
                                        <th>Room</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($admissions as $admission)
                                    <tr>
                                        <td>
                                            <div class="form-check check-tables">
                                                <input class="form-check-input" type="checkbox" value="{{ $admission->id }}">
                                            </div>
                                        </td>
                                        <td>{{ $admission->patient->first_name }} {{ $admission->patient->last_name }}</td> <!-- Patient Name -->
                                        <td>{{ $admission->admission_reason }}</td> <!-- Admission Reason -->
                                        <td>{{ $admission->admission_date }}</td> <!-- Admission Date -->
                                        <td>{{ $admission->ward->name ?? 'Not Assigned' }}</td> <!-- Ward Name -->
                                        <td>{{ $admission->room->room_number ?? 'Not Assigned' }}</td> <!-- Room Number -->
                                        <td>{{ ucfirst($admission->status ?? 'Pending') }}</td> <!-- Status -->
                                        <td class="text-end">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a href="{{ route('dashboard.admissions.edit', $admission->id) }}" class="dropdown-item">
                                                        <i class="fa fa-edit m-r-5"></i> Edit
                                                    </a>
                                                    <form action="{{ route('dashboard.admissions.destroy', $admission->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item text-danger">
                                                            <i class="fa fa-trash-alt m-r-5"></i> Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>



                        </div>


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
                <img src="{{ asset('') }}assets/img/sent.png" alt="" width="50" height="46">
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