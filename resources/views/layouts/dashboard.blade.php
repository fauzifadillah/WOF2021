<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="/css/assets/logo-small.png">
    <title>{{ config('app.name') }} · @yield('title')</title>

    <link href="/assets/plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    @stack('css')
    <link href="/assets/css/app.css" rel="stylesheet" />
</head>
<body>
    <div class="block hidden"></div>
    <div class="main-wrapper" id="app">
        @include('layouts.sidebar')
        <div class="page-wrapper">
            @include('layouts.header')
            <div class="page-content">
            @yield('content')
            </div>
        @include('layouts.footer')
        </div>
    </div>
    @include('layouts/modal')

    <form id="logout-form" action="{{ route('logout') }}" method="POST">@csrf</form>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script>
        $('a[data-toggle="tab"]').on('shown.bs.tab', function () {
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
        });
    </script>
    <script src="/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/assets/js/template.js"></script>
    @stack('js')
</body>
</html>