@extends('admin.layouts.master')
@section('page-title')
    View Testimonials
@endsection

@section('main-content')
    <div class=" app-content">
        <div class="side-app">
            <!--Page Header-->
            <div class="page-header">
                <h4 class="page-title"><i class="fe fe-grid mr-1"></i> View Testimonials</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"> Testimonials</a></li>
                    <li class="breadcrumb-item active" aria-current="page">View Testimonials</li>
                </ol>
            </div>
            <!--page header-->
            <div class="row">
                <div class="col-md-12 col-lg-12">

                    @if (session()->has('message'))
                        <div class="alert alert-success flash">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="alert alert-danger flash">
                            {{ session()->get('error') }}
                        </div>
                    @endif
                    @if (session()->has('status'))
                        <div class="alert alert-success flash">
                            {{ session()->get('status') }}
                        </div>
                    @endif
                </div>
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col col-10"></div>
                                <div class="col col-2" style="visibility: visible;">
                                    @if (isset(Auth::user()->hasPer('Testimonial')['pcreate']) && Auth::user()->hasPer('Testimonial')['pcreate'] == 1)
                                        <a href="{{ route('testimonial.create') }}"
                                            style="margin-bottom: 20px; float:right;" class="btn btn-secondary">Create</a>
                                    @endif
                                </div>
                            </div>
                            <div class="table-responsive ">
                                <table id="example-2" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="5%" class="border-bottom-0">S.No</th>
                                            <th width="20%"class="border-bottom-0">Name</th>
                                            <th width="20%"class="border-bottom-0">Designation</th>
                                            <th width="20%"class="border-bottom-0">image</th>
                                            <th width="15%"class="border-bottom-0">Status</th>
                                            <th width="20%"class="border-bottom-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($testimonials as $key => $testimonial)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $testimonial->name }}</td>
                                                <td>{{ $testimonial->designation }}</td>

                                                <td>
                                                    @if ($testimonial->testimonial_image == '')
                                                        <img src="{{ asset('') }}assets/img/no-image.jpg"
                                                            class="img-thumbnail" width="150px">
                                                    @else
                                                        <img src="{{ asset('') }}/uploads/testimonial/{{ $testimonial->testimonial_image }}"
                                                            class="img-thumbnail" width="150px">
                                                    @endif

                                                </td>
                                                <td>
                                                    <form method="post"
                                                        action="{{ route('testimonial.status',$testimonial->id) }}">
                                                        @csrf
                                                        @method('put')
                                                        @if ($testimonial->status == 0)
                                                            <button type="submit"
                                                                class="btn btn-danger btn-lg singleStatus"><i
                                                                    class="fas fa-thumbs-down"></i></button>
                                                        @else
                                                            <button type="submit"
                                                                class="btn btn-info btn-lg singleStatus"><i
                                                                    class="fas fa-thumbs-up"></i></button>
                                                        @endif
                                                    </form>
                                                </td>
                                                <td>
                                                    <form method="post"
                                                        action="{{ route('testimonial.destroy', $testimonial->id) }}">
                                                        @csrf
                                                        @method('delete')
                                                        @if (isset(Auth::user()->hasPer('Testimonial')['pedit']) && Auth::user()->hasPer('Testimonial')['pedit'] == 1)
                                                            <a href="{{ url('') }}/admin/testimonial/{{ $testimonial->id }}/edit"
                                                                class="btn btn-info btn-flat btn-lg"> <i
                                                                    class="fa fa-edit"></i></a>
                                                        @endif
                                                        @if (isset(Auth::user()->hasPer('Testimonial')['pdelete']) && Auth::user()->hasPer('Testimonial')['pdelete'] == 1)
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

@endsection
