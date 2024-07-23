@extends('admin.layouts.master')
@section('page-title')
Employee List
@endsection
@section('main-content')
<div class="app-content">
	<div class="side-app">
		<div class="page-header">
			<h3 class="page-title"><i class="fe fe-home mr-1"></i>Employee List</h3>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Employee List</li>
			</ol>
		</div>
        @include('admin.layouts.include.message')
        @if(Session::has('records'))
            @php
                $data = Session::get('records');
            @endphp
            @foreach($data['existingRecords'] as $existingRecord)
                <span class="badge badge-pill badge-danger mt-2 p-2">{{ $existingRecord->reference_code }}</span>
            @endforeach
            <br>
            <div class="bg-danger text-white flash-message p-3 mt-2" role="alert">{{ $data['message'] }}</div>
        @endif
		<div class="card">
			<div class="card-body">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        @if(isset(Auth::user()->hasPer('Users')['pcreate']) && Auth::user()->hasPer('Users')['pcreate'] == 1)
                        <a href="{{ route('user.create') }}" class="btn btn-success btn-addStudent">Add New Employee</a>
                        @endif
                    </div>
                </div>
            </div>
		</div>
        <div class="card card-table">
            <div class="row" style="padding:20px 0px">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12" style="align-items: center; display: flex;">
                    <strong style="font-weight: 600">Employees List</strong>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <form method="get">
                        <div class="input-group">
                            <input type="search" name="search" class="form-control" placeholder="Search.." aria-label="Search" aria-describedby="button-search">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit" id="button-search">Search</button>
                            </div>
                        </div>
                    </form>
                    @if(request()->has('search') == true)
                        <a href="{{ route('user.index') }}" class="text-danger">Clear Search</a>
                    @endif
                </div>
            </div>
            <div class="table-responsive">
                <table class="table card-table table-vcenter  border text-nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Full Name</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                           $serialNumber = ($users->currentPage() - 1) * $users->perPage() + 1;
                        @endphp
                        @forelse($users as $user)
                            <tr data-id="{{ $user->id }}">
                                <td>{{ $serialNumber }}</td>
                                <td>@if($user->user_image !='')<img src="{{ asset('admin/uploads/user_images') }}/{{ $user->user_image }}" alt="{{ $user->reference_code }}" width="80"> @else <img src="{{ asset('admin/assets') }}/no_image.png" alt="{{ $user->reference_code }}" width="80"> @endif</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->role->name }} </td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if($user->status == 1)
                                        <button id="user_status" class="tbl-enable-btn user_status" text="Enabled" title="Click to change status" type="text" data-id="{{ $user->id }}"><i class="fas fa-random mr-1"></i>Enabled</button>
                                    @else
                                        <button id="user_status" class="tbl-diable-btn user_status" text="Enabled" title="Click to change status" type="text" data-id="{{ $user->id }}"><i class="fas fa-random mr-1"></i>Disabled</button>
                                    @endif
                                </td>
                                <td>
                                    {{-- @if(isset(Auth::user()->hasPer('Users')['pedit']) && Auth::user()->hasPer('Users')['pedit'] == 1)
                                        <a id="user_reset" class="user_reset mr-2 " role="button" title="Reset Password"  data-id="{{ $user->id }}"><i class="fa fa-lock clr-grey"></i></a>
                                    @endif --}}
                                    @if(isset(Auth::user()->hasPer('Users')['pedit']) && Auth::user()->hasPer('Users')['pedit'] == 1)
                                        <a href="{{ route('user.edit',$user->id) }}" id="student_edit" class="view ml-2 " role="button" title="Edit"><i class="far fa-edit clr-grey"></i></a>
                                    @endif
                                    @if(isset(Auth::user()->hasPer('Users')['pdelete']) && Auth::user()->hasPer('Users')['pdelete'] == 1)
                                        <a href="#" class="userDelete" role="button"  title="Delete" data-id="{{ $user->id }}" data-toggle="modal" data-target="#deleteModal" ><i class="far fa-trash-alt clr-grey"></i></a>
                                    @endif
                                </td>
                            </tr>
                            @php
                                $serialNumber++; // Increment the serial number for the next row
                            @endphp
                            @empty
                            <tr><td>Opps! No emplyee added yet.</td></tr>

                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
	</div>
</div>
{{-- <div id="resetPassword" class="modal fade" data-backdrop="static" data-keyboard="false" >
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content" style="overflow-y: auto; padding:10px;">
            <div class="container popup-tabs model_body">
                <center>
                    <i class="fa fa-lock" aria-hidden="true" style="font-size: 60px; padding:10px"></i>
                    <p style="font-size: 20px;">Are you sure you want to send OTP?<br></p>
                    <button type="submit" id="sendOTP" class="btn btn-secondary">Yes <img src="{{ asset('') }}/admin/loader.gif" width="20px" id="loader_otp" class="d-none"></button>
                    <button class="btn btn-danger" data-dismiss="modal" id="otp_btn_no" aria-label="Close">No</button>
                </center>
            </div>
        </div>
    </div><!-- modal-dialog -->
</div> --}}
<div id="deleteModal" class="modal fade" data-backdrop="static" data-keyboard="false" >
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content" style="overflow-y: auto; padding:10px;">
            <div class="container popup-tabs model_body">
                <center>
                    <p>Are you sure you want to delete this?<br></p>
                    <button type="submit" id="confirmDelete" class="btn btn-secondary userDelete">Yes</button>
                    <button class="btn btn-danger" data-dismiss="modal" aria-label="Close">No</button>
                </center>
            </div>
        </div>
    </div><!-- modal-dialog -->
</div>
<style>
    .btn-addStudent{
        background: #1c5c69;
        border-radius: 100px;
        padding: 3px 12px;
        border: none;
        color: white;
        font-size: 13px;
        font-weight: 200;
        text-align: center;
    }
    .userDelete{
        margin-left:4px;
    }

</style>
@endsection
@section('script')
<script>

</script>
@endsection
