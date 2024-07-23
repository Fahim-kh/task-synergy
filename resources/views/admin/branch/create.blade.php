@extends('admin.layouts.master')
@section('page-title')
Branch
@endsection
@section('main-content')
<div class="app-content">
	<div class="side-app">
		<div class="page-header">
			<h3 class="page-title"><i class="fe fe-home mr-1"></i>Create Branch</h3>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Create Branch</li>
			</ol>
		</div>
        <div class="card col-lg-8 col-md-col-8 col-sm-12 mx-auto">
            <div class="card-body">
                <form action="{{ route('branch.store') }}" method="post" id="branchStore">
                    @csrf
                    <div class="form-group">
                        <label for="location">Location</label>
                        <select name="location" id="location" class="form-control @error('location')  is-invalid state-invalid @enderror location">
                            <option disabled selected>Select Location</option>
                            @foreach ($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->name }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('location'))
                            <div class="invalid-feedback" role="alert">{{ $errors->first('location') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="name">Branch Name</label>
                        <input type="text" class="form-control @error('name')  is-invalid state-invalid @enderror" name="name" id="name">
                        @if($errors->has('name'))
                            <div class="invalid-feedback" role="alert">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="address">Addrss</label>
                        <input type="text" class="form-control @error('address')  is-invalid state-invalid @enderror" name="address" id="address">
                        @if($errors->has('address'))
                            <div class="invalid-feedback" role="alert">{{ $errors->first('address') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control @error('email')  is-invalid state-invalid @enderror" name="email" id="email">
                        @if($errors->has('email'))
                            <div class="invalid-feedback" role="alert">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control @error('phone')  is-invalid state-invalid @enderror" name="phone" id="phone">
                        @if($errors->has('phone'))
                            <div class="invalid-feedback" role="alert">{{ $errors->first('phone') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="phone_optional">Phone Optional</label>
                        <input type="text" class="form-control @error('phone_optional')  is-invalid state-invalid @enderror" name="phone_optional" id="phone_optional">
                        @if($errors->has('phone_optional'))
                            <div class="invalid-feedback" role="alert">{{ $errors->first('phone_optional') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="name">
                            <option value="0">Deactive</option>
                            <option value="1">Active</option>
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
<script>
    $(document).ready(function () {
        $('.location').select2();
    });
</script>
@endsection
