<!DOCTYPE html>
<html dir="rtl" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Erfan Ebrahimi">

    <title>{{ __('Atlantis Retro') }} - @hasSection('title') @yield('title') @else {{ __('Home') }} @endif</title>

    {{--Scripts which must load before full loading--}}
    @style('/assets/CDN/CSS/animate.min.css')
    @script('/assets/CDN/JS/html5shiv.js')
    @script('/assets/CDN/JS/respond.min.js')
    @script('/assets/CDN/JS/alpine.min.js')
    @script("/assets/admin/js/ckeditor.min.js")

    {{--Styles--}}
    @style("/assets/admin/css/style.min.css")
    @style("/assets/admin/css/rtl.css")
    @style("https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font@v27.2.1/dist/font-face.css")
    @livewireStyles
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
                        <span class="logo-text">Atlantis Retro</span>
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
                            <span>Hello, @user('username')</span>
                            <img class="img-fluid  rounded-circle " width="50" height="50" src="https://cdn.discordapp.com/avatars/@user('id')/@user('avatar').webp?size=64" alt="">

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
                            <span class="hide-menu">داشبورد</span>
                        </a>
                    </li>
                    @if ( auth()->user()->isAdmin() )
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="@route(getRouteName().'.home')" aria-expanded="false">
                                <i class="fa fa-lock"></i>
                                <span class="hide-menu">پنل مدیریت</span>
                            </a>
                        </li>
                    @endif
                    <li class="sidebar-item @isActive('history', 'selected')">
                        <a class="sidebar-link @isActive('history', 'active') " href="@route('history')" aria-expanded="false">
                            <i data-feather="globe" class="feather-icon"></i>
                            <span class="hide-menu">تاریخچه تراکنش ها</span>
                        </a>
                    </li>
                    <li class="sidebar-item @isActive('backHistory', 'selected')">
                        <a class="sidebar-link @isActive('backHistory', 'active') " href="@route('backHistory')" aria-expanded="false">
                            <i data-feather="user" class="feather-icon"></i>
                            <span class="hide-menu">زندگی نامه کارکتر</span>
                        </a>
                    </li>
                    <li class="sidebar-item @isActive('donate', 'selected')">
                        <a class="sidebar-link @isActive('donate', 'active') " href="@route('donate')" aria-expanded="false">
                            <i data-feather="gift" class="feather-icon"></i>
                            <span class="hide-menu">حمایت مالی</span>
                        </a>
                    </li>
                    @if ( env('FIVEMLINK' , false) )
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ env('FIVEMLINK') }}" aria-expanded="false">
                                <svg  width="24" height="24" style="margin-right: 8px;color: rgb(255, 111, 0);" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>FiveM</title><path d="M22.4 24h-5.225c-.117 0-.455-1.127-1.026-3.375-1.982-6.909-3.124-10.946-3.417-12.12l3.37-3.325h.099c.454 1.42 2.554 7.676 6.299 18.768ZM12.342 7.084h-.048a3.382 3.385 0 0 1-.098-.492v-.098a102.619 102.715 0 0 1 3.272-3.275c.13.196.196.356.196.491v.05a140.694 140.826 0 0 1-3.322 3.324ZM5.994 10.9h-.05c.67-2.12 1.076-3.209 1.223-3.275L14.492.343c.08 0 .258.524.533 1.562zm1.37-4.014h-.05C8.813 2.342 9.612.048 9.71 0h4.495v.05a664.971 664.971 0 0 1-6.841 6.839Zm-2.69 7.874h-.05c.166-.798.554-1.418 1.174-1.855a312.918 313.213 0 0 1 5.71-5.717h.05c-.117.672-.375 1.175-.781 1.52zM1.598 24l-.098-.05c1.399-4.172 2.148-6.322 2.248-6.45l6.74-6.694v.05C10.232 11.88 8.974 16.263 6.73 24Z" fill="#ff6f00"></path></svg>
                                <span class="hide-menu" style="color: rgb(255, 111, 0);">ورود به سرور</span>
                            </a>
                        </li>
                    @endif
                    @if ( env('DISCORD' , false) )
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ env('DISCORD') }}" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="margin-right: 8px;" fill="currentColor" class="bi bi-discord" viewBox="0 0 16 16">
                                <path d="M13.545 2.907a13.227 13.227 0 0 0-3.257-1.011.05.05 0 0 0-.052.025c-.141.25-.297.577-.406.833a12.19 12.19 0 0 0-3.658 0 8.258 8.258 0 0 0-.412-.833.051.051 0 0 0-.052-.025c-1.125.194-2.22.534-3.257 1.011a.041.041 0 0 0-.021.018C.356 6.024-.213 9.047.066 12.032c.001.014.01.028.021.037a13.276 13.276 0 0 0 3.995 2.02.05.05 0 0 0 .056-.019c.308-.42.582-.863.818-1.329a.05.05 0 0 0-.01-.059.051.051 0 0 0-.018-.011 8.875 8.875 0 0 1-1.248-.595.05.05 0 0 1-.02-.066.051.051 0 0 1 .015-.019c.084-.063.168-.129.248-.195a.05.05 0 0 1 .051-.007c2.619 1.196 5.454 1.196 8.041 0a.052.052 0 0 1 .053.007c.08.066.164.132.248.195a.051.051 0 0 1-.004.085 8.254 8.254 0 0 1-1.249.594.05.05 0 0 0-.03.03.052.052 0 0 0 .003.041c.24.465.515.909.817 1.329a.05.05 0 0 0 .056.019 13.235 13.235 0 0 0 4.001-2.02.049.049 0 0 0 .021-.037c.334-3.451-.559-6.449-2.366-9.106a.034.034 0 0 0-.02-.019Zm-8.198 7.307c-.789 0-1.438-.724-1.438-1.612 0-.889.637-1.613 1.438-1.613.807 0 1.45.73 1.438 1.613 0 .888-.637 1.612-1.438 1.612Zm5.316 0c-.788 0-1.438-.724-1.438-1.612 0-.889.637-1.613 1.438-1.613.807 0 1.451.73 1.438 1.613 0 .888-.631 1.612-1.438 1.612Z"/>
                            </svg>
                            <span class="hide-menu">دیسکورد</span>
                        </a>
                    </li>
                    @endif
                    <li class="list-divider"></li>
                    <li class="sidebar-item">
                        <a href="@route(getRouteName().'.logout')" class="sidebar-link sidebar-link" onclick="event.preventDefault(); document.querySelector('#logout').submit()" aria-expanded="false">
                            <i data-feather="log-out" class="feather-icon"></i>
                            <span class="hide-menu">خروج</span>
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
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger">
                    {!!  implode('', $errors->all('<div>:message</div>')) !!}
                </div>
            @endif
            @if( ! auth()->user()->isAccept())
                <div class="alert alert-danger @isActive('backHistory', 'd-none')">
                    <a href="@route('backHistory')">لطفا فرم خود را پرکنید</a>
                </div>
            @endif
            @yield('content')

        </div>
        <!-- End Container fluid  -->

        <!-- footer -->
        <footer class="footer text-center text-muted" style="direction: ltr"> Developed by <a href="https://coffeebede.ir/erfun">Erfan Ebrahimi </a>& <a href="https://coffeebede.ir/mo13ammad">Mohammad Saadati.</a></footer>

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
@livewireScripts
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
