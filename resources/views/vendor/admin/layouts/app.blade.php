<!DOCTYPE html>
<html dir="{{ config('easy_panel.rtl_mode') ? 'rtl' : 'ltr' }}" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Erfan Ebrahimi">

    <title>{{ __('EasyPanel') }} - {{ $title ?? __('Home') }}</title>

    {{--Scripts which must load before full loading--}}
    @style('/assets/CDN/CSS/animate.min.css')
    @script('/assets/CDN/JS/html5shiv.js')
    @script('/assets/CDN/JS/respond.min.js')
    @script('/assets/CDN/JS/alpine.min.js')
    @script("/assets/admin/js/ckeditor.min.js")

    {{--Styles--}}
    @livewireStyles
    @style("/assets/admin/css/style.min.css")
    @if(config('easy_panel.rtl_mode'))
        @style("/assets/admin/css/rtl.css")
        @style("https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font@v27.2.1/dist/font-face.css")
    @endif
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
                    <a href="@route(getRouteName().'.home')">
                        <span class="logo-text">{{ __('EasyPanel') }}</span>
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

                    @if ( count(\EasyPanel\Support\Contract\LangManager::getLanguages()) > 1 )
                    <li class="nav-item d-none d-md-block">
                        <a class="nav-link" href="javascript:void(0)">
                            <div class="customize-input">
                                <select id="langChanger" class="form-control bg-white custom-shadow border-0 h-25" style="border-radius: 6px">
                                    @foreach(\EasyPanel\Support\Contract\LangManager::getLanguages() as $key => $value)
                                        <option value="{{ $key }}" {{ \Illuminate\Support\Facades\App::getLocale() === $key ? 'selected' : '' }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                                <script>
                                    document.getElementById('langChanger').addEventListener('change', function (){
                                        window.location.href = "{{ route('admin.setLang') }}?lang=" + this.value;
                                    });
                                </script>
                            </div>
                        </a>
                    </li>
                    @endif

                    <!-- User profile and search -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                                <span class="ml-2 d-none d-lg-inline-block"><span>{{ __('Hello') }},</span> <span
                                        class="text-dark">@user('username')</span> <i data-feather="chevron-down"
                                                                                  class="svg-icon"></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right user-dd animated pb-0 flipInY">
                            <a class="dropdown-item" href="javascript:void(0)"
                               onclick="event.preventDefault(); document.querySelector('#logout').submit()"><i
                                    data-feather="power"
                                    class="svg-icon mr-2 ml-1"></i>
                                {{ __('Logout') }}</a>
                            <form id="logout" action="@route(getRouteName().'.logout')" method="post"> @csrf </form>
                        </div>
                    </li>
                    <!-- User profile and search -->
                </ul>
            </div>
        </nav>
    </header>
    <!-- End Topbar header -->

    <!-- Left Sidebar -->
@include('admin::layouts.sidebar')
<!-- End Left Sidebar -->


    <!-- Page wrapper  -->
    <div class="page-wrapper">

        <!-- Container -->
        <div class="container-fluid">

            {{ $slot }}

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
    window.addEventListener('show-message', function (event) {
        let type = event.detail.type;
        let message = event.detail.message;
        if (document.querySelector('.notification')) {
            document.querySelector('.notification').remove();
        }
        let body = document.querySelector('#main-wrapper');
        let child = document.createElement('div');
        child.classList.add('notification', 'notification-' + type, 'animate__animated', 'animate__jackInTheBox');
        child.innerHTML = `<p>${message}</p>`;
        body.appendChild(child);
        setTimeout(function () {
            body.removeChild(child);
        }, 3000);
    });

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
