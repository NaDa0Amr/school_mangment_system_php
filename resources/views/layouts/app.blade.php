<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title', config('app.name', 'Laravel'))</title>
      <title>Flexy Free Bootstrap Admin Template by WrapPixel</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	@vite(['resources/css/app.css','resources/js/app.js'])
	<!-- Bootstrap Icons -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	@stack('styles')
	<style>
    body { background: #f8f9fa; margin: 0; min-height: 100vh; display: flex; flex-direction: column; }
    .navbar-brand span { font-weight: 600; letter-spacing: .5px; }
    footer { font-size: .85rem; color:#6c757d; }
    .body-wrapper { flex: 1 0 auto; min-height: 80vh; display: flex; flex-direction: column; }
    main.container { flex: 1 0 auto; min-width: 0; min-height: 60vh; }
    aside.left-sidebar { min-height: 100vh; }

    /* Navbar positioning */
    .app-header {
      position: sticky;
      top: 0;
      z-index: 999;
      background: white;
      border-bottom: 1px solid #e9ecef;
      box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }

    /* Prevent sidebar and main from overlapping */
    @media (min-width: 1200px) {
      .body-wrapper { margin-left: 260px; transition: margin-left 0.3s ease; }
      aside.left-sidebar { position: fixed; left: 0; top: 0; bottom: 0; width: 260px; z-index: 1000; }

      /* When sidebar is closed, adjust navbar */
      .main-wrapper.mini-sidebar .body-wrapper { margin-left: 0; }
    }
    /* Clearfix utility */
    .clearfix::after { content: ""; display: table; clear: both; }

    /* Mini sidebar functionality */
    .main-wrapper .left-sidebar {
      transition: all 0.3s ease;
    }

    .main-wrapper.mini-sidebar .left-sidebar {
      margin-left: -260px;
    }

    .main-wrapper .body-wrapper {
      transition: all 0.3s ease;
    }

    .main-wrapper.mini-sidebar .body-wrapper {
      margin-left: 0;
    }

    /* Close button styling */
    .close-btn {
      padding: 8px;
      border-radius: 4px;
      transition: all 0.2s ease;
    }

    .close-btn:hover {
      background-color: rgba(0,0,0,0.1);
    }

    .cursor-pointer {
      cursor: pointer;
    }

    /* Navbar toggle button styling */
    .sidebartoggler {
      position: relative;
      padding: 8px 12px !important;
      border-radius: 6px;
      transition: all 0.3s ease;
      color: #6c757d;
    }

    .sidebartoggler:hover {
      background-color: rgba(0,0,0,0.05);
      color: #1e4db7;
      transform: scale(1.05);
    }

    .sidebartoggler i {
      font-size: 18px;
      transition: transform 0.3s ease;
    }

    /* Rotate icon when sidebar is closed */
    .main-wrapper.mini-sidebar .sidebartoggler i {
      transform: rotate(180deg);
    }

    /* Hide navbar toggle button when sidebar is open */
    .main-wrapper:not(.mini-sidebar) #sidebarToggle {
      opacity: 0;
      visibility: hidden;
      transform: translateX(-20px);
      transition: all 0.3s ease;
    }

    /* Show navbar toggle button only when sidebar is closed */
    .main-wrapper.mini-sidebar #sidebarToggle {
      opacity: 1;
      visibility: visible;
      transform: translateX(0);
      transition: all 0.3s ease;
    }

    /* Responsive sidebar toggle */
    @media (max-width: 1199px) {
      .left-sidebar {
        margin-left: -260px;
        transition: all 0.3s ease;
      }

      .main-wrapper:not(.mini-sidebar) .left-sidebar {
        margin-left: 0;
      }

      .body-wrapper {
        margin-left: 0 !important;
      }

      /* On mobile, always show the original toggle button and hide our custom one */
      #sidebarToggle {
        opacity: 0 !important;
        visibility: hidden !important;
        pointer-events: none;
      }

      #headerCollapse {
        opacity: 1 !important;
        visibility: visible !important;
      }

      /* Mobile sidebar overlay when open */
      .main-wrapper:not(.mini-sidebar)::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.5);
        z-index: 999;
        opacity: 1;
        visibility: visible;
        transition: all 0.3s ease;
      }
    }

    /* On desktop, hide the original mobile toggle */
    @media (min-width: 1200px) {
      #headerCollapse {
        opacity: 0 !important;
        visibility: hidden !important;
        pointer-events: none;
      }

      /* Ensure navbar adjusts when sidebar is toggled */
      .app-header {
        transition: all 0.3s ease;
      }
    }
    /* User avatar (icon) */
    .nav-user-toggle .avatar-icon {
      width: 35px;
      height: 35px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      border-radius: 50%;
      font-size: 18px;
      background: var(--bs-primary-bg-subtle, #e7f1ff);
      color: #0d6efd;
      border: 1px solid rgba(13,110,253,.15);
      transition: all .25s ease;
    }
    .nav-user-toggle:hover .avatar-icon { background:#0d6efd; color:#fff; }

    /* User dropdown styling */
    .user-dropdown { min-width: 260px; overflow:hidden; border:1px solid rgba(0,0,0,.05); }
    .user-dropdown .dropdown-header { background:#0d6efd; color:#fff; }
    .user-dropdown .dropdown-header small { opacity:.85; }
    .user-dropdown .list-group-item { border:0; border-bottom:1px solid #f1f3f5; font-size:.9rem; }
    .user-dropdown .list-group-item:last-child { border-bottom:0; }
    .user-dropdown form button { width:100%; }
    .user-dropdown .avatar-initial { width:42px; height:42px; border-radius:50%; background:#fff; color:#0d6efd; display:flex; align-items:center; justify-content:center; font-weight:600; box-shadow:0 0 0 2px rgba(255,255,255,.35); }
  </style>
</head>
<body>
  <!--  Main wrapper -->
  <div class="main-wrapper " id="main-wrapper">
      <!-- Sidebar Start -->
    <aside class="left-sidebar  ">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between ">
          <a href="{{ route('home') }}" class="text-nowrap logo-img">
            <img src="{{ asset('assets/images/logos/logo.svg') }}" alt="" />
          </a>
          <div class="close-btn d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-6"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar " data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('home') }}" aria-expanded="false">
                <i class="ti ti-menu"></i>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <!-- ---------------------------------- -->
            <!-- Dashboard -->
            <!-- ---------------------------------- -->
        <li class="sidebar-item">
      <a class="sidebar-link" href="{{ route('doctors.index') }}">
                <div class="d-flex align-items-center gap-3">
                  <span class="d-flex">
        <i class="ti ti-id-badge-2"></i>
                  </span>
                  <span class="hide-menu">Doctors</span>
                </div>

              </a>
            </li>
            <li class="sidebar-item">
      <a class="sidebar-link" href="{{ route('students.index') }}">
                <div class="d-flex align-items-center gap-3">
                  <span class="d-flex">
        <i class="ti ti-school"></i>
                  </span>
                  <span class="hide-menu">Students</span>
                </div>

              </a>
            </li>
            <li class="sidebar-item">
      <a class="sidebar-link" href="{{ route('courses.index') }}">
                <div class="d-flex align-items-center gap-3">
                  <span class="d-flex">
        <i class="ti ti-book"></i>
                  </span>
                  <span class="hide-menu">Courses</span>
                </div>

              </a>
            </li>
               <li class="sidebar-item">
      <a class="sidebar-link" href="{{ route('employees.index') }}">
                <div class="d-flex align-items-center gap-3">
                  <span class="d-flex">
        <i class="ti ti-briefcase"></i>
                  </span>
                  <span class="hide-menu">Employees</span>
                </div>

              </a>
            </li>
               <li class="sidebar-item">
      <a class="sidebar-link" href="{{ route('departments.index') }}">
                <div class="d-flex align-items-center gap-3">
                  <span class="d-flex">
        <i class="ti ti-building"></i>
                  </span>
                  <span class="hide-menu">Departments</span>
                </div>


              </a>
            </li>
            @auth
              @if(Auth::user()->isAdmin())
              <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('users.index') }}">
                  <div class="d-flex align-items-center gap-3">
                    <span class="d-flex">
                      <i class="ti ti-users"></i>
                    </span>
                    <span class="hide-menu">Users</span>
                  </div>
                </a>
              </li>
              @endif
            @endauth
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
	   <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <!-- Sidebar Toggle Button - Always Visible -->
            <li class="nav-item d-block">
              <a class="nav-link sidebartoggler" id="sidebarToggle" href="javascript:void(0)" title="Toggle Sidebar">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler " id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link " href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="ti ti-bell"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
              <div class="dropdown-menu dropdown-menu-animate-up" aria-labelledby="drop1">
                <div class="message-body">
                  <a href="javascript:void(0)" class="dropdown-item">
                    Item 1
                  </a>
                  <a href="javascript:void(0)" class="dropdown-item">
                    Item 2
                  </a>
                </div>
              </div>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">

              <li class="nav-item dropdown">
                  <a class="nav-link nav-user-toggle p-0" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="avatar-icon"><i class="ti ti-user"></i></span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up user-dropdown shadow" aria-labelledby="drop2">
                    @auth
                    <div class="dropdown-header px-3 py-3 d-flex align-items-center gap-3">
                      <div class="avatar-initial">
                        {{ strtoupper(substr(Auth::user()->name,0,1)) }}
                      </div>
                      <div>
                        <div class="fw-semibold">{{ Auth::user()->name }}</div>
                        @if(Auth::user()->email)
                          <small>{{ Auth::user()->email }}</small>
                        @endif
                      </div>
                    </div>
                    <div class="px-3 py-2">
                      <form action="{{ route('logout') }}" method="POST" class="m-0 p-0">
                        @csrf
                        <button type="submit" class="btn btn-outline-primary btn-sm">Logout</button>
                      </form>
                    </div>
                    @endauth
                    @guest
                    <div class="px-3 py-3 text-center">
                      <a href="{{ route('login') }}" class="btn btn-primary w-100 btn-sm">Login</a>
                    </div>
                    @endguest
                  </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->


	<main class="container mb-5 mt-3">
		@if (session('status'))
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				{{ session('status') }}
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		@endif
		@yield('content')
	</main>

	<footer class="text-center py-3 border-top bg-white">
		<div class="container">
			&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
		</div>
	</footer>
    </div>
    <!--  Main wrapper End -->
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
  <script src="{{ asset('assets/js/app.min.js') }}"></script>
  <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/libs/simplebar/dist/simplebar.js') }}"></script>

  <!-- solar icons -->
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
	@stack('scripts')
</body>
</html>
