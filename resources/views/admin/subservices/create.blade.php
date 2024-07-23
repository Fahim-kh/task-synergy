@extends('admin.layouts.master')
@section('page-title')
    Create Sub Services
@endsection

@section('main-content')
    <div class=" app-content">
        <div class="side-app">
            <div class="page-header">
                <h4 class="page-title"><i class="fe fe-grid mr-1"></i> Create Sub Services</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"> Services</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Sub Services</li>
                </ol>
            </div>
            <form method="post"  action="{{ route('subservices.store') }}" class="w-100" id="formCreate" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Service</label>
                                    <select name="service_id" id="service_id" class="form-control  @error('service_id') is-invalid state-invalid @enderror">
                                        <option selected disabled>Select Service</option>
                                        @foreach ($services as $service)
                                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('service_id'))
                                        <div class="invalid-feedback" role="alert">{{ $errors->first('service_id') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="name">Title</label>
                                    <input type="text" class="form-control @error('name') is-invalid state-invalid @enderror" name="name">
                                    @if($errors->has('name'))
                                        <div class="invalid-feedback" role="alert">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <textarea class="form-control content @error('content') is-invalid state-invalid @enderror" name="content"></textarea>
                                    @if($errors->has('content'))
                                        <div class="invalid-feedback" role="alert">{{ $errors->first('content') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="0">DEACTIVE</option>
                                        <option value="1">ACTIVE</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="banner_image">Banner Image</label>
                                    <input type="file" class="form-control" name="banner_image" id="banner_image" accept=".png,.jpeg,.jpg,.webp" />
                                </div>
                                <div class="form-group">
                                    <label for="side_image">Side Image</label>
                                    <input type="file" class="form-control" name="side_image" id="side_image" accept=".png,.jpeg,.jpg,.webp" />
                                </div>
                                <div class="form-group">
                                    <button class="form-control btn btn-success bg-success" type="submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('.content').summernote({
            height: 300, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: true, // set focus to editable area after initializing Summernote
        });
    });
</script>
@endsection
