@extends('admin.layouts.master')
@section('page-title')
    View General Setting
@endsection

@section('main-content')
    <div class=" app-content">
        <div class="side-app">
            <!--Page Header-->
            <div class="page-header">
                <h4 class="page-title"><i class="fe fe-grid mr-1"></i> View General Setting</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"> General Setting</a></li>
                    <li class="breadcrumb-item active" aria-current="page">View General Setting</li>
                </ol>
            </div>
            @include('admin.layouts.include.message');
            <div class="card">
                <div class="card-body p-6">
                    <div class="panel panel-primary">
                        <div class=" tab-menu-heading">
                            <div class="tabs-menu1 ">
                                <!-- Tabs -->
                                <ul class="nav panel-tabs">
                                    <li class=""><a href="#tab5" class="active" data-toggle="tab">Site Identity</a>
                                    </li>
                                    <li><a href="#tab6" data-toggle="tab">Social Media Links</a></li>
                                    <li><a href="#tab7" data-toggle="tab">Contact Details</a></li>
                                    <li><a href="#tab8" data-toggle="tab">Company Vission and Mission</a></li>
                                </ul>
                            </div>
                        </div>
                        @if (isset($general_settings->logo) != null)
                            <form action="{{ route('general_settings.update', $general_settings->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                            @else
                                <form action="{{ route('general_settings.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                        @endif
                        <div class="panel-body tabs-menu-body">
                            <div class="tab-content">
                                <div class="tab-pane active " id="tab5">
                                    <div class="row">
                                        <div class="col-md-12 col-xl-4">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">Site Logo</h3>
                                                    <div class="card-options">
                                                        <a href="#" class="card-options-collapse"
                                                            data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>

                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div id="image-holder" style="border-radius: 0px; height:100%;">
                                                        @if (isset($general_settings->logo))
                                                            <img src="{{ asset('') }}admin/uploads/generalsetting/{{ $general_settings->logo }}"
                                                                alt="Logo" id="img_site">
                                                        @else
                                                            <img src="{{ asset('') }}/assets/img/no-image.png"
                                                                alt="no-image" width="170" id="img_site">
                                                        @endif
                                                    </div>
                                                    <p class="ml-4"><a href="#" id="change_sitelogo"
                                                            class="{{ isset($general_settings->logo) ? 'd-block' : 'd-none' }}">Change
                                                            Logo</a></p>
                                                    <div class="form-group sitelogo"
                                                        style="{{ isset($general_settings->logo) ? 'display:none;' : 'display:block;' }}">
                                                        <input type="file" class="form-control official_logo"
                                                            name="logo" id="customFile" />
                                                        <small>Allowed image format: jpg,jpeg,png. Recommended logo
                                                            image size 170x25</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-xl-4">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">White Site Logo</h3>
                                                    <div class="card-options">
                                                        <a href="#" class="card-options-collapse"
                                                            data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>

                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div id="image-holder-white">
                                                        @if (isset($general_settings->white_logo))
                                                            <img src="{{ asset('') }}admin/uploads/generalsetting/{{ $general_settings->white_logo }}"
                                                                alt="white Logo" width="170" id="img_site">
                                                        @else
                                                            <img src="{{ asset('') }}assets/img/no-image.png"
                                                                alt="no-image" width="170" id="img_site">
                                                        @endif
                                                    </div>
                                                    <p class="ml-4"><a href="#" id="change_white_sitelogo"
                                                            class="{{ isset($general_settings->white_logo) ? 'd-block' : 'd-none' }}">Change
                                                            Logo</a></p>
                                                    <div class="form-group whiltlogo"
                                                        style="{{ isset($general_settings->white_logo) ? 'display:none;' : 'display:block;' }}">
                                                        <input type="file" class="form-control white_logo"
                                                            name="whitelogo" id="customFile" />
                                                        <small>Allowed image format: jpg,jpeg,png. Recommended logo
                                                            image size 170x25</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-xl-4">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">Favicon</h3>
                                                    <div class="card-options">
                                                        <a href="#" class="card-options-collapse"
                                                            data-toggle="card-collapse"><i
                                                                class="fe fe-chevron-up"></i></a>

                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div id="image-holder-favicon">
                                                        @if (isset($general_settings->favicon))
                                                            <img src="{{ asset('') }}admin/uploads/generalsetting/{{ $general_settings->favicon }}"
                                                                alt="favicon" width="170" id="img_site">
                                                        @else
                                                            <img src="{{ asset('') }}assets/img/no-image.png"
                                                                alt="no-image" width="170" id="img_site">
                                                        @endif
                                                    </div>
                                                    <p class="ml-4"><a href="#" id="change_favicon"
                                                            class="{{ isset($general_settings->favicon) ? 'd-block' : 'd-none' }}">Change
                                                            Favicon</a></p>
                                                    <div class="form-group faviconLogo"
                                                        style="{{ isset($general_settings->favicon) ? 'display:none' : 'display:block' }}">
                                                        <input type="file" class="form-control favicon" name="favicon"
                                                            id="customFile" />
                                                        <small>Allowed image format: jpg,jpeg,png. Recommended logo
                                                            image size 170x25</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane " id="tab6">
                                    <p><a href="https://fontawesome.com/v4/icons/" target="_blank">fontawsome
                                            icons</a></p>
                                    <div class="form-group">
                                        <table class="table table-bordered table-responsive" id="OptionTable">
                                            <thead>
                                                <tr>
                                                    <th>Sno.</th>
                                                    <th width="30%">social icon class</th>
                                                    <th width="70%">social Link</th>
                                                    <th width="250px">Action</th>
                                                </tr>
                                            </thead>
                                            @if (isset($general_settings) != null)
                                                <tbody>
                                                    @foreach ($socials as $key => $social)
                                                        <tr data-keyy="1">
                                                            <td>
                                                                <p class="sno" data-key="1">{{ $key + 1 }}</p>
                                                            </td>
                                                            <td>
                                                                <div class="form-group ">
                                                                    <input type="text" name="social_icon[]"
                                                                        placeholder="Enter icon"
                                                                        class="form-control txt_social"
                                                                        value="{{ $social->social_icon }}">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group ">
                                                                    <input type="text" name="social_link[]"
                                                                        placeholder="Enter links"
                                                                        class="form-control txt_social"
                                                                        value="{{ $social->social_link }}">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="row">
                                                                    @if ($key == 0)
                                                                        <button type="button"
                                                                            class="addRow btn btn-info">Add
                                                                            More</button>
                                                                    @else
                                                                        <button type="button"
                                                                            class="removeRow btn btn-danger">Remove</button>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            @else
                                                <tbody>
                                                    <tr data-keyy="1">
                                                        <td>
                                                            <p class="sno" data-key="1">1</p>
                                                        </td>
                                                        <td>
                                                            <div class="form-group ">
                                                                <input type="text" name="social_icon[]"
                                                                    placeholder="Enter icon"
                                                                    class="form-control txt_social">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group ">
                                                                <input type="text" name="social_link[]"
                                                                    placeholder="Enter links"
                                                                    class="form-control txt_social">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="row">
                                                                <button type="button" class="addRow btn btn-info">Add
                                                                    More</button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            @endif
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane " id="tab7">
                                    <div class="form-group">
                                        <label for="phone">Phone Number</label>
                                        <input type="text" name="phone_number"
                                            class="form-control @error('phone_number')  is-invalid state-invalid @enderror"
                                            placeholder="Enter Phone Number"
                                            value="{{ isset($general_settings->phone_number) ? $general_settings->phone_number : '' }}">
                                        @if ($errors->has('phone_number'))
                                            <div class="invalid-feedback" role="alert">
                                                {{ $errors->first('phone_number') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="phone_optional">Phone Number (Optional)</label>
                                        <input type="text" name="phone_number_Optional" class="form-control"
                                            placeholder="Enter Phone Number"
                                            value="{{ isset($general_settings->phone_number_optional) ? $general_settings->phone_number_optional : '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email Address</label>
                                        <input type="email" name="email_address"
                                            class="form-control @error('email')  is-invalid state-invalid @enderror"
                                            placeholder="Enter Email Address"
                                            value="{{ isset($general_settings->email) ? $general_settings->email : '' }}">
                                        @if ($errors->has('email'))
                                            <div class="invalid-feedback" role="alert">{{ $errors->first('email') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="email_optional">Email Address (Optional)</label>
                                        <input type="email" name="email_Optional" class="form-control"
                                            placeholder="Enter Email Address"
                                            value="{{ isset($general_settings->email_optional) ? $general_settings->email_optional : '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea class="form-control" name="address" placeholder="Enter Address">{{ isset($general_settings->address) ? $general_settings->address : '' }}</textarea>
                                    </div>
                                </div>
                                <div class="tab-pane " id="tab8">
                                    <div class="form-group">
                                        <label for="phone">Company Vission</label>
                                        <textarea type="text" name="vission" class="form-control @error('vission')  is-invalid state-invalid @enderror">{{ isset($general_settings->vission) ? $general_settings->vission : '' }}</textarea> 
                                        @if ($errors->has('vission'))
                                            <div class="invalid-feedback" role="alert">
                                                {{ $errors->first('vission') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Vission Image</label>
                                        <input type="file" class="form-control " name="vission_image" id="customFileVission" />
                                        <img src="{{ asset('admin/uploads/generalsetting') }}/{{ $general_settings->vission_image }}" alt="" width="200">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Company Mission</label>
                                        <textarea type="text" name="mission" class="form-control @error('mission')  is-invalid state-invalid @enderror">{{ isset($general_settings->mission) ? $general_settings->mission : '' }}</textarea> 
                                        @if ($errors->has('mission'))
                                            <div class="invalid-feedback" role="alert">
                                                {{ $errors->first('mission') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Mission Image</label>
                                        <input type="file" class="form-control" name="mission_image" id="customFileMission" />
                                        <img src="{{ asset('admin/uploads/generalsetting') }}/{{ $general_settings->mission_image }}" alt="" width="200">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-success bg-success">
                                    @if (isset($general_settings))
                                        {{ 'Update' }}
                                    @else
                                        {{ 'Save' }}
                                    @endif
                                </button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#change_sitelogo').click(function() {
                $(this).fadeOut();
                $('.sitelogo').fadeIn("slow");
            })

            $('#change_white_sitelogo').click(function() {
                $(this).fadeOut();
                $('.whiltlogo').fadeIn("slow");
            })

            $('#change_favicon').click(function() {
                $(this).fadeOut();
                $('.faviconLogo').fadeIn("slow");
            })

            // change logo
            $(".official_logo").on('change', function() {
                //Get count of selected files
                var countFiles = $(this)[0].files.length;
                var imgPath = $(this)[0].value;
                var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
                var image_holder = $("#image-holder");
                image_holder.empty();
                if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg" || extn == "webp") {
                    if (typeof(FileReader) != "undefined") {
                        //loop for each file selected for uploaded.
                        for (var i = 0; i < countFiles; i++) {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                $("<img />", {
                                    "src": e.target.result,
                                    "class": "thumb-image thumbnail"
                                }).appendTo(image_holder);
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
            // change white logo
            $(".white_logo").on('change', function() {
                //Get count of selected files
                var countFiles = $(this)[0].files.length;
                var imgPath = $(this)[0].value;
                var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
                var image_holder = $("#image-holder-white");
                image_holder.empty();
                if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg" || extn == "webp") {
                    if (typeof(FileReader) != "undefined") {
                        //loop for each file selected for uploaded.
                        for (var i = 0; i < countFiles; i++) {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                $("<img />", {
                                    "src": e.target.result,
                                    "class": "thumb-image thumbnail"
                                }).appendTo(image_holder);
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
            // change favicon
            $(".favicon").on('change', function() {
                //Get count of selected files
                var countFiles = $(this)[0].files.length;
                var imgPath = $(this)[0].value;
                var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
                var image_holder = $("#image-holder-favicon");
                image_holder.empty();
                if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg" || extn == "webp") {
                    if (typeof(FileReader) != "undefined") {
                        //loop for each file selected for uploaded.
                        for (var i = 0; i < countFiles; i++) {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                $("<img />", {
                                    "src": e.target.result,
                                    "class": "thumb-image thumbnail"
                                }).appendTo(image_holder);
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

            // add row and remove row
            $('body').on('click', '.addRow', function() {
                var row = $(this).parents('tr').clone()
                row.find('.txt_social').val('');
                row.find('.addRow').addClass('removeRow btn-danger')
                row.find('.addRow').text('Remove')
                row.find('.addRow').removeClass('addRow')
                row.find('.sno').text($('#OptionTable tbody tr').length + 1)
                row.find('.sno').attr('data-key', $('#OptionTable tbody tr').length + 1)
                $(row).attr('data-keyy', $('#OptionTable tbody tr').length + 1)
                row.find('.category_class').attr('data-key', $('#OptionTable tbody tr').length + 1)
                var con = $('#OptionTable tbody tr').length + 1;
                $('#OptionTable tbody tr').last().after(row)
                $('.category_class').select2()
            })
            $('body').on('click', '.removeRow', function() {
                $(this).parents('tr').remove()
                var con = 1;
                $('.sno').each(function() {
                    $(this).text(con)
                    $(this).attr('data-key', con)
                    con++;
                })
            })
        });
    </script>
@endsection
