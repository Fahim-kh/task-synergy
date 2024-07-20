@extends('admin.layouts.master')
@section('page-title')
Create Page
@endsection
@section('main-content')
<div class="app-content">
	<div class="side-app">
		<div class="page-header">
			<h3 class="page-title"><i class="fe fe-home mr-1"></i>Create Page</h3>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Create Page</li>
			</ol>
		</div>
        <div class="card col-lg-12 col-md-col-12 col-sm-12 mx-auto">
            <div class="card-body">
                <form action="{{ route('page.store') }}" method="post" id="pageStore">
                    @csrf
                    <div class="form-group">
                        <label for="name">Page Name</label>
                        <input type="text" class="form-control @error('name')  is-invalid state-invalid @enderror" name="name" id="name">
                        @if($errors->has('name'))
                            <div class="invalid-feedback" role="alert">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <div id="summernote"></div>
                    </div>
                    <div class="form-group">
                        <label for="content">Page Content</label>
                        <textarea class="form-control page_content @error('content')  is-invalid state-invalid @enderror" name="content" id="content"></textarea>
                        @if($errors->has('content'))
                            <div class="invalid-feedback" role="alert">{{ $errors->first('content') }}</div>
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
                <div class="container mt-4">
                    <h2>Preview</h2>
                    <div id="previewContent"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('.page_content').summernote({
            height: 300, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: true, // set focus to editable area after initializing Summernote
        });
    });
</script>
@endsection
