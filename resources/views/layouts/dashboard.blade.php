<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="{{ asset('css/assets/logo-small.png') }}">
    <title>NobleUI Laravel Admin Dashboard Template</title>

    <!-- CSRF Token -->
    <meta name="_token" content="{{ csrf_token() }}">

    <link href="{{ asset('assets/fonts/feather-font/css/iconfont.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" />
    @stack('css')
</head>
<body>
    <script src="{{ asset('assets/js/spinner.js') }}"></script>

    <div class="main-wrapper" id="app">
        @include('layouts.sidebar')
        <div class="page-wrapper">
            @include('layout.header')
            <div class="page-content">
            @yield('content')
            </div>
        @include('layout.footer')
        </div>
    </div>

    <script src="{{ asset('assets/plugins/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/template.js') }}"></script>
    @stack('js')
</body>
</html>