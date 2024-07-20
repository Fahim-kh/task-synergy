@extends('admin.layouts.master')
@section('page-title')
Admin Dashboard
@endsection
@section('main-content')
<div class="app-content">
	<div class="side-app">
		<div class="page-header">
			<h3 class="page-title"><i class="fe fe-home mr-1"></i>Dashboard</h3>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
			</ol>
		</div>
		@include('admin.layouts.include.message')
		<div class="card">
			<div class="card-header">
				Analytics comming soon!
			</div>
			
		</div>
	</div>
</div>
@endsection
@section('script')
@endsection
