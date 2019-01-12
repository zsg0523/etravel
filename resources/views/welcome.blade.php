<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ETRAVEL') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/common.css') }}" rel="stylesheet">
    <style type="text/css">
        .main{flex-direction: column;align-items: center;justify-content: flex-start;}
        .breadlink{width: 90%;height:80px;font-size: 25px;line-height: 80px;}
        .breadlink a{color: #000;}
        .content{width: 90%;min-height: 700px;border-radius: 20px;box-shadow: 0 0 15px #ccc;background-color: #fff;}
        #app{width: 100%;height:auto;}
    </style>
</head>
<body>
    <div class="main disflex" style="background-color: #e7e7e7;min-height: 100vh;color: #000;">
    <!-- 公共头部 -->
        <div id="app">
            <router-view></router-view>
        </div>
        <div class="breadlink">
            @yield('breadlink')
        </div>
        <div class="content">
            @yield('content')
        </div>
       
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

