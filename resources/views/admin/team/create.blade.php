@extends('admin.layouts.master')
@section('page-title')
    Create Team
@endsection

@section('main-content')
    <div class=" app-content">
        <div class="side-app">

            <!--Page Header-->
            <div class="page-header">
                <h4 class="page-title"><i class="fe fe-grid mr-1"></i>Create Team</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Team</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Team</li>
                </ol>
            </div>
            <!--page header-->

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" role="form" class="form-horizontal" id="formCreate"
                                enctype="multipart/form-data" action="{{ route('team.store') }}">
                                @csrf
                                <div class="form-group row  @error('name') has-error @enderror">
                                    <label for="name" class="col-md-3 col-form-label">Enter Name</label>
                                    <div class="col-md-9">
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="Enter Full Name">
                                        @error('name')
                                            <div class="label label-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-group row @error('designation') has-error @enderror">
                                    <label for="designation" class="col-md-3 col-form-label">designation</label>
                                    <div class="col-md-9">
                                        <input type="text" name="designation" class="form-control" id="designation"
                                            placeholder="Enter Designation">
                                        @error('designation')
                                            <div class="label label-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="upload Image" class="col-md-3 col-form-label">Upload Image</label>
                                    <div class="col-md-9">
                                        <input type="file" class="custom-file-input" id="fileUpload" name="team_img">
                                        <label class="custom-file-label " style="left: 7px;">Choose file</label>
                                        <div id="image-holder" style="width:150px; margin-top:5px; border-radius:1%;"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="bio" class="col-md-3 col-form-label">Bio</label>
                                    <div class="col-md-9">
                                        <textarea class="ckeditor form-control" name="wysiwyg-editor"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="status" class="col-md-3 col-form-label">Status</label>
                                    <div class="col-md-9">
                                        <select name="status" id="status" class="form-control select2 ">
                                            <option value="0">DEACTIVE</option>
                                            <option value="1">ACTIVE</option>
                                        </select>
                                        @error('status')
                                            <div class="label label-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-0 mt-2 row justify-content-end">
                                    <div class="col-md-9">
                                        <button type="submit" id="submit" class="btn btn-info">Save</button>
                                        <a href="{{ route('team.index') }}" class="btn btn-danger">Cancel</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- table-wrapper -->
                    </div>
                    <!-- section-wrapper -->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $("#fileUpload").on('change', function() {
                //Get count of selected files
                var countFiles = $(this)[0].files.length;
                var imgPath = $(this)[0].value;
                var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
                var image_holder = $("#image-holder");
                image_holder.empty();
                if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
                    if (typeof(FileReader) != "undefined") {
                        //loop for each file selected for uploaded.
                        for (var i = 0; i < countFiles; i++) {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                $("<img />", {
                                    "src": e.target.result,
                                    "class": "thumb-image"
                                }).appendTo(image_holder).css('border:1px groove #efefef');
                            }
                            image_holder.show();
                            reader.readAsDataURL($(this)[0].files[i]);
                        }
                    } else {
                        alert("This browser does not support FileReader.");
                    }
                } else {
                    alert("Pls select only images");
                }
            });
        });
    </script>
@endsection
