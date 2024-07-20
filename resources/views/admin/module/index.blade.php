@extends('admin.layouts.master')
@section('page-title')
Modules
@endsection
@section('main-content')
<div class="app-content">
	<div class="side-app">
		<div class="page-header">
			<h3 class="page-title"><i class="fe fe-home mr-1"></i>Modules</h3>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Modules</li>
			</ol>
		</div>
        @include('admin.layouts.include.message')
        <div class="card">
            <div class="card-body">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    @if(isset(Auth::user()->hasPer('Module')['pcreate']) && Auth::user()->hasPer('Module')['pcreate'] == 1)
                        <a href="#" class="btn btn-success btn-addStudent" data-toggle="modal" data-target="#createModal">Add New Module</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table card-table table-vcenter  border text-nowrap moduleTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Module Name</th>
                                <th>Module Route</th>
                                <th>Parient Module</th>
                                <th>Icon</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($modules as $key => $module)
                                <tr data-id="{{ $module->id }}">
                                   <td>{{ $key+1 }}</td>
                                   <td>{{ $module->name }}</td>
                                   <td>{{ $module->route }}</td>
                                   <td>{{ $module->parent_id }}</td>
                                   <td>{{ $module->icon }}</td>
                                    <td>
                                        @if(isset(Auth::user()->hasPer('Module')['pedit']) && Auth::user()->hasPer('Module')['pedit'] == 1)
                                            <a href="" id="module_edit" class="view ml-2 " role="button" title="Edit"><i class="far fa-edit clr-grey"></i></a>
                                        @endif
                                        @if(isset(Auth::user()->hasPer('Module')['pdelete']) && Auth::user()->hasPer('Module')['pdelete'] == 1)
                                            <a href="#" class="moduleDelete" role="button"  title="Delete" data-id="{{ $module->id }}" data-toggle="modal" data-target="#deleteModal" ><i class="far fa-trash-alt clr-grey"></i></a>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                    <tr><td>Opps! no module added yet.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
	</div>
</div>
<div id="createModal" class="modal fade" data-backdrop="static" data-keyboard="false" >
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="overflow-y: auto; padding:10px;">
            <div class="modal-header pt-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <div class="container popup-tabs model_body">
                <form action="#">
                    <div class="form-group">
                        <label for="module_name">Module Name</label>
                        <input type="text" class="form-control" id="module_name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="module_route">Module Route (put # for empty route)</label>
                        <input type="text" class="form-control" id="module_route" name="route">
                    </div>
                    <div class="form-group">
                        <label for="parent_module">Parent Module</label>
                        <select name="parent_id" id="parent_module" class="form-control">
                            <option selected disabled>Please Select Parent Module</option>
                            @foreach($modules as $value)
                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="module_icon">Module Icon</label>
                        <input type="text" class="form-control" id="module_icon" name="icon">
                    </div>
                    <div class="form-group">
                        <label for="module_sort">Module Sort</label>
                        <input type="number" class="form-control" id="module_sort"min="1" name="sort">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" id="btn-submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- modal-dialog -->
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
$(document).ready(function () {
    $('.moduleTable').dataTable();
    $('#btn-submit').click(function(event) {
        event.preventDefault(); // Prevent the form from submitting the traditional way
        var token = '{{ csrf_token() }}';
        var name = $('#module_name').val();
        var route = $('#module_route').val();
        var parent_id = $('#parent_module').val();
        var icon = $('#module_icon').val();
        var sort = $('#module_sort').val()
    
        $.ajax({
            url: '{{ route("module.store") }}',
            type: 'POST',
            data: {
                _token:token,
                name:name,
                route:route,
                parent_id:parent_id,
                icon:icon,
                sort:sort,
            },
            success: function (response) {
               if(response.success){
                    $('#createModal').modal('hide');
               }
            },
            error: function(response) {
                if (response.status === 422) {
                    let errors = response.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        $('#module_'+key).addClass('is-invalid');
                    });
                }
            }
        });
    });
});
</script>
@endsection
