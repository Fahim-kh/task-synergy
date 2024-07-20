@extends('admin.layouts.master')
@section('page-title')
Branches
@endsection
@section('main-content')
<div class="app-content">
	<div class="side-app">
		<div class="page-header">
			<h3 class="page-title"><i class="fe fe-home mr-1"></i>Branches</h3>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Branches</li>
			</ol>
		</div>
        <div class="card">
			<div class="card-body">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    @if(isset(Auth::user()->hasPer('Branches')['pcreate']) && Auth::user()->hasPer('Branches')['pcreate'] == 1)
                        <a href="{{ route('branch.create') }}" class="btn btn-success btn-health-perform">Create New Branche</a>
                    @endif
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6"></div>
            </div>
		</div>
        <div class="card card-table">
            <div class="row" style="padding:20px 0px">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12" style="align-items: center; display: flex;">
                    <strong style="font-weight: 600"></strong>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">

                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-4">
                    <label for="search">Search</label>
                    <form method="get" class="form-inline">
                        <div class="form-group">
                            <input type="search" id="search" class="form-control" name="search" placeholder="Search..." style="width:250px !important">
                        </div>
                        <div class="form-group">
                            <button class="form-control btn-secondary"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                    @if(request()->has('search') == true)
                        <a href="{{ route('branch.index') }}" class="text-danger">Clear Search</a>
                    @endif
                </div>
                <div class="col-lg-4">
                    <label for="location_id">Filter with location</label>
                    <form method="get" class="form-inline">
                        <div class="form-group"  style="width:250px !important">
                            <select name="location" id="location_id" class="form-control location_id">
                                @foreach ($locations as $location)
                                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="form-control btn-secondary"><i class="fa fa-filter"></i></button>
                        </div>
                    </form>
                    @if(request()->has('location') == true)
                        <a href="{{ route('branch.index') }}" class="text-danger">Clear Search</a>
                    @endif
                </div>
            </div>
            <div class="table-responsive">
                <table class="table card-table table-vcenter  border text-nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Location</th>
                            <th>Branch Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                           $serialNumber = ($branches->currentPage() - 1) * $branches->perPage() + 1;
                        @endphp
                        @forelse($branches as $branch)
                            <tr>
                                <td>{{ $serialNumber }}</td>
                                <td>{{ $branch->location->name }}</td>
                                <td>{{ $branch->name }} </td>
                                <td>
                                    @if($branch->status == 1)
                                    <button id="branch_status" class="tbl-enable-btn branch_status" text="Enabled" title="Click to change status" type="text" data-id="{{ $branch->id }}"><i class="fas fa-random mr-1"></i>Enabled</button>
                                @else
                                    <button id="branch_status" class="tbl-diable-btn branch_status" text="Enabled" title="Click to change status" type="text" data-id="{{ $branch->id }}"><i class="fas fa-random mr-1"></i>Disabled</button>
                                @endif
                                </td>
                                <td>
                                    @if(isset(Auth::user()->hasPer('Branches')['pedit']) && Auth::user()->hasPer('Branches')['pedit'] == 1)
                                        <a href="{{ route('branch.edit',$branch->id) }}" id="student_edit" class="view ml-2 " role="button" title="Edit"><i class="far fa-edit clr-grey"></i></a>
                                    @endif
                                    {{-- @if(isset(Auth::user()->hasPer('Branches')['pdelete']) && Auth::user()->hasPer('Branches')['pdelete'] == 1)
                                        <a href="#" class="branchDelete" role="button"  title="Delete" data-id="{{ $branch->id }}" data-toggle="modal" data-target="#deleteModal" ><i class="far fa-trash-alt clr-grey"></i></a>
                                    @endif --}}
                                </td>
                            </tr>
                        @php
                            $serialNumber++; // Increment the serial number for the next row
                        @endphp
                        @empty
                        <tr>
                            <td>Opps! no record found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                {{ $branches->links() }}
            </div>
        </div>
	</div>
</div>
<style>
    .btn-health-perform{
        background: #1c5c69;
        border-radius: 100px;
        padding: 3px 12px;
        border: none;
        color: white;
        font-size: 13px;
        font-weight: 200;
        text-align: center;
    }
</style>
@endsection
@section('script')
<script>
    $(document).ready(function () {
        $('.location_id').select2();
    });
</script>
@endsection
