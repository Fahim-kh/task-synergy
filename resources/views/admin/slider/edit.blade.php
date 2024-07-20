@extends('admin.layouts.master')
@section('page-title')
Edit Slider
@endsection

@section('main-content')
<div class=" app-content">
    <div class="side-app">
        <!--Page Header-->
        <div class="page-header">
            <h4 class="page-title"><i class="fe fe-grid mr-1"></i> Edit Slider</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"> Slider</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Slider</li>
            </ol>
        </div>
        <!--page header-->
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" role="form" class="form-horizontal" id="formEdit"
                            enctype="multipart/form-data" action="{{ route('slider.update',$slider->id)  }}">
                            @csrf
                            @method('put')
                            <div class="form-group row  @error('heading') has-error @enderror">
                                <label for="heading" class="col-md-2 col-form-label">Heading</label>
                                <div class="col-md-10">

                                    <textarea name="heading" id="heading_count" class="form-control" rows="6"
                                        id="word_count" placeholder="Enter Heading">{{ $slider->heading }}</textarea>
                                    <small id="answer-small" class="form-text text-muted">
                                        Total word Count : <span id="display_count">0</span> words. <span
                                            id="word_left">5</span> words.</small>
                                    @error('heading')
                                    <div class="label label-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row  @error('paragraph') has-error @enderror">
                                <label for="paragraph" class="col-md-2 col-form-label">Paragraph</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" name="paragraph" id="word_count" rows="6"
                                        placeholder="Enter Paragraph">{{ $slider->paragraph }}</textarea>
                                    <small id="answer-small" class="form-text text-muted">
                                        Total word Count : <span id="display_count_p">0</span> words. <span
                                            id="word_left_p">30</span> words.</small>
                                    @error('paragraph')
                                    <div class="label label-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row  @error('slug') has-error @enderror">
                                <label for="slug" class="col-md-2 col-form-label">Service Link</label>
                                <div class="col-md-10">
                                    <input type="text" name="slug" class="form-control" id="slug"
                                        placeholder="Service Link" value="{{ $slider->slug }}">
                                    @error('slug')
                                    <div class="label label-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="upload Image" class="col-md-2 col-form-label">Upload Image</label>
                                <div class="col-md-10">
                                    <input type="file" class="custom-file-input" id="fileUpload" name="slider_img">
                                    <label class="custom-file-label " style="left: 7px;">Choose file</label>
                                    <div id="image-holder" style="border-radius:1px; width:100%; margin-top:5px;">
                                        @if($slider->slider_img == '')
                                        <img src="{{ url('') }}/assets/images/no-image.jpg" class="img-thumbnail"
                                            width="150px">
                                        @else
                                        <img src="{{ url('') }}/uploads/slider/{{ $slider->slider_img }}" width="150px"
                                            height="150px">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status" class="col-md-2 col-form-label">Status</label>
                                <div class="col-md-10">
                                    <select name="status" id="status" class="form-control select2 ">
                                        <option value="0" {{ ($slider->status == 0)?'selected' : '' }}>DEACTIVE</option>
                                        <option value="1" {{ ($slider->status == 1)?'selected' : '' }} >ACTIVE</option>
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
                                    <a href="{{ route('slider.index') }}" class="btn btn-danger">Cancel</a>
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
@section('scripts')
<!-- WYSIWYG Editor js -->
<script src="{{ url('') }}/admin/assets/plugins/jquery.richtext/richText1.js"></script>
<script src="{{ url('') }}/admin/assets/plugins/jquery.richtext/jquery.richtext.js"></script>
<script>
    $(document).ready(function() {
    $("#heading_count").on('keydown', function(e) {
        var words = $.trim(this.value).length ? this.value.match(/\S+/g).length : 0;
        if (words <= 5) {
            $('#display_count').text(words);
            $('#word_left').text(5-words)
        }else{
            if (e.which !== 8) e.preventDefault();
        }
    });
 });
 $(document).ready(function() {
    $("#word_count").on('keydown', function(e) {
        var words = $.trim(this.value).length ? this.value.match(/\S+/g).length : 0;
        if (words <= 30) {
            $('#display_count_p').text(words);
            $('#word_left_p').text(30-words)
        }else{
            if (e.which !== 8) e.preventDefault();
        }
    });
 });
function countChar(val) {
  var len = val.value.length;
  if (len >= 100) {
    val.value = val.value.substring(0, 100);
  } else {
    $('#charNum').text(100 - len);
  }
};
$(document).ready(function() {
  $("#fileUpload").on('change', function() {
          //Get count of selected files
          var countFiles = $(this)[0].files.length;
          var imgPath = $(this)[0].value;
          var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
          var image_holder = $("#image-holder");
          image_holder.empty();
          if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg" || extn == "webp" || extn == "avif") {
            if (typeof(FileReader) != "undefined") {
              //loop for each file selected for uploaded.
              for (var i = 0; i < countFiles; i++)
              {
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
var $url ="{{ url('') }}/portfolio" ;
var $url2 ="{{ url('') }}/services/";
var $url3 ="{{ url('') }}/admin/role/create";
$("#setText").click(function(e) {
 e.preventDefault()
 $('#slug').val($url);
});
$("#link2").click(function(e) {
 e.preventDefault()
 $('#slug').val($url2);
});
$("#link3").click(function(e) {
 e.preventDefault()
 $('#slug').val('');
});
</script>
@endsection
