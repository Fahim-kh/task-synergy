@extends('admin.layouts.master')
@section('page-title')
 Role
 @endsection
 @section('main-content')
 <div class="app-content">
	<div class="side-app">
        <div class="page-header">
        <h3 class="page-title">
            <i class="fe fe-home mr-1"></i>Role list
        </h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
            <a href="#">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Role</li>
        </ol>
        </div>
        @include('admin.layouts.include.message')
        <div class="card">
            <div class="card-header bg-gradient">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <form method="get">
                        <div class="input-group">
                            <select name="roleFilter" id="roleFilter" class="form-control @error('roleFilter') is-invalid state-invalid @enderror">
                                <option value="">Role Filter</option>
                                @foreach($rolesFilter as $role)
                                <option value="{{  $role->name }}">{{  $role->name }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append m-0" >
                                <button class="btn btn-outline-secondary bg-white text-dark" type="submit"><i class="fa fa-filter" aria-hidden="true"></i> Filter</button>
                            </div>
                            @if($errors->has('roleFilter'))
                            <div class="invalid-feedback">{{ $errors->first('roleFilter') }}</div>
                            @endif
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                @if(isset(Auth::user()->hasPer('Role')['pcreate']) && Auth::user()->hasPer('Role')['pcreate'] == 1)
                    <a href="{{ route('role.create') }}" class="btn btn-primary float-right text-white"><i class="fa fa-plus"></i> Add new role</a>
                @endif
                </div>
            </div>
            <div class="card-body">
            <div class="table-responsive ">
                <table id="roleTable" class="table table-bordered">
                    <thead>
                    <tr>
                        <th class="wd-15p border-bottom-0">ID</th>
                        <th class="wd-15p border-bottom-0">Role Name</th>
                        <th class="wd-15p border-bottom-0">ACTION</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                    <tr>
                        <td>{{$role->id}}</td>
                        <td>{{$role->name}}</td>
                        <td>
                            @if(isset(Auth::user()->hasPer('Role')['pedit']) && Auth::user()->hasPer('Role')['pedit'] == 1)
                            <a href="{{ route('role.edit', $role->id) }}" class="btn btn-sm btn-success btn-flat" >
                                <i class="fa fa-edit fa-lg btn-success"></i>
                            </a>
                            @endif
                            @if(isset(Auth::user()->hasPer('Role')['pdelete']) && Auth::user()->hasPer('Role')['pdelete'] == 1 && $role->id != 1 )
                                <a href="#" class="btn btn-sm btn-danger btn-flat roleDelete"  data-id="{{ $role->id }}" data-toggle="modal" data-target="#deleteModal">
                                    <i class="fas fa-trash fa-lg "></i>
                                </a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
            <div class="card-footer">
            <nav aria-label="Page navigation example">
                <ul class="pagination float-right">
                {{ $roles->links() }}
                </ul>
            </nav>
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
                    <button type="submit" id="roleConfirmDelete" class="btn btn-secondary roleDelete">Yes</button>
                    <button class="btn btn-danger" data-dismiss="modal" aria-label="Close">No</button>
                </center>
            </div>
        </div>
    </div><!-- modal-dialog -->
</div>
@endsection

@section('script')

@endsection
