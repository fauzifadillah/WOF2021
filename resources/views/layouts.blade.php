<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('css/assets/logo-small.png') }}">
    <title>{{ config('app.name') }} · @yield('title')</title>

    @auth
    <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    @else
    <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
    @endauth
    @stack('css')

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="http://fonts.cdnfonts.com/css/gotham" rel="stylesheet">
</head>
<body>
    <div class="navbar__container">
        <div class="navbar__content">
            <div class="navbar__content__close">
                <img src="{{ asset('css/assets/cancel.svg') }}" alt="close">
            </div>
            <div class="navbar__content__detail">
                <ul>
                    <li><a>EXHIBITION</a></li>
                    <li><a>EVENT</a></li>
                    <li><a>MARKET</a></li>
                </ul>
                <div class="navbar__content__button">
                    <a class="navbar__content__button-signin" href="{{ request()->is('login') ? '#' : '/login' }}">
                        <p>SIGN IN</p>
                    </a>
                    <a class="navbar__content__button-signup" href="{{ request()->is('register') ? '#' : route('register') }}">
                        <p>SIGN UP</p>
                    </a>
                </div>
            </div>
        </div>

        <div class="navbar__container__wrap">
            <div class="navbar__hamburger">  
                <img src="{{ asset('css/assets/hamburger.svg') }}" alt="">
            </div>
            <a class="navbar__logo" href="{{ request()->is('/') ? '#' : '/' }}">
                <img src="{{ asset('css/assets/logo.svg') }}" alt="logo">
            </a>
            <div class="navbar__menu">
                <div></div>
                <ul>
                    <li><a>EXHIBITION</a></li>
                    <li><a>EVENT</a></li>
                    <li><a>MARKET</a></li>
                </ul>
            </div>
            @auth
            <div class="navbar__button-1">
                <p>{{ auth()->user()->name }}</p>
                <img src="/css/assets/user.svg" alt="user">
                <img src="/css/assets/siku.svg" alt="siku">
                <div class="nav-drop">
                    <a onclick="window.location='{{ route('profile') }}'">Profile</a>
                    <a onclick="document.getElementById('logout-form').submit();">Log Out</a>
                </div>
            </div>
            @else
            <div class="navbar__button">
                <a class="navbar__button__signin" href="{{ request()->is('login') ? '#' : '/login' }}">
                    <p>SIGN IN</p>
                </a>
                <a class="navbar__button__signup" href="{{ request()->is('register') ? '#' : route('register') }}">
                    <p>SIGN UP</p>
                </a>
            </div>
            @endauth
            <div class="navbar__user">
                <img src="/css/assets/user.svg" alt="user">
            </div>
        </div>
    </div>

    @auth
    @if(!auth()->user()->email_verified_at)
    <div class="verif__container">
        <div class="verif__container__wrap">
            <div class="verif-name">
                <h1>Hi {{ auth()->user()->name }}</h1>
                <p>To complete your sign up, please verify your email</p>
            </div>
            <div class="verif-button">
                <form method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit"><p>Verify Email</p></button>
                </form>
            </div>
        </div>
    </div>
    @endif
    @endauth
    @yield('content')

    <form id="logout-form" action="{{ route('logout') }}" method="POST">@csrf</form>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/navbar.js') }}"></script>
</body>
</html>