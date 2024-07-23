@extends('admin.layouts.master')
@section('page-title')
    Department
@endsection
@section('main-content')
    <div class="app-content">
        <div class="side-app">
            <div class="page-header">
                <h3 class="page-title"><i class="fe fe-home mr-1"></i>Department</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Department</li>
                </ol>
            </div>
            @include('admin.layouts.include.message')
            <div class="card">
                <div class="card-body">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        @if (isset(Auth::user()->hasPer('Department')['pcreate']) && Auth::user()->hasPer('Department')['pcreate'] == 1)
                            <a href="{{ route('department.create') }}" class="btn btn-success btn-addStudent ">Add New
                                Department</a>
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
                                    <th>Department Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($departments as $key => $department)
                                    <tr data-id="{{ $department->id }}">
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $department->name }}</td>
                                        <td>
                                            @if (isset(Auth::user()->hasPer('Department')['pedit']) && Auth::user()->hasPer('Department')['pedit'] == 1)
                                                <a href="{{ route('department.edit', $department->id) }}"
                                                    id="department_edit" class="view ml-2" role="button" title="Edit"><i
                                                        class="far fa-edit clr-grey"></i></a>
                                            @endif
                                            @if (isset(Auth::user()->hasPer('Department')['pdelete']) && Auth::user()->hasPer('Department')['pdelete'] == 1)
                                                <button class="departmentDelete" role="button" title="Delete"
                                                    data-id="{{ $department->id }}"><i
                                                        class="far fa-trash-alt clr-grey"></i></button>

                                                <form id="delete-form-{{ $department->id }}"
                                                    action="{{ route('department.destroy', $department->id) }}"
                                                    method="post" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            @endif
                                    </tr>
                                    </td>
                                @empty
                                    <tr>
                                        <td>Opps! no department added yet.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    $(document).ready(function () {
        $('.departmentDelete').click(function(e) {
            e.preventDefault(); 
    
            var id = $(this).data('id');
            if (confirm('Are you sure you want to delete this department?')) {
                $('#delete-form-' + id).submit();
            }
        });
    });
    </script>
    
@endsection
