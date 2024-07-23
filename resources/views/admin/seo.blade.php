@extends('admin.layout.master')
@section('page-title')
	Search Engine
@endsection
@section('main-content')
<div class=" app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title"><i class="fe fe-grid mr-1"></i> Search Engine</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"> Search Engine</a></li>
                <li class="breadcrumb-item active" aria-current="page">Search Engine</li>
            </ol>
        </div>
        <div class="card">
            <div class="success">

            </div>
            @if(isset(Auth::user()->hasPer('Search Engine')['pcreate']) && Auth::user()->hasPer('Search Engine')['pcreate'] == 1)
            <div class="card-header d-flex flex-row-reverse">
                <button class="btn btn-info"  data-backdrop="static" data-toggle="modal" data-target="#exampleModalCenter" >Create Seo for page</button>
            </div>
            @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="border-bottom-0">Page Name</th>
                                <th class="border-bottom-0">Meta Title</th>
                                <th class="border-bottom-0">Meta Description</th>
                                <th class="border-bottom-0">Meta Keywords</th>
                                <th class="w-15 border-bottom-0">Action</th>
                            </tr>
                        </thead>
                        <tbody class="table_data">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade " id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Seo for page</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <form method="post" class="formSeo">
            <div class="form-group">
                <label for="page_name">Page Name</label>
                <input type="text" name="page_name" class="form-control" id="page_name" placeholder="Enter page name">
            </div>
            <div class="form-group">
                <label for="meta_title">Meta Title</label>
                <input type="text" name="meta_title" class="form-control" id="meta_title" placeholder="Enter meta title">
            </div>
            <div class="form-group">
                <label for="meta_description" class="d-flex justify-content-between">Meta Description <span id="characterCount">Character count: 0</span></label>
                <textarea name="meta_description" class="form-control" id="meta_description" placeholder="Enter meta description"></textarea>

            </div>
            <div class="form-group">
                <label for="meta_keywords" class="d-flex justify-content-between">Meta keywords <span id="metakeywordcharacterCount">Character count: 0</span></label>
                <input type="text" name="meta_keywords" class="form-control" id="meta_keywords" placeholder="Enter meta keywords">
            </div>
            <div class="form-group">
                <label for="page_url">Page Url</label>
                <input type="url" name="page_url" class="form-control" id="page_url" placeholder="Enter Url">
            </div>
         </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" id="submit" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
</div>
{{-- edit --}}
<div class="modal fade " id="editModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Seo for page</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body mbody">
         <form method="post" class="formEdit">
            <input type="hidden" name="id" class="form-control id" id="id">

            <div class="form-group">
                <label for="page_name_ed">Page Name</label>
                <input type="text" name="page_name_ed" class="form-control page_name_ed" id="page_name_ed" placeholder="Enter page name" disabled>
            </div>
            <div class="form-group">
                <label for="meta_title_ed">Meta Title</label>
                <input type="text" name="meta_title_ed" class="form-control meta_title_ed" id="meta_title_ed" placeholder="Enter meta title">
            </div>
            <div class="form-group">
                <label for="meta_description_ed" class="d-flex justify-content-between">Meta Description <span id="characterCount">Character count: 0</span></label>
                <textarea name="meta_description_ed" class="form-control meta_description_ed" id="meta_description_ed" placeholder="Enter meta description"></textarea>

            </div>
            <div class="form-group">
                <label for="meta_keywords_ed" class="d-flex justify-content-between">Meta keywords <span id="metakeywordcharacterCount">Character count: 0</span></label>
                <input type="text" name="meta_keywords_ed" class="form-control meta_keywords_ed" id="meta_keywords_ed" placeholder="Enter meta keywords">
            </div>
            <div class="form-group">
                <label for="page_url_ed">Page Url</label>
                <input type="url" name="page_url_ed" class="form-control page_url_ed" id="page_url_ed" placeholder="Enter Url"  disabled>
            </div>
         </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" id="edit_submit" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
