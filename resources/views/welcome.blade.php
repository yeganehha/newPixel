<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Atlantis Retro</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @style("/assets/admin/css/style.min.css")
    @style("/assets/admin/css/rtl.css")
    @style("https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font@v27.2.1/dist/font-face.css")
</head>

<style>
    html {
        --color-bg: #161923;
        --color-bg-a25: rgba(22,26,35,0.25);
        --color-bg-a50: rgba(22,26,35,0.5);
        --color-bg-a80: rgba(22,26,35,0.8);
        --color-text: ivory;
        --color-text-a10: hsla(60,93%,94%,0.1);
        --color-text-a20: hsla(60,93%,94%,0.2);
        --color-text-a50: hsla(60,93%,94%,0.5);
        --color-text-a75: hsla(60,93%,94%,0.75);
        --color-shadow: rgba(54,20,0,0.2);
        --color-accent-1: #f40552;
        --color-accent-1-a75: rgba(244,5,82,0.75);
        --color-accent-1-a50: rgba(244,5,82,0.5);
        --color-accent-1-a10: rgba(244,5,82,0.1);
        --color-accent-1-s90: #e7064f;
        --color-accent-2: #007892;
        --color-accent-2-a10: rgba(0,120,146,0.1);
        --f1: "Rubik";
        --f2: "Montserrat";
        --fs08: 0.8rem;
        --fs1: 1rem;
        --fs2: 1.2rem;
        --fs3: 1.5rem;
        --fs4: 1.75rem;
        --fs5: 2rem;
        --q: 1rem;
        --qh: .5rem;
        --q2: calc(var(--q)*2);
        --q3: calc(var(--q)*3);
        --q4: calc(var(--q)*4);
        --q5: calc(var(--q)*5);
        --q6: calc(var(--q)*6);
        --q7: calc(var(--q)*7);
        --q8: calc(var(--q)*8);
        --q9: calc(var(--q)*9);
        --q10: calc(var(--q)*10);
        --q11: calc(var(--q)*11);
        --q12: calc(var(--q)*12);
        --q13: calc(var(--q)*13);
        --padding-sides: var(--q4);
        --padding-sides-half: calc(var(--padding-sides)/2);
        --blur-radius: 10px;
        color: var(--color-text);
        font-family: var(--f1);
        font-size: 16px;
    }
    #client-download {
        padding: .5rem 1rem;
        font-weight: 300;
        font-family: var(--f1);
        font-size: var(--fs3);
        cursor: pointer;
        color: var(--color-text);
        background-color: var(--color-accent-1-a10);
        background-size: 50%;
        -webkit-animation: bganim 40s linear 0s infinite;
        animation: bganim 40s linear 0s infinite;
        border: 2px solid var(--color-accent-1);
        -webkit-box-shadow: 0 0 10px 0 var(--color-accent-1-a50);
        box-shadow: 0 0 10px 0 var(--color-accent-1-a50);
        -webkit-backdrop-filter: blur(var(--blur-radius));
        backdrop-filter: blur(var(--blur-radius));
        outline: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        -webkit-transition: background .2s ease;
        -o-transition: background .2s ease;
        transition: background .2s ease;
    }
    #client-download:hover {
        background-color: var(--color-accent-1-s90);
        -webkit-transition: none;
        -o-transition: none;
        transition: none;
    }

    #client-download .description {
        display: block;
        margin-top: var(--qh);
        font-size: var(--fs1);
        opacity: .75;
    }
    body {
        background-image: url('https://uploadkon.ir/uploads/d88a22_25download.jpeg');
        background-size: cover;
        background-attachment: fixed;
        overflow: hidden;
        height: 100vh;
        box-sizing: border-box;
        margin: 0;
    }
    .navbar-dark .navbar-toggler {
        border: none;
    }
    .gray-link {
        background-color: var(--color-text-a10);
        padding: .25rem 1rem !important;
        transition: background-color ease-in-out .2s;
    }
    .gray-link:hover {
        background-color: var(--color-accent-1);
    }
    .main-text {
        font-size: 1.5rem;
        line-height: 2.7rem;
    }
    .main-box {
        height: 80vh;
        justify-content: space-around;
    }
    .footer-text {
        color: var(--color-text-a75) !important;
        bottom: 2rem;
        width: 100%;
    }
    @media (max-width: 768px) {
        .main-box {
            height: 65vh;
            justify-content: space-around;
        }
        .gray-link {
            padding: .6rem 1rem !important;
        }
    }
</style>
<body dir="rtl">
    <div class="container">
        <header class="mt-md-3 mt-3" dir="ltr">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <a class="navbar-brand" href="#">
                    <img src="https://uploadkon.ir/uploads/fc2e22_25atlantisrr.png" width="80" alt="logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav ml-auto">

                        @if ( env('FIVEMLINK' , false) )
                        <li class="nav-item">
                            <a class="nav-link gray-link text-white ml-3 text-right" href="{{ env('FIVEMLINK') }}">
                                <span>
                                    ورود به سرور
                                </span>
                            </a>
                        </li>
                        @endif
                        @if (env('DISCORD' , false))
                            <li class="nav-item">
                                <a class="nav-link gray-link nav-link text-white ml-3 text-right" href="{{ env('DISCORD') }}">
                                    <span>
                                        دیسکورد
                                    </span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </nav>
        </header>

        <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center main-box">
            <div class="col-lg-7 pr-3 pr-lg-2">
                <h2 class="fw-bold lh-1 text-white text-right m-0 main-text">جهت عضویت در سرور کلیک کنید</h2>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
                </div>
            </div>

            @if (Route::has('login'))
                <a href="{{ route('login') }}" id="client-download"><span class="text">ورود به حساب کاربری</span> <span class="description text-center">از طریق دیسکورد</span></a>
            @endif
        </div>

        <div class="text-center footer-text position-absolute col-10">
        </div>
    </div>


    @script("/assets/admin/js/jquery.min.js")
    @script("/assets/admin/js/popper.min.js")
    @script("/assets/admin/js/bootstrap.min.js")
    @script("/assets/admin/js/perfect-scrollbar.jquery.min.js")
    @script("/assets/admin/js/app-style-switcher.min.js")
    @script("/assets/admin/js/feather.min.js")
    @script("/assets/admin/js/sidebarmenu.min.js")
    @script("/assets/admin/js/custom.min.js")
</body>
</html>
