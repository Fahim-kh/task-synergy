@extends('admin.layouts.master')
@section('page-title')
Branch
@endsection
@section('main-content')
<div class="app-content">
	<div class="side-app">
		<div class="page-header">
			<h3 class="page-title"><i class="fe fe-home mr-1"></i>Edit Branch</h3>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Edit Branch</li>
			</ol>
		</div>
        <div class="card col-lg-8 col-md-col-8 col-sm-12 mx-auto">
            <div class="card-body">
                <form action="{{ route('branch.update',$branch->id) }}" method="post" id="branchStore">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="location">Location</label>
                        <select name="location" id="location" class="form-control @error('location')  is-invalid state-invalid @enderror location">
                            <option disabled selected>Select Location</option>
                            @foreach ($locations as $location)
                                <option value="{{ $location->id }}" {{ ($location->id == $branch->location_id)? 'selected' : '' }}>{{ $location->name }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('location'))
                            <div class="invalid-feedback" role="alert">{{ $errors->first('location') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="name">Branch Name</label>
                        <input type="text" class="form-control @error('name')  is-invalid state-invalid @enderror" name="name" id="name" value="{{ $branch->name }}">
                        @if($errors->has('name'))
                            <div class="invalid-feedback" role="alert">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="address">Addrss</label>
                        <input type="text" class="form-control @error('address')  is-invalid state-invalid @enderror" name="address" id="address" value="{{ $branch->address }}">
                        @if($errors->has('address'))
                            <div class="invalid-feedback" role="alert">{{ $errors->first('address') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control @error('email')  is-invalid state-invalid @enderror" name="email" id="email" value="{{ $branch->email }}">
                        @if($errors->has('email'))
                            <div class="invalid-feedback" role="alert">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control @error('phone')  is-invalid state-invalid @enderror" name="phone" id="phone" value="{{ $branch->phone }}">
                        @if($errors->has('phone'))
                            <div class="invalid-feedback" role="alert">{{ $errors->first('phone') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="phone_optional">Phone Optional</label>
                        <input type="text" class="form-control @error('phone_optional')  is-invalid state-invalid @enderror" name="phone_optional" id="phone_optional" value="{{ $branch->phone_optional }}">
                        @if($errors->has('phone_optional'))
                            <div class="invalid-feedback" role="alert">{{ $errors->first('phone_optional') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="name">
                            <option value="0" {{ ($branch->status== 0)? 'selected' : '' }}>Deactive</option>
                            <option value="1" {{ ($branch->status== 1)? 'selected' : '' }}>Active</option>
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
