@extends('admin.layouts.master')
@section('page-title')
Edit Employee
@endsection
@section('main-content')
<div class="app-content">
	<div class="side-app">
		<div class="page-header">
			<h3 class="page-title"><i class="fe fe-home mr-1"></i>Edit Employee </h3>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Edit Employee </li>
			</ol>
		</div>
		<div class="card">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ route('user.update',$user->id) }}" id="userCreate" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="col-xl col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="upload-ppic upload-ppic-ext">
                                <center>
                                    <div class="staff-pic" id="image-holder">
                                        @if($user->user_image != null)
                                            <img src="{{ asset('') }}admin/uploads/user_images/{{ $user->user_image }}" alt="{{ $user->user_name }}" class="img-responsive user_img" id="imagePreview">
                                        @else
                                            <img src="{{ asset('') }}admin/assets/no_image.png" alt="no image" class="img-responsive user_img" id="imagePreview">
                                        @endif
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
                                    <input type="text" name="name" id="name" class="form-control name @error('name')  is-invalid state-invalid @enderror"  placeholder="Enter First Name" onkeydown="return alphaOnly(event)" value="{{ $user->name }}">
                                    @if($errors->has('name'))
                                        <div class="invalid-feedback" role="alert">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="email">Email*</label>
                                    <input type="email" name="email" id="email" class="form-control email @error('email') is-invalid state-invalid @enderror"  placeholder="Enter Email Address" value="{{ $user->email }}" readonly>
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
                                            <option value="{{  $role->id }}" {{ ($role->id == $user->role_id)? 'selected' : '' }}>{{  $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="0" {{ ($user->status == 0)? 'selected': '' }}>Deactive</option>
                                        <option value="1" {{ ($user->status == 1)? 'selected': '' }}>Active</option>
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
        var location_id = $('#location_id').val();
        // location_based_branch(location_id);
        $('.role_id').select2({
            placeholder: "Select Role",
            allowClear: false,
        });
       
         // Check role ID when the page loads
        var roleId = $('#role_id').val();
        toggleBranchField(roleId);

        // Event listener for role ID change
        $('.role_id').change(function(e){
            var roleId = $(this).val();
            toggleBranchField(roleId); // Toggle branch field visibility
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
            imagePreview.html('<img src="{{ asset('') }}admin/assets/no-image.png" alt="no image" class="img-responsive profile-img" id="imagePreview">');
        });

        $('.close-btn').on("click", function(e) {
            $("#imgupload").val("");
            imagePreview.empty();
            imagePreview.html('<img src="{{ asset('') }}admin/assets/no-image.png" alt="no image" class="img-responsive profile-img" id="imagePreview">');
        });


    });

</script>
@endsection

