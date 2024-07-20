@extends('admin.layout.master')
@section('page-title')
    NewsLetter
@endsection

@section('main-content')
<div class=" app-content">
          <div class="side-app">
            <!--Page Header-->
            <div class="page-header">
              <h4 class="page-title"><i class="fe fe-grid mr-1"></i>   NewsLetter</h4>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"> Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">  NewsLetter</li>
              </ol>
            </div>
            <!--page header-->
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
                <div class="card">
                  
                    <div class="card-body">
                      <div class="row" style="padding:10px;">
                      <div class="col col-md-10">
                       <!--<a class="btn btn-danger btn-xm " id="deleteAll"><i class="fa fa-trash"></i></a>-->
                     {{--  <a id="deleteAll" url="">Delete</a> --}}
                      </div>
                    <div class="col col-2"> </div>
                  </div>
                      <div class="table-responsive ">
                        <table id="example-2" class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th width="4%"><input type="checkbox" name="" id="checkAll"></th>
                              <th class="wd-15p border-bottom-0">S.No</th>
                              <th class="wd-15p border-bottom-0">Email</th>
                            </tr>
                          </thead>
                          <tbody>
                      @forelse($newsletters as $key => $newsletter)
                    <tr>
                      <td><input type="checkbox" name="deleteAll[]" value="{{ $newsletter->id }}" id="" class="checkSingle"></td>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $newsletter->email }}</td>
                    </tr>
                    @empty
                    
                    @endforelse
                    </tbody>
                        </table>
                    </div>
                </div>
                  <!-- table-wrapper -->
                </div>
                <!-- section-wrapper -->
@endsection
@section('scripts')

<!-- jQuery -->
  <!-- Data tables -->
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

   <!--Select2 js -->
<script type="text/javascript">
  $(document).ready(function() {
    
    $("#checkAll").click(function() {
      $(".checkSingle").prop("checked", this.checked);
    }); 

    $(".flash").fadeOut( 3000);

    	$.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })

      $("#deleteAll").on('click', function(event) {
                event.preventDefault();
               // $("tbody").addClass('table-loader');
                var token = $('meta[name="csrf-token"]').attr('content');
                var deleteAllValue = [];
                $("input[name='deleteAll[]']:checked").each(function() {
                    deleteAllValue.push($(this).val());
                });
                var data = {
                    'id': deleteAllValue,
                      _token: token,
                }
                $.ajax({
                    type: 'POST',
                    url: "{{ route('deleteAll') }}",
                    data: data,
                    success:function(response){
                    console.log(response);
                    location.reload();
                  }
                })
                console.log(data)
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
      });
</script>
  @endsection

