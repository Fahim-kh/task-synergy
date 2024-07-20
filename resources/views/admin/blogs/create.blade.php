@extends('admin.layouts.master')
@section('page-title')
    Create Blogs
@endsection

@section('main-content')
    <div class=" app-content">
        <div class="side-app">
            <div class="page-header">
                <h4 class="page-title"><i class="fe fe-grid mr-1"></i> Create Blogs</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"> Blogs</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Blogs</li>
                </ol>
            </div>
            <div class="card">
                <div class="card-body">
                  <form method="post" role="form" class="form-horizontal" id="formCreate"
                      enctype="multipart/form-data" action="{{ route('blog.store') }}">
                      @csrf
                      <div class="from-group">
                        <label for="heading">Title*</label>
                        <input type="text" class="form-control  @error('name') has-error @enderror" name="name" id="heading">
                        @error('name')
                          <div class="label label-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="from-group">
                        <label for="body">Content*</label>
                        <textarea name="body" id="body" class="form-control content @error('body') has-error @enderror"></textarea>
                        @error('body')
                          <div class="label label-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="from-group">
                        <label class="form-label" for="customFile">Featured Image</label>
                        <input type="file" class="form-control @error('image') has-error @enderror" name="image" id="customFile" accept=".png,.jpg,.jpeg,.webp"/>
                        @error('image')
                          <div class="label label-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="from-group">
                        <label class="form-label" for="status">Status</label>
                        <select name="status" class="form-control" id="status" name="status">
                          <option value="0">Deactive</option>
                          <option value="1">Active</option>
                        </select>
                      </div>
                      <div class="form-group"><br>
                        <button type="submit" class="btn btn-success">Save</button>
                      </div>
                  </form>
                </div>

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
            $('#body').summernote({
              height: 300, // set editor height
              minHeight: null, // set minimum height of editor
              maxHeight: null, // set maximum height of editor
              focus: true, // set focus to editable area after initializing Summernote
            });
        });
    </script>
@endsection
