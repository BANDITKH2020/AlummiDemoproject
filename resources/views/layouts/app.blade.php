<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('RMUTT Alumni EngineringCompurter') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
            <a class="navbar-brand" href="{{ url('/') }}">    
                <div class="col-12">
                    <div class="col-12 outset" style="background-color: #EFF4FF;">
                    <div class="col-12">
                        <div class="col-12 row">
                            <div class="col-1">
                                <img src="{{ asset('images/logo-rmutt-icon.jpg') }}" style="width: 100px; height: 100px;float: right;">
                            </div>
                            <div class="col-1" style="left:100px;" >
                                <br>
                                <h4>เว็บไซต์ศิษย์เก่าวิศวกรรมคอมพิวเตอร์</h4>
                                <hr class="mt-10" style="border: 1px solid #000; width: 350px;">
                                <h4>Computer Engineering Alummi</h4>
                            </div>
                        </div>
                        <hr class="mt-1" style="border: 2px solid #000">
                    </div>
                </div>
            </a>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
