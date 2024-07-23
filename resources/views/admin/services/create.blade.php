@extends('admin.layouts.master')
@section('page-title')
    Create Services
@endsection

@section('main-content')
    <div class=" app-content">
        <div class="side-app">
            <div class="page-header">
                <h4 class="page-title"><i class="fe fe-grid mr-1"></i> Create Services</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"> Services</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Services</li>
                </ol>
            </div>
            <!--page header-->

            <div class="card">
                <div class="card-body">
                    <form method="post" role="form" class="form-horizontal" id="formCreate"
                        enctype="multipart/form-data" action="{{ route('services.store') }}">
                        @csrf
                        <div class="panel panel-primary">
                            <div class=" tab-menu-heading">
                                <div class="tabs-menu1 ">
                                    <!-- Tabs -->
                                    <ul class="nav panel-tabs">
                                        <li class=""><a href="#tab5" class="active" data-toggle="tab">Services
                                                info</a></li>
                                        <li class="aditional_info " style="display: none"><a href="#tab6"
                                                data-toggle="tab">Aditional Information</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-body tabs-menu-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab5">
                                        <section class="general-info">
                                            <div class="form-group row  @error('name') has-error @enderror">
                                                <label for="name" class="col-md-2 col-form-label">Heading</label>
                                                <div class="col-md-10">
                                                    <input type="text" id="heading" class="form-control" name="name"
                                                        placeholder="Enter Heading">
                                                    @error('name')
                                                        <div class="label label-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row  @error('paragraph') has-error @enderror">
                                                <label for="paragraph" class="col-md-2 col-form-label">Paragraph</label>
                                                <div class="col-md-10">
                                                    <textarea class="ckeditor form-control" id="paragraph" name="paragraph" placeholder="Enter Paragraph"></textarea>
                                                    @error('paragraph')
                                                        <div class="label label-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row  @error('excerpt') has-error @enderror">
                                                <label for="excerpt" class="col-md-2 col-form-label">Excerpt</label>
                                                <div class="col-md-10">
                                                    <textarea class="ckeditor form-control" id="excerpt" name="excerpt" placeholder="Enter excerpt">{{ $service->excerpt }}</textarea>
                                                    @error('excerpt')
                                                        <div class="label label-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row  @error('services_image') has-error @enderror">
                                                <label for="services_image" class="col-md-2 col-form-label">Upload
                                                    Image</label>
                                                <div class="col-md-10">
                                                    <input type="file" class="custom-file-input" id="fileUpload"
                                                        name="services_image">
                                                    <label class="custom-file-label " style="left: 7px;">Upload
                                                        Image</label>
                                                    <div id="image-holder" style="width:150px; margin-top:5px;"></div>
                                                    @error('services_image')
                                                        <div class="label label-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row  @error('featured') has-error @enderror">
                                                <label for="featured" class="col-md-2 col-form-label">Featured</label>
                                                <div class="col-md-10">
                                                    <select class="form-control select2" id="select2" name="featured">
                                                        <option value="1">YES</option>
                                                        <option value="0">NO</option>
                                                    </select>
                                                </div>
                                                @error('featured')
                                                    <div class="label label-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group row  @error('status') has-error @enderror">
                                                <label for="status" class="col-md-2 col-form-label">Status</label>
                                                <div class="col-md-10">
                                                    <select class="form-control select2" id="select2" name="status">
                                                        <option value="1">ACTIVE</option>
                                                        <option value="0">DEACTIVE</option>
                                                    </select>
                                                </div>
                                                @error('status')
                                                    <div class="label label-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        </section>
                                    </div>


                                    <div class="form-group mb-0 mt-2 row justify-content-end">
                                        <div class="col-md-10">
                                            <button type="submit" id="submit" class="btn btn-info">Save</button>
                                            <a href="{{ route('services.index') }}" class="btn btn-danger">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- table-wrapper -->
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
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
                    alert("Please select only images");
                }
            });
        });
    </script>
@endsection
