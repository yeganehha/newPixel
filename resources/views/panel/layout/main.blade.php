<!DOCTYPE html>
<html dir="rtl" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Erfan Ebrahimi">

    <title>{{ __('NewPixel') }} - @hasSection('title') @yield('title') @else {{ __('Home') }} @endif</title>

    {{--Scripts which must load before full loading--}}
    @style('https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css')
    @script('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    @script('https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
    @script('https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.2/dist/alpine.min.js')
    @script("/assets/admin/js/ckeditor.min.js")

    {{--Styles--}}
    @style("/assets/admin/css/style.min.css")
    @style("/assets/admin/css/rtl.css")
    @style("https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font@v27.2.1/dist/font-face.css")
</head>

<body>

<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>

<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
     data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">

    <!-- Topbar header - style you can find in pages.scss -->
    <header class="topbar" data-navbarbg="skin6">
        <nav class="navbar top-navbar navbar-expand-md">
            <div class="navbar-header" data-logobg="skin6">
                <!-- This is for the sidebar toggle which is visible on mobile only -->
                <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                        class="ti-menu ti-close"></i></a>

                <!-- Logo -->
                <div class="navbar-brand">
                    <a href="@route('dashbaord')">
                        <span class="logo-text">{{ __('dashbaord') }}</span>
                    </a>

                    <div class="container-checkbox">
                        <label class="switch-checkbox">
                            <div class="switch-box">
                                <input type="checkbox" id="dark-switch" name="theme">
                                <div class="toggle"><span></span></div>
                            </div>
                        </label>
                    </div>

                </div>
                <!-- End Logo -->

                <!-- ============================================================== -->
                <!-- Toggle which is visible on mobile only -->
                <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                   data-toggle="collapse" data-target="#navbarSupportedContent"
                   aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                        class="ti-more"></i></a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->

            <div class="navbar-collapse collapse" id="navbarSupportedContent">
                <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                </ul>
                <ul class="navbar-nav float-right">
                    <!-- User profile and search -->
                    <li class="nav-item dropdown">
                        <span class="ml-2 d-none d-lg-inline-block">
                            <img class="img-fluid  rounded-circle " width="50" height="50" src="https://cdn.discordapp.com/avatars/@user('id')/@user('avatar').webp?size=64" alt="">
                            <span>{{ __('Hello') }}, @user('username')</span>
                        </span>
                    </li>
                    <!-- User profile and search -->
                </ul>
            </div>
        </nav>
    </header>
    <!-- End Topbar header -->

    <!-- Left Sidebar -->
    <aside class="left-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li class="sidebar-item @isActive('dashbaord', 'selected')">
                        <a class="sidebar-link @isActive('dashbaord', 'active') " href="@route('dashbaord')" aria-expanded="false">
                            <i data-feather="home" class="feather-icon"></i>
                            <span class="hide-menu">{{ __('Home') }}</span>
                        </a>
                    </li>
                    <li class="sidebar-item @isActive('history', 'selected')">
                        <a class="sidebar-link @isActive('history', 'active') " href="@route('history')" aria-expanded="false">
                            <i data-feather="globe" class="feather-icon"></i>
                            <span class="hide-menu">{{ __('History') }}</span>
                        </a>
                    </li>
                    <li class="list-divider"></li>
                    <li class="sidebar-item">
                        <a href="@route(getRouteName().'.logout')" class="sidebar-link sidebar-link" onclick="event.preventDefault(); document.querySelector('#logout').submit()" aria-expanded="false">
                            <i data-feather="log-out" class="feather-icon"></i>
                            <span class="hide-menu">{{ __('Logout') }}</span>
                        </a>
                        <form id="logout" action="@route(getRouteName().'.logout')" method="post"> @csrf </form>
                    </li>
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>

    <!-- End Left Sidebar -->


    <!-- Page wrapper  -->
    <div class="page-wrapper">

        <!-- Container -->
        <div class="container-fluid">

            @yield('content')

        </div>
        <!-- End Container fluid  -->

        <!-- footer -->
        <footer class="footer text-center text-muted" style="direction: ltr">Developed by <a href="https://erfanebrahimi.ir">Erfan Ebrahimi</a>.</footer>
        <!-- End footer -->
    </div>
</div>
<!-- End Wrapper -->

<!-- All Scripts -->
@script("/assets/admin/js/jquery.min.js")
@script("/assets/admin/js/popper.min.js")
@script("/assets/admin/js/bootstrap.min.js")
@script("/assets/admin/js/perfect-scrollbar.jquery.min.js")
@script("/assets/admin/js/app-style-switcher.min.js")
@script("/assets/admin/js/feather.min.js")
@script("/assets/admin/js/sidebarmenu.min.js")
@script("/assets/admin/js/custom.min.js")

<script>
    let theme = localStorage.getItem('theme');
    setThemeAttributes(theme);

    document.querySelector('#dark-switch')
    && document.querySelector('#dark-switch').addEventListener('change', function (e) {
        let theme = e.target.checked === true ? 'dark' : 'light';
        setThemeAttributes(theme);
        localStorage.setItem('theme', theme);
    });

    function setThemeAttributes(theme){
        if (theme === 'dark') {
            document.querySelector('body').classList.add('dark');
            document.querySelector('#main-wrapper').setAttribute('data-theme', 'dark');
            document.querySelector('#dark-switch').checked = true;
        } else {
            document.querySelector('body').classList.remove('dark');
            document.querySelector('#main-wrapper').setAttribute('data-theme', 'light');
        }
    }
</script>

</body>

</html>
