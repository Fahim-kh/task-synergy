@extends('admin.layouts.master')
@section('page-title')
View Slider
@endsection

@section('main-content')

<div class=" app-content">
    <div class="side-app">
        <!--Page Header-->
        <div class="page-header">
            <h4 class="page-title"><i class="fe fe-grid mr-1"></i> View Slider</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"> Slider</a></li>
                <li class="breadcrumb-item active" aria-current="page">View Slider</li>
            </ol>
        </div>
        <!--page header-->
        <div class="row">
            <div class="col-md-12 col-lg-12">

                @if(session()->has('message'))
                <div class="alert alert-success flash">
                    {{ session()->get('message') }}
                </div>
                @endif
                @if(session()->has('error'))
                <div class="alert alert-danger flash">
                    {{ session()->get('error') }}
                </div>
                @endif
                @if(session()->has('status'))
                <div class="alert alert-success flash">
                    {{ session()->get('status') }}
                </div>
                @endif
            </div>
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col col-md-10"></div>
                            @if($sliders->count() >3)
                            <div class="col col-2 " style="visibility: hidden">
                                @if(isset(Auth::user()->hasPer('Slider')['pcreate']) &&
                                Auth::user()->hasPer('Slider')['pcreate'] == 1)
                                <a href="{{ route('slider.create') }}" style="margin-bottom: 20px; float:right;"
                                    class="btn btn-secondary btn-create">Create</a>
                                @endif

                            </div>
                        </div>
                        @else
                        <div class="col col-2" style="visibility: visible;">
                            @if(isset(Auth::user()->hasPer('Slider')['pcreate']) &&
                            Auth::user()->hasPer('Slider')['pcreate'] == 1)
                            <a href="{{ route('slider.create') }}" style="margin-bottom: 20px; float:right;"
                                class="btn btn-secondary">Create</a>
                            @endif
                        </div>
                        @endif
                        <div class="table-responsive ">
                            <table id="example-2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th width="5%" class="border-bottom-0">S.No</th>
                                        <th width="20%" class="border-bottom-0">Heading</th>
                                        <th width="25%" class="border-bottom-0">Short Description</th>
                                        <th width="20%" class="border-bottom-0">image</th>
                                        <th width="15%" class="border-bottom-0">Status</th>
                                        <th width="20%" class="border-bottom-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sliders as $key =>$slider)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $slider->heading }}</td>
                                        <td>{{ $slider->paragraph }}</td>
                                        <td>
                                            @if($slider->slider_img == '')
                                            <img src="{{ url('') }}/assets/images/no-image.jpg" class="img-thumbnail"
                                                width="150px">
                                            @else
                                            <img src="{{ url('') }}/uploads/slider/{{ $slider->slider_img }}"
                                                class="img-thumbnail" width="150px" alt="{{ $slider->slider_img }}">
                                            @endif

                                        </td>
                                        <td>
                                            <form method="post"
                                                action="{{ route('slider.satatus',$slider->id) }}">
                                                @csrf
                                                @method('put')
                                                @if($slider->status ==0)
                                                <button type="submit" class="btn btn-danger btn-lg singleStatus"><i
                                                        class="fas fa-thumbs-down"></i></button>
                                                @else
                                                <button type="submit" class="btn btn-info btn-lg singleStatus"><i
                                                        class="fas fa-thumbs-up"></i></button>
                                                @endif
                                            </form>
                                        </td>
                                        <td>
                                            <form method="post" action="{{ route('slider.destroy',$slider->id) }}">
                                                @csrf
                                                @method('delete')
                                                @if(isset(Auth::user()->hasPer('Slider')['pedit']) &&
                                                Auth::user()->hasPer('Slider')['pedit'] == 1)
                                                <a href="{{ route('slider.edit',$slider->id) }}"
                                                    class="btn btn-info btn-flat btn-lg"> <i class="fa fa-edit"></i></a>
                                                @endif
                                                @if(isset(Auth::user()->hasPer('Slider')['pdelete']) &&
                                                Auth::user()->hasPer('Slider')['pdelete'] == 1)
                                                <button class="btn btn-danger btn-flat btn-lg singleDelete"> <i
                                                        class="fa fa-trash"></i></button>
                                                @endif
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- table-wrapper -->
                </div>
                <!-- section-wrapper -->
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
		  $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
		// SINGLE DELETE
                $(".singleDelete").on('click', function(event) {
                    event.preventDefault();
                   // $("tbody").addClass('table-loader');
                   if (confirm('Are you sure you want to delete this?'))
                    {
                    var self = $(this);
                    var url = self.closest('form').attr('action');

                    $.ajax({
                        url: url,
                        type: 'DELETE',
                    })
                    .done(function(data) {
                 if (data == 'true')
                    {
                        self.closest('tr').css('background-color', 'red').fadeOut('slow');
                        self.remove();
                    }
            		})
                    .fail(function() {
                        alert("Oppss! Something went wrong");
                    })
                    .always(function() {
                        //$("tbody").removeClass('table-loader');
                    });
                }
                else
                    return false;

		});
        //status
      	$('.singleStatus').on('click', function(event) {
      		event.preventDefault();
      		/* Act on the event */
      		var self = $(this);
      		var url =self.closest('form').attr('action');
      		$.ajax({
      			url: url,
      			type: 'PUT',
      		})
      		.done(function(data) {
      		if(data ==1)
      		{
			 	self.closest('form').find('button').removeClass('btn-danger');
                self.closest('form').find('button').addClass('btn-info');
                self.html('<i class="fas fa-thumbs-up"></i>');


      		}
      		else
      			{
      				self.closest('form').find('button').removeClass('btn-info');
	      			self.closest('form').find('button').addClass('btn-danger');
	      			self.html('<i class="fas fa-thumbs-down"></i>');
      			}
      		})
      		.fail(function() {
      			console.log("error");
      		})
      		.always(function() {
      			console.log("complete");
      		});

      	});
  });
</script>
<script src="{{ url('') }}/admin/assets/plugins/datatable/js/jquery.dataTables.js"></script>
<script src="{{ url('') }}/admin/assets/plugins/datatable/js/dataTables.bootstrap4.js"></script>
<script src="{{ url('') }}/admin/assets/plugins/datatable/js/dataTables.buttons.min.js"></script>
<script src="{{ url('') }}/admin/assets/plugins/datatable/js/buttons.bootstrap4.min.js"></script>
<script src="{{ url('') }}/admin/assets/plugins/datatable/js/jszip.min.js"></script>
<script src="{{ url('') }}/admin/assets/plugins/datatable/js/pdfmake.min.js"></script>
<script src="{{ url('') }}/admin/assets/plugins/datatable/js/vfs_fonts.js"></script>
<script src="{{ url('') }}/admin/assets/plugins/datatable/js/buttons.html5.min.js"></script>
<script src="{{ url('') }}/admin/assets/plugins/datatable/js/buttons.print.min.js"></script>
<script src="{{ url('') }}/admin/assets/plugins/datatable/js/buttons.colVis.min.js"></script>
<script src="{{ url('') }}/admin/assets/plugins/datatable/dataTables.responsive.min.js"></script>
<script src="{{ url('') }}/admin/assets/plugins/datatable/responsive.bootstrap4.min.js"></script>

<!-- Data table js -->
<script src="{{ url('') }}/admin/assets/js/datatable.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
  $(".flash").fadeOut(3000);
});
</script>
@endsection
