<!DOCTYPE html>
<html lang="en">

<head>
    <title>Link the sink - Dashboard - @yield('head-title')</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="icon" href="{{ url('assets/images/favicon.ico') }}" type="image/x-icon">

    <!-- vendor css -->
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
    
    

</head>
<body class="">
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<!-- [ Pre-loader ] End -->
	<!-- [ navigation menu ] start -->
	<nav class="pcoded-navbar  ">
		<div class="navbar-wrapper  ">
			<div class="navbar-content scroll-div " >
				
				<div class="">
					<div class="main-menu-header">
						<img class="img-radius" src="{{ url($_SESSION['user']['avatar']) }}" alt="User-Profile-Image">
						<div class="user-details">
							<span>{{ $_SESSION['user']['username'] }}</span>
							<div id="more-details">Admin <i class="fa fa-chevron-down m-l-5"></i></div>
						</div>
					</div>
					<div class="collapse" id="nav-user-link">
						<ul class="list-unstyled">
							<li class="list-group-item"><a href="#!"><i class="feather icon-settings m-r-5"></i>Settings</a></li>
							<li class="list-group-item"><a href="auth-normal-sign-in.html"><i class="feather icon-log-out m-r-5"></i>Logout</a></li>
						</ul>
					</div>
				</div>
				
				<ul class="nav pcoded-inner-navbar ">
					<li class="nav-item pcoded-menu-caption">
						<label>Navigation</label>
					</li>
					<li class="nav-item">
					    <a href="{{ route('admin') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
					</li>
					
					<li class="nav-item pcoded-menu-caption">
						<label>UI Element</label>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Basic</span></a>
						<ul class="pcoded-submenu">
							
							
							<li><a href="{{ route('admin_requests') }}">Posts Requests</a></li>
							<li><a href="{{ route('call') }}">Call Center</a></li>
							
							
							
						</ul>
					</li>
					<li class="nav-item pcoded-menu-caption">
					    <label>Forms &amp; table</label>
					</li>
					<li class="nav-item">
					    <a href="{{ route('admin_post') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">New Post</span></a>
					</li>
					<li class="nav-item">
					    <a href="{{ route('all_users') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Users Table</span></a>
					</li>
					
					<li class="nav-item pcoded-menu-caption">
						<label>Pages</label>
					</li>
					<li class="nav-item pcoded-hasmenu">
					    <a style="cursor : pointer" class="nav-link "><span class="pcoded-micon"><i class="feather icon-lock"></i></span><span class="pcoded-mtext">Authentication</span></a>
					    <ul class="pcoded-submenu">

					        <li><a href="{{ route('new_admin') }}" >New Admin</a></li>
					        <li><a href="{{ route('new_user') }}" >New User</a></li>
					        
					    </ul>
					</li>
					<li class="nav-item"><a href="{{ route('admin_all_posts') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-sidebar"></i></span><span class="pcoded-mtext">Job posts</span></a></li>

				</ul>
				
				
				
			</div>
		</div>
	</nav>
	<!-- [ navigation menu ] end -->
	<!-- [ Header ] start -->
	<header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">
		
			
				<div class="m-header">
					<a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
					<a href="#!" class="b-brand">
						<!-- ========   change your logo hear   ============ -->
						<img src="{{ url('assets/images/logo.png') }}" alt="" class="logo">
						<img src="{{ url('assets/images/logo-icon.png') }}" alt="" class="logo-thumb">
					</a>
					<a href="#!" class="mob-toggler">
						<i class="feather icon-more-vertical"></i>
					</a>
				</div>
				<div class="collapse navbar-collapse">
					
					<ul class="navbar-nav ml-auto">
						
						<li>
							<div class="dropdown drp-user">
								<a href="{{ route('home') }}" class="dud-logout" title="Logout">
                                    <i class="feather icon-home"></i>
                                </a>
								
							</div>
						</li>
					</ul>
				</div>
				
			
	</header>
	<!-- [ Header ] end -->
	
	

<!-- [ Main Content ] start -->
        <div class="pcoded-main-container">
            <div class="pcoded-content">
                <!-- [ breadcrumb ] start -->
                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">Dashboard - @yield('title') - Managment</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin') }}"><i class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a>@yield('slug')</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ breadcrumb ] end -->
                <!-- [ Main Content ] start -->
                    @yield('content')
                <!-- [ Main Content ] end -->
            </div>
        </div>

    <!-- Required Js -->
    <script src="{{ url('assets/js/vendor-all.min.js') }}"></script>
    <script src="{{ url('assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ url('assets/js/pcoded.min.js') }}"></script>

<!-- Apex Chart -->
	<script src="{{ url('assets/js/plugins/apexcharts.min.js') }}"></script>


	<!-- custom-chart js -->
	<script src="{{ url('assets/js/pages/dashboard-main.js') }}"></script>

	<script src="{{ url('js/admin.js') }}"></script>
	
	<script src="{{ url('assets/js/pages/chart-apex.js') }}"></script>	
</body>

</html>



