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
                                    <img src="{{ asset('images/logo-rmutt-icon.jpg') }}" style="height: 100px;padding: 0px;margin:0px;" align="right">
                                </div>
                                <div  class="col-11">
                                    <h2  style="font-weight:bold; padding: 30px 0;margin:0px;font-family:'TH Niramit AS';">เว็บไซต์ศิษย์เก่าวิศวกรรมคอมพิวเตอร์</h2>
                                </div>
                            </div>
                            <hr class="mt-1" style="border: 2px solid #000">
                        </div>
                    </div>
                </div>
            </a>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
