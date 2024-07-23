@extends('admin.layouts.master')
@section('page-title')
   Create Role
@endsection

@section('main-content')
<div class="app-content">
	<div class="side-app">
        <div class="page-header">
        <h4 class="page-title"><i class="fe fe-grid mr-1"></i>Create Role</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"> Role</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create Role</li>
        </ol>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{route('role.store')}}" method="post" >
                    @csrf
                    <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control  @error('name') is-invalid state-invalid @enderror" name="name" placeholder="Enter Role Name">
                                    @error('name')
                                    <div class="invalid-feedback" role="alert">{{ $errors->first('name') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive ">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p border-bottom-0">Name</th>
                                            <th class="wd-15p border-bottom-0">View</th>
                                            <th class="wd-15p border-bottom-0">Create</th>
                                            <th class="wd-15p border-bottom-0">Edit</th>
                                            <th class="wd-15p border-bottom-0">Delete</th>
                                        </tr>
                                    </thead>
                                    @foreach($modules as $module)
                                    <input type="hidden" name="moduleid[{{$module->id}}]" value="{{$module->id}}">
                                    <tbody class="rolemodules">
                                        <tr>
                                            <td>{{$module->name}}</td>
                                            <td>
                                                <label class="custom-switch pl-0">
                                                    <input type="checkbox" name="view[{{$module->id}}]" class="custom-switch-input" id="checkbox">
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <label class="custom-switch pl-0">
                                                    <input type="checkbox" name="create[{{$module->id}}]" class="custom-switch-input">
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <label class="custom-switch pl-0">
                                                    <input type="checkbox" name="edit[{{$module->id}}]" class="custom-switch-input">
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <label class="custom-switch pl-0">
                                                    <input type="checkbox" name="delete[{{$module->id}}]" class="custom-switch-input">
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                            <div class="mt-2 mb-0">
                                <button style="color: #fff;margin-left: 7px;" class="btn btn-info" type="submit" class="">Save</button>
                                <a  href="{{ route('role.index') }}" style="color: #fff;margin-left: 7px;" class="btn btn-danger" type="submit" >Cancel</a>
                            </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
$("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });
     </script>
  @endsection

