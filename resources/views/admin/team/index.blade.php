@extends('admin.layouts.master')
@section('page-title')
View Team
@endsection
@section('main-content')
<div class=" app-content">
  <div class="side-app">
    <!--Page Header-->
    <div class="page-header">
      <h4 class="page-title"><i class="fe fe-grid mr-1"></i> View Team</h4>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"> Team</a></li>
        <li class="breadcrumb-item active" aria-current="page">View Team</li>
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
              {{--            <a class="btn btn-danger btn-xm " id="deleteAll"><i class="fa fa-trash"></i></a> --}}
              {{--  <a id="deleteAll" url="">Delete</a> --}}
            </div>
            <div class="col col-2">
              @if(isset(Auth::user()->hasPer('Team')['pcreate']) && Auth::user()->hasPer('Team')['pcreate'] == 1)
              <a href="{{ route('team.create') }}" style="margin-bottom: 20px; float:right;" class="btn btn-secondary">Create</a>
              @endif
            </div>
          </div>
          <div class="table-responsive ">
            <table id="example-2" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th width="4%"><input type="checkbox" name="" id="checkAll"></th>
                  <th class="wd-15p border-bottom-0">S.No</th>
                  <th class="wd-15p border-bottom-0">Name</th>
                  <th class="wd-20p border-bottom-0">Designation</th>
                  <th class="wd-20p border-bottom-0">Team Image</th>
                  <th class="wd-15p border-bottom-0">Status</th>
                  <th class="wd-10p border-bottom-0">Action</th>

                </tr>
              </thead>
              <tbody>
                @foreach($team_members as $key => $team)
                <tr>
                  <td><input type="checkbox" name="deleteAll[]" value="{{ $team->id }}" id="" class="checkSingle"></td>
                  <td>{{ $key+1 }}</td>
                  <td>{{ $team->name }}</td>
                  <td>{{ $team->designation }}</td>
                  <td>
                    @if($team->team_img == '')
                    <img src="{{ url('') }}/assets/images/no-image.jpg" class="img-thumbnail" width="150px">
                    @else
                    <img src="{{ url('') }}/uploads/team/{{ $team->team_img }}" class="img-thumbnail" width="150px" alt="{{ $team->team_img }}">
                    @endif
                  </td>
                  <td>
                    <form method="post" action="{{ route('team.status',$team->id) }}">
                      @csrf
                      @method('put')
                      @if($team->status ==0)
                        <button type="submit" class="btn btn-danger btn-lg singleStatus"><i class="fas fa-thumbs-down"></i></button>
                      @else
                        <button type="submit" class="btn btn-info btn-lg singleStatus"><i class="fas fa-thumbs-up"></i></button>
                      @endif
                    </form>
                </td>
                <td>
                  <form method="post" action="{{ route('team.destroy',$team->id) }}">
                    @csrf
                    @method('delete')
                    @if(isset(Auth::user()->hasPer('Team')['pedit']) && Auth::user()->hasPer('Team')['pedit'] == 1)
                      <a href="{{ route('team.edit',$team->id) }}" class="btn btn-info btn-sm "><i class="fas fa-check"></i> Edit</a>
                    @endif
                    @if(isset(Auth::user()->hasPer('Team')['pdelete']) && Auth::user()->hasPer('Team')['pdelete'] == 1)
                      <button class="btn btn-danger btn-flat btn-sm singleDelete"> <i class="fa fa-trash"></i></button>
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


    @endsection
    @section('scripts')
    
    @endsection
