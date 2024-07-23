@extends('admin.layouts.master')
@section('page-title')
    Edit Testimonial
@endsection

@section('main-content')
    <div class=" app-content">
        <div class="side-app">
            <!--Page Header-->
            <div class="page-header">
                <h4 class="page-title"><i class="fe fe-grid mr-1"></i> Edit Testimonial</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"> Testimonial</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Testimonial</li>
                </ol>
            </div>
            <!--page header-->
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" role="form" class="form-horizontal" id="formCreate"
                                enctype="multipart/form-data" action="{{ route('testimonial.update', $testimonial->id) }}">
                                @csrf
                                @method('put')
                                <div class="form-group row  @error('name') has-error @enderror">
                                    <label for="name" class="col-md-2 col-form-label">Name</label>
                                    <div class="col-md-10">
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="Name" value="{{ $testimonial->name }}">
                                        @error('name')
                                            <div class="label label-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row  @error('designation') has-error @enderror">
                                    <label for="designation" class="col-md-2 col-form-label">Designation</label>
                                    <div class="col-md-10">
                                        <input type="text" name="designation" class="form-control" id="designation"
                                            placeholder="Designation" value="{{ $testimonial->designation }}">
                                        @error('designation')
                                            <div class="label label-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row  @error('message') has-error @enderror">
                                    <label for="message" class="col-md-2 col-form-label">Message</label>
                                    <div class="col-md-10">


                                        <textarea class="form-control" id="word_count" name="message" rows="6" placeholder="Enter Message">{{ $testimonial->message }}</textarea>
                                        <small id="answer-small" class="form-text text-muted">
                                            Total word Count : <span id="display_count">0</span> words. <span
                                                id="word_left">30</span> words.</small>
                                        @error('message')
                                            <div class="label label-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <label for="upload Image" class="col-md-2 col-form-label">Upload Image</label>
                                    <div class="col-md-10">
                                        <input type="file" class="custom-file-input" id="fileUpload"
                                            name="testimonial_image"><small id="answer-small"
                                            class="form-text text-muted">Image size should be 77x77 </small>
                                        <label class="custom-file-label " style="left: 7px;">Choose file</label>
                                        <div id="image-holder" style="width:150px; margin-top:5px;">
                                            @if ($testimonial->testimonial_image == '')
                                                <img src="{{ url('') }}/assets/images/no-image.jpg"
                                                    class="img-thumbnail" width="150px">
                                            @else
                                                <img src="{{ url('') }}/uploads/testimonial/{{ $testimonial->testimonial_image }}"
                                                    width="150px" height="150px">
                                            @endif

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="status" class="col-md-2 col-form-label">Status</label>
                                    <div class="col-md-10">

                                        <select name="status" id="status" class="form-control select2 ">
                                            <option value="0" {{ $testimonial->status == 0 ? 'selected' : '' }}>DEACTIVE
                                            </option>
                                            <option value="1" {{ $testimonial->status == 1 ? 'selected' : '' }}>ACTIVE
                                            </option>
                                        </select>
                                        @error('status')
                                            <div class="label label-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="matchpass" class="col-md-2 col-form-label"></label>
                                    <div class="col-md-10">
                                        <label style="color:green;" class="col-md-3 col-form-label registrationFormAlert"
                                            id="CheckPasswordMatch"></label>
                                    </div>
                                </div>
                                <div class="form-group mb-0 mt-2 row justify-content-end">
                                    <div class="col-md-10">
                                        <button type="submit" id="submit" class="btn btn-info">Save</button>
                                        <a href="{{ route('testimonial.index') }}" class="btn btn-danger">Cancel</a>
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
    <script>
        $(document).ready(function() {
            $("#word_count").on('keydown', function(e) {
                var words = $.trim(this.value).length ? this.value.match(/\S+/g).length : 0;
                if (words <= 30) {
                    $('#display_count').text(words);
                    $('#word_left').text(30 - words)
                } else {
                    if (e.which !== 8) e.preventDefault();
                }
            });
        });
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
