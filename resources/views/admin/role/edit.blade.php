@extends('admin.layouts.master')
@section('page-title')
   Edit Role
@endsection

@section('main-content')
<div class="app-content">
	<div class="side-app">
        <div class="page-header">
        <h4 class="page-title"><i class="fe fe-grid mr-1"></i>Edit Role</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"> Role</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Role</li>
        </ol>
        </div>
        <div class="card">
                <div class="card-body">
                    <form action="{{ route('role.update', $role->id) }}" method="POST" >
                    @csrf
                    @method('PUT')
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $role->name }}" required="required">
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

                                                @php

                                                $key = array_search($module->id, array_column($role->permission, 'module_id'));
                                                $checked = false;
                                                if($key > -1)
                                                {
                                                    if($role->permission[$key]['pview'] == 1){
                                                        $checked = true;
                                                    }
                                                }
                                                @endphp
                                                <input type="checkbox" name="view[{{$module->id}}]" value="{{ ($checked) ? 1 : 0}}" {{ ($checked) ? 'checked' : ''}} class="custom-switch-input" id="checkbox">
                                                <span class="custom-switch-indicator"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="custom-switch pl-0">
                                                @php
                                                $key = array_search($module->id, array_column($role->permission, 'module_id'));
                                                $checked = false;
                                                if($key > -1)
                                                {
                                                    if($role->permission[$key]['pcreate'] == 1){
                                                        $checked = true;
                                                    }
                                                }
                                                @endphp
                                                <input type="checkbox" name="create[{{$module->id}}]" value="{{ ($checked) ? 1 : 0}}" {{ ($checked) ? 'checked' : ''}} class="custom-switch-input">
                                                <span class="custom-switch-indicator"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="custom-switch pl-0">
                                                @php
                                                $key = array_search($module->id, array_column($role->permission, 'module_id'));
                                                $checked = false;
                                                if($key > -1)
                                                {
                                                    if($role->permission[$key]['pedit'] == 1){
                                                        $checked = true;
                                                    }
                                                }
                                                @endphp
                                                <input type="checkbox" name="edit[{{$module->id}}]" value="{{ ($checked) ? 1 : 0}}" {{ ($checked) ? 'checked' : ''}} class="custom-switch-input">
                                                <span class="custom-switch-indicator"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="custom-switch pl-0">
                                            @php
                                                $key = array_search($module->id, array_column($role->permission, 'module_id'));
                                                $checked = false;
                                                if($key > -1)
                                                {
                                                    if($role->permission[$key]['pdelete'] == 1){
                                                        $checked = true;
                                                    }
                                                }
                                                @endphp
                                                <input type="checkbox" name="delete[{{$module->id}}]" value="{{ ($checked) ? 1 : 0}}" {{ ($checked) ? 'checked' : ''}} class="custom-switch-input">
                                                <span class="custom-switch-indicator"></span>
                                            </label>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                            <div class="mt-2 mb-0">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>

@endsection
