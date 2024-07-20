@extends('admin.layouts.master')
@section('page-title')
Locations
@endsection
@section('main-content')
<div class="app-content">
	<div class="side-app">
		<div class="page-header">
			<h3 class="page-title"><i class="fe fe-home mr-1"></i>Locations</h3>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Locations</li>
			</ol>
		</div>
        @include('admin.layouts.include.message')
        <div class="card">
            <div class="card-body">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    @if(isset(Auth::user()->hasPer('Locations')['pcreate']) && Auth::user()->hasPer('Locations')['pcreate'] == 1)
                    <a href="{{ route('location.create') }}" class="btn btn-success btn-addStudent ">Add New Location</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table card-table table-vcenter  border text-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Location Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                 $serialNumber = ($locations->currentPage() - 1) * $locations->perPage() + 1;
                            @endphp
                            @forelse($locations as $location)
                                <tr data-id="{{ $location->id }}">
                                    <td>{{ $serialNumber }}</td>
                                    <td>{{ $location->name }}</td>
                                    <td>
                                        @if($location->status == 1)
                                            <button id="location_status" class="tbl-enable-btn location_status" text="Enabled" title="Click to change status" type="text" data-id="{{ $location->id }}"><i class="fas fa-random mr-1"></i>Enabled</button>
                                        @else
                                            <button id="location_status" class="tbl-diable-btn location_status" text="Enabled" title="Click to change status" type="text" data-id="{{ $location->id }}"><i class="fas fa-random mr-1"></i>Disabled</button>
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset(Auth::user()->hasPer('Locations')['pedit']) && Auth::user()->hasPer('Locations')['pedit'] == 1)
                                            <a href="{{ route('location.edit',$location->id) }}" id="location_edit" class="view ml-2 " role="button" title="Edit"><i class="far fa-edit clr-grey"></i></a>
                                        @endif
                                        @if(isset(Auth::user()->hasPer('Locations')['pdelete']) && Auth::user()->hasPer('Locations')['pdelete'] == 1)
                                            <a href="#" class="locationDelete" role="button"  title="Delete" data-id="{{ $location->id }}" data-toggle="modal" data-target="#deleteModal" ><i class="far fa-trash-alt clr-grey"></i></a>
                                        @endif
                                    </td>
                                </tr>
                                @php
                                    $serialNumber++; // Increment the serial number for the next row
                                @endphp
                                @empty
                                    <tr><td>Opps! no location added yet.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $locations->links() }}
            </div>
        </div>
	</div>
</div>
<div id="deleteModal" class="modal fade" data-backdrop="static" data-keyboard="false" >
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content" style="overflow-y: auto; padding:10px;">
            <div class="container popup-tabs model_body">
                <center>
                    <p>Are you sure you want to delete this?<br></p>
                    <button type="submit" id="confirmDeleteLocation" class="btn btn-secondary locationDelete">Yes</button>
                    <button class="btn btn-danger" data-dismiss="modal" aria-label="Close">No</button>
                </center>
            </div>
        </div>
    </div><!-- modal-dialog -->
</div>
@endsection
@section('script')
<script>

</script>
@endsection
