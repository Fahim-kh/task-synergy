@extends('admin.layouts.master')
@section('page-title')
    View FAQ's
@endsection

@section('main-content')
    <div class=" app-content">
        <div class="side-app">
            <!--Page Header-->
            <div class="page-header">
                <h4 class="page-title"><i class="fe fe-grid mr-1"></i> View FAQ's</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"> FAQ's</a></li>
                    <li class="breadcrumb-item active" aria-current="page">View FAQ's</li>
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
                            <form method="post" action="{{ route('faq.store') }}">
                                @csrf
                                <div class="form-group row  @error('type') has-error @enderror">
                                    <label for="type" class="col-md-2 col-form-label">Type</label>
                                    <div class="col-md-10">
                                        <select name="type" id="type" class="form-control">
                                            <option value="default">Default</option>
                                            <option value="Over-Night Care">Over-Night Care</option>
                                            <option value="Live-In Care">Live-In Care</option>
                                            <option value="Live-In Care Placements">Live-In Care Placements</option>
                                            <option value="Funding & Process">Funding & Process</option>
                                        </select>
                                    </div>
                                    @error('type')
                                        <div class="label label-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group row  @error('question') has-error @enderror">
                                    <label for="answer" class="col-md-2 col-form-label">Question</label>
                                    <div class="col-md-10">
                                        <input type="text" id="answer" class="form-control" name="question"
                                            placeholder="Enter Question">
                                    </div>
                                    @error('question')
                                        <div class="label label-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group row  @error('answer') has-error @enderror">
                                    <label for="answer" class="col-md-2 col-form-label">Answer</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control answer" name="answer" id="word_count"></textarea>
                                    </div>
                                    @error('answer')
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
                                <div class="form-group mb-0 mt-2 row justify-content-end">
                                    <div class="col-md-10">
                                        <button type="submit" id="submit" class="btn btn-info">Save</button>
                                        <a href="{{ route('faq.index') }}" class="btn btn-danger">Clear</a>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive " style="padding:20px;">
                                <table id="example-2" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="1%" class="border-bottom-0">S.No</th>
                                            <th width="20%"class="border-bottom-0">FAQ's</th>
                                            <th width="2%"class="border-bottom-0">Status</th>
                                            <th width="5%"class="border-bottom-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($faqs as $key => $faq)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>
                                                    <div id="accordion" class="w-100 ">
                                                        <div class="card mb-0 border">
                                                            <div class="accor bg-info" id="headingOne">
                                                                <h5 class="m-0">
                                                                    <a href="#collapse{{ $key }}"
                                                                        class="text-white collapsed" data-toggle="collapse"
                                                                        aria-expanded="false" aria-controls="collapse">
                                                                        {{ $faq->question }}
                                                                    </a>
                                                                </h5>
                                                            </div>
                                                            <div id="collapse{{ $key }}" class="collapse"
                                                                aria-labelledby="headingOne" data-parent="#accordion"
                                                                style="">
                                                                <div class="card-body">
                                                                    {{ $faq->answer }}
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </td>
                                                <td>
                                                    <form method="post" action="{{ route('faq.status', $faq->id) }}">
                                                        @csrf
                                                        @method('put')
                                                        @if ($faq->status == 0)
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
                                                    <form method="post" action="{{ route('faq.destroy', $faq->id) }}">
                                                        @csrf
                                                        @method('delete')
                                                        @if (isset(Auth::user()->hasPer('Faqs')['pedit']) && Auth::user()->hasPer('Faqs')['pedit'] == 1)
                                                            <a href="{{ route('faq.edit', $faq->id) }}"
                                                                class="btn btn-info btn-flat btn-lg"> <i
                                                                    class="fa fa-edit"></i></a>
                                                        @endif
                                                        @if (isset(Auth::user()->hasPer('Faqs')['pdelete']) && Auth::user()->hasPer('Faqs')['pdelete'] == 1)
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
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('script')
        <script type="text/javascript">
            $(document).ready(function() {
				$('.answer').summernote({
				height: 100, // set editor height
				minHeight: null, // set minimum height of editor
				maxHeight: null, // set maximum height of editor
				focus: true, // set focus to editable area after initializing Summernote
				});
            });
        </script>
    @endsection
