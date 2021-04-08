<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="/css/assets/logo-small.png">
    <title>{{ config('app.name') }} · @yield('title')</title>

    @auth
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/navbar.css">
    @else
    <link rel="stylesheet" href="/css/home.css">
    @endauth
    @stack('css')

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <div class="navbar__container">
        <div class="navbar__content">
            <div class="navbar__content__close">
                <img src="/css/assets/cancel.svg" alt="close">
            </div>
            <div class="navbar__content__detail">
                <ul>
                    <li><a>EXHIBITION</a></li>
                    <li><a href="{{ request()->is('event') ? '#' : route('event.index') }}">EVENT</a></li>
                    <li><a>MARKET</a></li>
                </ul>
                @auth
                @else
                <div class="navbar__content__button">
                    <a class="navbar__content__button-signin" href="{{ request()->is('login') ? '#' : route('login') }}">
                        <p>SIGN IN</p>
                    </a>
                    <a class="navbar__content__button-signup" href="{{ request()->is('register') ? '#' : route('register') }}">
                        <p>SIGN UP</p>
                    </a>
                </div>
                @endauth
            </div>
        </div>

        <div class="navbar__container__wrap">
            <div class="navbar__hamburger">  
                <img src="/css/assets/hamburger.svg" alt="">
            </div>
            <a class="navbar__logo" href="{{ request()->is('/') ? '#' : '/' }}">
                <img src="/css/assets/logo.svg" alt="logo">
            </a>
            <div class="navbar__menu">
                <div></div>
                <ul>
                    <li><a>EXHIBITION</a></li>
                    <li><a href="{{ request()->is('event') ? '#' : route('event.index') }}" class="{{ request()->is('event') ? 'navbar-menu-active' : ''}}">EVENT</a></li>
                    <li><a>MARKET</a></li>
                </ul>
            </div>
            @auth
            <div class="navbar__button-1">
                <p>{{ auth()->user()->name }}</p>
                <img src="/css/assets/user.svg" alt="user">
                <img src="/css/assets/siku.svg" alt="siku">
                <div class="nav-drop">
                    <ul>
                        <li><a onclick="window.location='{{ request()->is('profile') ? '#' : route('profile.index') }}'">Profile</a></li>
                        <li><a onclick="window.location='{{ request()->is('leaderboard') ? '#' : route('leaderboard.index') }}'">Leaderboards</a></li>
                        <li><a onclick="document.getElementById('logout-form').submit();">Log Out</a></li>
                    </ul>
                </div>
            </div>
            <div class="navbar__user">
                <a href="{{ request()->is('profile') ? '#' : route('profile.index') }}">
                    <img src="/css/assets/user.svg" alt="user">
                </a>
            </div>
            <div class="navbar__cup">
                <a href="{{ request()->is('leaderboard') ? '#' : route('leaderboard.index') }}">
                    <img src="/css/assets/cup.svg" alt="cup">
                </a>
            </div>
            @else
            <div class="navbar__button">
                <a class="navbar__button__signin" href="{{ request()->is('login') ? '#' : route('login') }}">
                    SIGN IN
                </a>
                <a class="navbar__button__signup" href="{{ request()->is('register') ? '#' : route('register') }}">
                    SIGN UP
                </a>
            </div>
            @endauth
        </div>
    </div>

    @auth
    @if(!auth()->user()->email_verified_at)
    <div class="verif__container">
        <div class="verif__container__wrap">
            <div class="verif-name">
                @if (session('resent'))
                    <p>Please check your email to verify</p>
                @else
                    <h1>Hi {{ auth()->user()->name }}</h1>
                    <p>To complete your sign up, please verify your email</p> <!-- untuk kedua kali di none -->
                @endif
            </div>
            <div class="verif-button"> <!-- untuk kedua kali di none -->
                @if (session('resent'))
                @else
                <form method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit"><p>Verify Email</p></button>
                </form>
                @endif
            </div>
        </div>
    </div>
    @endif
    @endauth
    @yield('content')

    <form id="logout-form" action="{{ route('logout') }}" method="POST">@csrf</form>
    <script src="/js/navbar.js"></script>
    @stack('js')
</body>
</html>