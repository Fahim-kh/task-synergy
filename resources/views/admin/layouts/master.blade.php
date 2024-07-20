<!doctype html>
<html lang="en" dir="ltr">
	<head>
		<!-- Meta data -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="" name="description">
		<meta content="" name="author">
		<meta name="keywords" content=""/>

		<!-- Favicon -->
		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('') }}admin/assets/images/brand/favicon.ico" />

		<!-- Title -->
		<title>@yield('page-title') | Mega Resources</title>

		<!--Bootstrap.min css-->
		<link rel="stylesheet" href="{{ asset('') }}admin/assets/plugins/bootstrap/css/bootstrap.min.css">
		<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.css'>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
        <!--Font Awesome-->
		<link href="{{ asset('') }}admin/assets/plugins/fontawesome-free/css/all.css" rel="stylesheet">
		<link href="{{ asset('') }}admin/assets/plugins/accordion/accordion.css" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
		<!-- Dashboard Css -->
		<link href="{{ asset('') }}admin/assets/css/style.css" rel="stylesheet" />
		<link href="{{ asset('') }}admin/assets/css/dark-style.css" rel="stylesheet" />
		<link href="{{ asset('') }}admin/assets/css/color-styles.css" rel="stylesheet" />
		<link href="{{ asset('') }}admin/assets/css/skin-modes.css" rel="stylesheet" />

		<!-- Vector-map -->
		<link href="{{ asset('') }}admin/assets/plugins/jquery.vmap/jqvmap.min.css" rel="stylesheet">

		<!-- p-scroll bar css-->
		<link href="{{ asset('') }}admin/assets/plugins/p-scroll/p-scroll.css" rel="stylesheet" />

		<!-- Sidemenu Css -->
		<link href="{{ asset('') }}admin/assets/css/sidemenu.css" rel="stylesheet">

		<!-- morris Charts Plugin -->
		<link href="{{ asset('') }}admin/assets/plugins/morris/morris.css" rel="stylesheet" />

		<!---Font icons-->
		<link href="{{ asset('') }}admin/assets/plugins/iconfonts/plugin.css" rel="stylesheet" />

		<!-- Sidebar css -->
		<link href="{{ asset('') }}admin/assets/plugins/sidebar/sidebar.css" rel="stylesheet">
		<!--Calendar Css -->
		<link href='{{ asset('') }}admin/assets/plugins/fullcalendar/fullcalendar.css' rel='stylesheet' />
		<link href='{{ asset('') }}admin/assets/plugins/fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />
		<!-- Date Picker Plugin -->
		{{-- <link href="{{ asset('') }}admin/assets/plugins/date-picker/date-picker.css" rel="stylesheet" /> --}}
		<!-- COLOR-SKINS -->
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="{{ asset('') }}admin/assets/skins/color-skins/color15.css" />
		<link rel="stylesheet" href="{{ asset('') }}admin/assets/skins/demo.css"/>
		<link type="text/css" rel="stylesheet" href="{{ asset('') }}admin/assets/css/image-uploader.min.css">
		<link rel="stylesheet" href="{{ asset('') }}admin/assets/myStyle.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
	</head>

	<body class="app sidebar-mini sidenav-toggled">
		<!-- Global Loader-->
		<div id="global-loader"><img src="{{ asset('') }}admin/assets/images/svgs/loader.svg" alt="loader"></div>
		<div class="page">
			<div class="page-main">
				<!-- Navbar-->
				<header class="app-header header">
					<!-- Navbar Right Menu-->
					<div class="container-fluid">
						<div class="d-flex">
							<a class="header-brand" href="#" style="color:#fff">
								<img alt="logo" class="header-brand-img main-logo" src="{{ asset('admin/assets/') }}/logo.png">
								<img alt="logo" class="header-brand-img mobile-logo" src="{{ asset('admin/assets/') }}/logo.png">
							</a>
							<!-- Sidebar toggle button-->
							<a aria-label="Hide Sidebar" class="app-sidebar__toggle icon" data-toggle="sidebar" href="#"></a>

							<div class="d-flex order-lg-2 ml-auto">
								<div class="d-sm-flex d-none">
									<a href="#" class="nav-link icon full-screen-link">
										<i class="fe fe-minimize fullscreen-button"></i>
									</a>
								</div>
								{{-- <div class="dropdown d-sm-flex d-none header-message">
									<a class="nav-link icon" data-toggle="sidebar-right" data-target=".sidebar-right">
										<i class="fe fe-bell"></i>
										<span class=" nav-unread badge badge-warning  badge-pill">3</span>
									</a>
								</div> --}}
								<button class="navbar-toggler navresponsive-toggler d-sm-none" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
									aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
									<span class="navbar-toggler-icon fe fe-more-vertical text-white"></span>
								</button>
								<!--Navbar -->
								<div class="dropdown">
									<a class="nav-link pr-0 leading-none d-flex" data-toggle="dropdown" href="#">
										<span class="avatar avatar-md brround cover-image" data-image-src="{{ asset('') }}admin/{{ (auth()->user()->user_image)? 'uploads/user_images/'.auth()->user()->user_image : 'assets/images/users/5.jpg' }}"></span>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
										<div class="drop-heading">
											<div class="text-center">
												<h5 class="text-dark mb-1">{{ auth()->user()->name }}</h5>
												<small class="text-muted">{{  'Admin' }}</small>
											</div>
										</div>
										<div class="dropdown-divider m-0"></div>
										<a class="dropdown-item" href="#"><i class="dropdown-icon fe fe-user"></i>Profile</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"><i class="dropdown-icon fe fe-power"></i> Log Out</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none" >
                                        @csrf
                                        </form>
									</div>
								</div>
								{{-- <div class="dropdown d-md-flex header-settings">
									<a href="#" class="nav-link icon" data-toggle="sidebar-right" data-target=".sidebar-right">
										<i class="fe fe-align-right"></i>
									</a>
								</div> --}}
							</div>
						</div>
					</div>
				</header>
				<!--/.Navbar -->
				<!-- Sidebar menu-->
				<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
				@include('admin.layouts.include.side-bar')
				<!--side-menu-->
				@yield('main-content')
				<!--footer-->
				<footer class="footer">
					<div class="container">
						<div class="row align-items-center flex-row-reverse">
							<div class="col-md-12 col-sm-12 text-center">
								Copyright © @php echo date('Y') @endphp <a href="#">Mega Resources</a>. Designed by <a href="#">Statelyweb Pvt Ltd. UK</a> All rights reserved.
							</div>
						</div>
					</div>
				</footer>
				<!-- End Footer-->
			</div>
		</div>

		<!-- Back to top -->
		<a href="#top" id="back-to-top"><i class="fas fa-angle-up "></i></a>

		<!--Jquery js -->
		<script src="{{ asset('') }}admin/assets/js/jquery.js"></script>

		<!--Jquery.Sparkline js -->
		<script src="{{ asset('') }}admin/assets/js/vendors/jquery.sparkline.min.js"></script>

		<!--Circle-Progress js -->
		<script src="{{ asset('') }}admin/assets/js/vendors/circle-progress.min.js"></script>

		<!--Jquery.rating js -->
		<script src="{{ asset('') }}admin/assets/plugins/jquery.rating/jquery.rating-stars.js"></script>

		<!--Bootstrap.min js-->
		<script src="{{ asset('') }}admin/assets/plugins/bootstrap/popper.min.js"></script>
		<script src="{{ asset('') }}admin/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!-- p-scroll bar js-->
		<script src="{{ asset('') }}admin/assets/plugins/p-scroll/p-scroll.js"></script>
		<script src="{{ asset('') }}admin/assets/plugins/p-scroll/p-scroll-1.js"></script>

		<!-- Sidemenu-responsive-tabs js-->
		<script src="{{ asset('') }}admin/assets/plugins/sidemenu-responsive-tabs/js/sidemenu-responsive-tabs.js"></script>
		<script src="{{ asset('') }}admin/assets/js/left-menu.js"></script>

		<!-- Side menu js -->
		<script src="{{ asset('') }}admin/assets/plugins/sidemenu/js/sidemenu.js"></script>

		<!-- Input Mask js -->
		<script src="{{ asset('') }}admin/assets/plugins/jquery.mask/jquery.mask.min.js"></script>

		<!-- Progress js-->
        <script src="{{ asset('') }}admin/assets/js/vendors/circle-progress.min.js"></script>

		<!-- Chart js -->
		<script src="{{ asset('') }}admin/assets/plugins/chart.js/chart.min.js"></script>
		<script src="{{ asset('') }}admin/assets/plugins/chart.js/chart.extension.js"></script>

		<!--Jquery.knob js-->
		<script src="{{ asset('') }}admin/assets/plugins/othercharts/jquery.knob.js"></script>
		<script src="{{ asset('') }}admin/assets/plugins/othercharts/othercharts.js"></script>

		<!--Echart Plugin -->
		<script src="{{ asset('') }}admin/assets/plugins/echart/echart.js"></script>

		<!--Jquery.sparkline js-->
		<script src="{{ asset('') }}admin/assets/plugins/othercharts/jquery.sparkline.min.js"></script>

		<!-- peitychart -->
		<script src="{{ asset('') }}admin/assets/plugins/peitychart/jquery.peity.min.js"></script>

		<!--Counters -->
		<script src="{{ asset('') }}admin/assets/plugins/counters/counterup.min.js"></script>
		<script src="{{ asset('') }}admin/assets/plugins/counters/waypoints.min.js"></script>

		<!-- Sidebar js -->
		<script src="{{ asset('') }}admin/assets/plugins/sidebar/sidebar.js"></script>
		<script src="{{ asset('') }}admin/assets/plugins/accordion/accordion.min.js"></script>
		<script src="{{ asset('') }}admin/assets/plugins/accordion/accordion.js"></script>

		<!--Index js -->
		<script src="{{ asset('') }}admin/assets/js/index.js"></script>

		<!-- custom js -->
		<script src="{{ asset('') }}admin/assets/js/custom.js"></script>
		<script src="{{ asset('') }}admin/assets/js/select2.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
		<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.7.0/moment.min.js'></script>
        <script src="{{ asset('') }}admin/assets/js/library.js"></script>
		<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
        <script>
            var assetUrl = "{{ asset('admin/uploads/files/') }}";
            var dummyImgUrl = "{{ asset('admin/assets/') }}";

            function alphaOnly(event) {
				var key = event.keyCode;
				return ((key >= 65 && key <= 90) || key == 8 || key == 9 || key == 32);
			}
            function isNumberKey(evt) {
                var charCode = (evt.which) ? evt.which : evt.keyCode
                if (charCode > 31 && (charCode < 48 || charCode > 57 || key == 9))
                    return false;
                return true;
            }
        </script>

		@yield('script')

	</body>
</html>
