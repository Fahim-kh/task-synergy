@extends('admin.layouts.master')
@section('page-title')
Pages List
@endsection
@section('main-content')
<div class="app-content">
	<div class="side-app">
		<div class="page-header">
			<h3 class="page-title"><i class="fe fe-home mr-1"></i>Pages List</h3>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Pages List</li>
			</ol>
		</div>
        @include('admin.layouts.include.message')
        <div class="card">
            <div class="card-body">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    @if(isset(Auth::user()->hasPer('Pages List')['pcreate']) && Auth::user()->hasPer('Pages List')['pcreate'] == 1)
                    <a href="{{ route('page.create') }}" class="btn btn-success btn-addStudent ">Add New Page</a>
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
                                <th>Page Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pages as $key => $page)
                                <tr data-id="{{ $page->id }}">
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $page->name }}</td>
                                    <td>
                                        @if($page->status == 1)
                                            <button id="page_status" class="tbl-enable-btn page_status" text="Enabled" title="Click to change status" type="text" data-id="{{ $page->id }}"><i class="fas fa-random mr-1"></i>Enabled</button>
                                        @else
                                            <button id="page_status" class="tbl-diable-btn page_status" text="Enabled" title="Click to change status" type="text" data-id="{{ $page->id }}"><i class="fas fa-random mr-1"></i>Disabled</button>
                                        @endif
                                    </td>
                                    <td>
                                    <form method="post" action="{{ route('page.destroy', $page->id) }}">
                                        @csrf
                                        @method('delete')
                                        @if(isset(Auth::user()->hasPer('Pages List')['pedit']) && Auth::user()->hasPer('Pages List')['pedit'] == 1)
                                            <a href="{{ route('page.edit',$page->id) }}" id="page_edit" class="view ml-2 " role="button" title="Edit"><i class="far fa-edit clr-grey"></i></a>
                                        @endif

                                        @if (isset(Auth::user()->hasPer('Pages List')['pdelete']) && Auth::user()->hasPer('Pages List')['pdelete'] == 1)
                                            <button class="pageDelete" role="button"  title="Delete" data-id="{{ $page->id }}"><i class="far fa-trash-alt clr-grey"></i></button>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                    <tr><td>Opps! no page added yet.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
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
                    <button type="submit" id="confirmDeletepage" class="btn btn-secondary pageDelete">Yes</button>
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
