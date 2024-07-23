@extends('admin.layouts.master')
@section('page-title')
Add Employee
@endsection
@section('main-content')
<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h3 class="page-title"><i class="fe fe-home mr-1"></i>Add Employee </h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Employee </li>
            </ol>
        </div>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ route('user.store') }}" id="staffCreate" enctype="multipart/form-data">
                        @csrf
                        <div class="col-xl col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="upload-ppic upload-ppic-ext">
                                <center>
                                    <div class="staff-pic" id="image-holder">
                                        <img src="{{ asset('') }}admin/assets/no_image.png" alt="no image" class="img-responsive staff-img" id="imagePreview">
                                    </div>
                                    <div class="upload-btn-wrapper">
                                        <input type="file" name="user_image" id="imgupload" style="display:none" accept="image/*"/>
                                        <button id="OpenImgUpload" class="btn btn-outline-secondary upload-btn">Image Upload</button>
                                    </div>
                                </center>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="name">Full Name*</label>
                                    <input type="text" name="name" id="name" class="form-control name @error('name')  is-invalid state-invalid @enderror" placeholder="Enter Last Name" onkeydown="return alphaOnly(event)">
                                    @if($errors->has('name'))
                                        <div class="invalid-feedback" role="alert">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="email">Email*</label>
                                    <input type="email" name="email" id="email" class="form-control email @error('email') is-invalid state-invalid @enderror"  placeholder="Enter Email Address">
                                    @if($errors->has('email'))
                                        <div class="invalid-feedback" role="alert">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="role_id">Role</label>
                                    <select name="role_id" id="role_id" class="form-control role_id @error('role_id')  is-invalid state-invalid @enderror">
                                        <option disabled selected>Please Select Role</option>
                                        @foreach($roles as $role)
                                            <option value="{{  $role->id }}">{{  $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control @error('password')  is-invalid state-invalid @enderror" placeholder="Enter password">
                                    @if($errors->has('password'))
                                        <div class="invalid-feedback" role="alert">{{ $errors->first('password') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="retype_password">Retype Password</label>
                                    <input type="password" name="retype_password" id="retype_password" class="form-control @error('retype_password')  is-invalid state-invalid @enderror" placeholder="Enter retype password">
                                    @if($errors->has('retype_password'))
                                        <div class="invalid-feedback" role="alert">{{ $errors->first('retype_password') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="0">Deactive</option>
                                        <option value="1">Active</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="stff-tming-buttns">
                            <button id="addstafftiming_save" class="save-btn msg-send-btn">Save</button>
                            <a href="{{ route('user.index') }}" class="btn btn-danger close-btn" type="button">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Toast message -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <p id="modalMessage"></p>
        </div>
      </div>
    </div>
  </div>
<style>
    .upload-btn {
        margin-top:20px;
        border: 1.5px solid gray;
        color: gray;
        background-color: white;
        padding: 3px 13px;
        border-radius: 8px;
        font-size: 15px;
        cursor: pointer !important;
    }
    .upload-btn:hover{
        border: 1.5px solid #1c5c69;
        color: #1c5c69;
        background:transparent;
    }

    .stff-tming-buttns {
        padding: 10px;
        text-align: right;
        background: #0000001c;
        border-bottom-right-radius: 8px;
        border-bottom-left-radius: 8px;
    }
    .save-btn {
        width: 100px;
        padding: 8px 13px;
        text-align: center;
        color: white;
        background: #0F0A32 !important;
        border: none;
        font-size: 14px;
        border-radius: 100px;
        box-shadow: 0px 32px 23px -24px rgba(10, 177, 167, 0.55) !important;
    }

    .bg_file{
        background: #eeee;
        padding: 10px;
    }
    .btn-info{
        background:#0F0A32 !important;
    }
    .addRow{
        background: #0F0A32 !important;
    }
</style>
@endsection
@section('script')
<script type="text/javascript" src="{{ asset('') }}admin/assets/js/image-uploader.min.js"></script>
<script>
    $(document).ready(function() {
        $('.role_id').select2({
            placeholder: "Select Role",
            allowClear: false,
        });
        const fileInput = $("#imgupload");
        const imagePreview = $("#image-holder");
        $("#OpenImgUpload").on("click", function(e) {
            e.preventDefault();
            fileInput.click();
        });

        fileInput.on("change", function() {
            const file = fileInput[0].files[0];
            if (file) {
            const reader = new FileReader();
            reader.onload = function() {
                imagePreview.html(`<img src="${reader.result}" alt="Selected Image"/>`);
            };
            reader.readAsDataURL(file);
            }
        });
        $('.close').on("click", function(e) {
            $("#imgupload").val("");
            imagePreview.empty();
            imagePreview.html('<img src="{{ asset('') }}admin/assets/no_image.png" alt="no image" class="img-responsive profile-img" id="imagePreview">');
        });
        $('.close-btn').on("click", function(e) {
            $("#imgupload").val("");
            imagePreview.empty();
            imagePreview.html('<img src="{{ asset('') }}admin/assets/no_image.png" alt="no image" class="img-responsive profile-img" id="imagePreview">');
        });
        $('.role_id').change(function(e){
            var role_id = $(this).val();
            if(role_id == '7'){ // role_id 7 means branch manager
                $('.branch').removeClass('d-none');
            } else{
                $('.branch').addClass('d-none');

            }
        });
    });
</script>
@endsection
