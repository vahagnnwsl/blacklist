<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Black LIST Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="/admin/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="/admin/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="/admin/css/fontastic.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="/admin/css/grasp_mobile_progress_circle-1.0.0.min.css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="/admin/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="/admin/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="/admin/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="/admin/img/favicon.ico">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

    @stack('css')

</head>
<body>
<!-- Side Navbar -->
<nav class="side-navbar">
    <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
            <!-- User Info-->
            <div class="sidenav-header-inner text-center">
                <h2 class="h5">BLACK LIST</h2>
            </div>
            <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center">
                    <strong>B</strong><strong class="text-primary">L</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
            <ul id="side-main-menu" class="side-menu list-unstyled">
                <li class="{{ request()->is('dashboard/users*') || request()->is('dashboard') ? 'active': ''}}"><a
                        href="{{route('users.index')}}"> <i class="icon-user"></i>Пользователи</a></li>
                <li class="{{ request()->is('dashboard/arendators*') ? 'active': ''}} mt-1"><a
                        href="{{route('arendators.index')}}"> <i class="icon-user"></i>Арендаторы</a></li>
                <li class="{{ request()->is('dashboard/clients*') ? 'active': ''}} mt-1"><a
                        href="{{route('clients.index')}}"> <i class="icon-user"></i>Клиент</a></li>
                <li class="{{ request()->is('dashboard/pages*') ? 'active': ''}} mt-1"><a
                        href="{{route('pages.index')}}"> <i class="icon-user"></i>Страницы</a></li>
            </ul>


        </div>

    </div>
</nav>
<div class="page">
    <!-- navbar-->
    <header class="header">
        <nav class="navbar">
            <div class="container-fluid">
                <div class="navbar-holder d-flex align-items-center justify-content-between">
                    <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i
                                class="icon-bars"> </i></a><a href="#" class="navbar-brand">
                            <div class="brand-text d-none d-md-inline-block"><span> </span></div>
                        </a></div>
                    <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                        <li class="nav-item"><a href="{{ route('logout') }}" class="nav-link logout" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> <span
                                    class="d-none d-sm-inline-block">Выйти</span><i class="fa fa-sign-out"></i></a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <section>
        @include('flash::message')

        @yield('content')
    </section>
    <footer class="main-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <p>Your company &copy; 2017-2019</p>
                </div>
                <div class="col-sm-6 text-right">

                </div>
            </div>
        </div>
    </footer>
</div>
<!-- JavaScript files-->
<script src="/admin/vendor/jquery/jquery.min.js"></script>
<script src="/admin/vendor/popper.js/umd/popper.min.js"></script>
<script src="/admin/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="/admin/js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
<script src="/admin/vendor/jquery.cookie/jquery.cookie.js"></script>
<script src="/admin/vendor/chart.js/Chart.min.js"></script>
<script src="/admin/vendor/jquery-validation/jquery.validate.min.js"></script>
<script src="/admin/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- Main File-->
<script src="/admin/js/front.js"></script>
@stack('scripts')
</body>
</html>