$(document).ready(function () {
    loaddata();
    var seo_edit ="{{ route('seo_edit', ':id') }}";
    var seo_delete ="{{ route('seo_delete', ':id') }}";
    $("#meta_description").on("input", function() {
        var inputLength = $(this).val().length;
        $("#characterCount").text("Character count: " + inputLength);
    });

    $("#meta_keywords").on("input", function() {
        var input = $(this).val().length;
        $("#metakeywordcharacterCount").text("Character count: " + input);
    });

    $('#submit').click(function (e) {
        e.preventDefault();
        var page_name = $('#page_name').val();
        var meta_title = $('#meta_title').val();
        var meta_description = $('#meta_description').val();
        var meta_keyword = $('#meta_keywords').val();
        var page_url = $('#page_url').val();
        $.ajax({
            type: "post",
            url: "{{ route('search_engine_store') }}",
            data: {
                _token : '{{ csrf_token() }}',
                page_name : page_name,
                meta_title : meta_title,
                meta_description : meta_description,
                meta_keyword : meta_keyword,
                page_url : page_url,
            },
            success: function (response) {
                if(response.errors){
                    $.each(response.errors, function (field, error) {
                        if (field === 'meta_description') {
                            var textareaField = $('textarea[name="' + field + '"]');
                            textareaField.addClass('is-invalid');
                            textareaField.after('<div class="invalid-feedback">' + error[0] + '</div>');
                        } else {
                            var inputField = $('input[name="' + field + '"]');
                            inputField.addClass('is-invalid');
                            inputField.after('<div class="invalid-feedback">' + error[0] + '</div>');
                        }
                    });
                } else {
                    $('.formSeo').find("input[type=text], textarea, input[type=url]").val("");
                    $('.modal').modal('hide');
                    $('.success').html('<div class="alert alert-success" id="success" role="alert">'+response.success+'</div>');
                    loaddata(); // Load data again after a successful submission
                }
            }
        });
    });
    $('.table_data').on('click', '.btn_edit', function(e){
        e.preventDefault();
        var id = $(this).data('seo-id');
        var url = seo_edit.replace(':id', id);
        $.get(url, function (data) {
            $('.id').val(data.id);
            $('.page_name_ed').val(data.page_name);
            $('.meta_title_ed').val(data.meta_title);
            $('.meta_description_ed').val(data.meta_description);
            $('.meta_keywords_ed').val(data.meta_keyword);
            $('.page_url_ed').val(data.page_url);
            $('#editModel').modal('show');
        });
    });
    $('.table_data').on('click','.btn_dlt',function(e){
        e.preventDefault();
        var id = $(this).data('seo-id');
        var url = seo_delete.replace(':id', id);
        var $rowToDelete = $(this).closest('tr');
        $.ajax({
            type: "delete",
            url: url,
            data: {
                _token: '{{ csrf_token() }}',
                id: id,
            },
            success: function (response) {
                if(response.success){
                    $rowToDelete.css('background-color', '#dc3545').fadeOut('slow', function () {
                        $rowToDelete.remove(); // Remove the <tr> after it has faded out
                    });
                }
            }
        });
    });
    $('#edit_submit').click(function (e) {
        e.preventDefault();
        var id = $('#id').val();
        var page_name = $('#page_name_ed').val();
        var meta_title = $('#meta_title_ed').val();
        var meta_description = $('#meta_description_ed').val();
        var meta_keyword = $('#meta_keywords_ed').val();
        var page_url = $('#page_url_ed').val();
        var url= '{{ route("search_engine_update",":id") }}';
        $.ajax({
            type: "put",
            url: url.replace(':id', id),
            data: {
                _token : '{{ csrf_token() }}',
                page_name : page_name,
                meta_title : meta_title,
                meta_description : meta_description,
                meta_keyword : meta_keyword,
                page_url : page_url,
            },
            success: function (response) {
                if(response.errors){
                    $.each(response.errors, function (field, error) {
                        if (field === 'meta_description') {
                            var textareaField = $('textarea[name="' + field + '"]');
                            textareaField.addClass('is-invalid');
                            textareaField.after('<div class="invalid-feedback">' + error[0] + '</div>');
                        } else {
                            var inputField = $('input[name="' + field + '"]');
                            inputField.addClass('is-invalid');
                            inputField.after('<div class="invalid-feedback">' + error[0] + '</div>');
                        }
                    });
                } else {
                    $('.modal').modal('hide');
                    $('.success').html('<div class="alert alert-success" id="success" role="alert">'+response.success+'</div>');
                    loaddata(); // Load data again after a successful submission
                }
            }
        });
    });

});
function loaddata(){
    $.ajax({
        type: "get",
        url: "{{ route('index_data') }}",
        success: function (response) {
            $('.table_data').empty();
            $.each(response.search_engine, function (seo, seo_data) {
                var html =  '<tr>' +
                                '<td>'+seo_data.page_name+'</td>'+
                                '<td>'+seo_data.meta_title+'</td>'+
                                '<td>'+seo_data.meta_description+'</td>'+
                                '<td>'+seo_data.meta_keyword+'</td>'+
                                '<td><button class="btn btn-primary btn-sm btn_edit" data-seo-id="'+seo_data.id+'"><i class="fa fa-edit"></i></button>'+
                                    '<button class="btn btn-danger ml-2 btn-sm btn_dlt" data-seo-id="'+seo_data.id+'"><i class="fa fa-trash"></i></button></td>'+
                            '</tr>';
                $('.table_data').append(html);
            });
        }
    });
}
</script>
@endsection
