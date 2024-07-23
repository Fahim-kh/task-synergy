@extends('admin.layouts.master')
@section('page-title')
Department Edit
@endsection
@section('main-content')
<div class="app-content">
	<div class="side-app">
		<div class="page-header">
			<h3 class="page-title"><i class="fe fe-home mr-1"></i>Department Edit</h3>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Department Edit</li>
			</ol>
		</div>
        <div class="card col-lg-8 col-md-col-8 col-sm-12 mx-auto">
            <div class="card-body">
                <form action="{{ route('department.update',$department->id) }}" method="post" id="locationStore">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="name">Department Name</label>
                        <input type="text" class="form-control @error('name')  is-invalid state-invalid @enderror" value="{{ $department->name }}" name="name" id="name">
                        @if($errors->has('name'))
                            <div class="invalid-feedback" role="alert">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control @error('description')  is-invalid state-invalid @enderror" name="description" id="description">{{ $department->description }}</textarea>
                        @if($errors->has('description'))
                            <div class="invalid-feedback" role="alert">{{ $errors->first('description') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

@endsection
