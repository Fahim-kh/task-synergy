@extends('admin.layouts.master')
@section('page-title')
    View Services
@endsection

@section('main-content')
    <div class=" app-content">
        <div class="side-app">
            <!--Page Header-->
            <div class="page-header">
                <h4 class="page-title"><i class="fe fe-grid mr-1"></i> View Services</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"> Services</a></li>
                    <li class="breadcrumb-item active" aria-current="page">View Services</li>
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
                                    @if (isset(Auth::user()->hasPer('Services')['pcreate']) && Auth::user()->hasPer('Services')['pcreate'] == 1)
                                        <a href="{{ route('services.create') }}" style="margin-bottom: 20px; float:right;"
                                            class="btn btn-secondary">Create</a>
                                    @endif
                                </div>
                            </div>
                            <div class="table-responsive ">
                                <table id="example-2" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="5%" class="border-bottom-0">S.No</th>
                                            <th width="20%"class="border-bottom-0">Image</th>
                                            <th width="20%"class="border-bottom-0">Heading</th>
                                            <th width="20%"class="border-bottom-0">Featured</th>
                                            <th width="15%"class="border-bottom-0">Status</th>
                                            <th width="20%"class="border-bottom-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($services as $key => $service)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td><img src="{{ asset('uploads/services') }}/{{ $service->image }}"
                                                        alt="service" width="100" height="100"></td>
                                                <td>
                                                    {{ $service->name }} <br>
                                                    <br>
                                                    <a href="{{ route('subservices.index') }}"><span class="badge badge-success p2">Sub Services</span></a>

                                                </td>
                                                <td>{{ $service->featured == 1 ? 'YES' : 'NO' }}</td>
                                                <td>
                                                    <form method="post"
                                                        action="{{ route('services.status', $service->id) }}">
                                                        @csrf
                                                        @method('put')
                                                        @if ($service->status == 0)
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
                                                    <form method="post"  action="{{ route('services.destroy', $service->id) }}">
                                                        @csrf
                                                        @method('delete')
                                                        @if (isset(Auth::user()->hasPer('Services')['pedit']) && Auth::user()->hasPer('Services')['pedit'] == 1)
                                                            <a href="{{ route('services.edit', $service->id) }}"
                                                                class="btn btn-info btn-flat btn-lg"> <i
                                                                    class="fa fa-edit"></i></a>
                                                        @endif
                                                        @if (isset(Auth::user()->hasPer('Services')['pdelete']) && Auth::user()->hasPer('Services')['pdelete'] == 1)
                                                            <button class="btn btn-danger btn-flat btn-lg singleDelete"><i
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
