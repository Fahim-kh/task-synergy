@extends('admin.layouts.master')
@section('page-title')
Locations
@endsection
@section('main-content')
<div class="app-content">
	<div class="side-app">
		<div class="page-header">
			<h3 class="page-title"><i class="fe fe-home mr-1"></i>Locations Edit</h3>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Locations Edit</li>
			</ol>
		</div>
        <div class="card col-lg-8 col-md-col-8 col-sm-12 mx-auto">
            <div class="card-body">
                <form action="{{ route('location.update',$location->id) }}" method="post" id="locationStore">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="name">Location Name</label>
                        <input type="text" class="form-control @error('name')  is-invalid state-invalid @enderror" name="name" id="name" value="{{ $location->name }}">
                        @if($errors->has('name'))
                            <div class="invalid-feedback" role="alert">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="name">
                            <option value="0" {{ ($location->status == 0)? 'selected' : '' }}>Deactive</option>
                            <option value="1" {{ ($location->status == 1)? 'selected' : '' }}>Active</option>
                        </select>
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
