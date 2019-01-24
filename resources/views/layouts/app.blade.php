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
        .commonHead{width: 100%;height: 116px;background-color: #ffde01;color: 000;}     
        .left{width: 160px;height: 116px;align-items: center;justify-content: center;float:left;}
        .right{width: 360px;height: 116px;float: right;align-items: center;justify-content:center;}
        .right>div{height: 116px;}
        .letter{width: 60px;align-items: center;justify-content: center;}
        .letter>img{width: 40px;height: 40px;}
        .person_icon{width: 100px;align-items: center;justify-content: center;}
        .person_icon>img{width: 70px;height: 70px;border-radius: 50%;}
        .info{width: 80px;align-items: center;justify-content: center;flex-direction: column;}
        .info>div{width: 100%;height: 30px;line-height: 30px;text-align:center;overflow: hidden;}
        .exit{width: 60px;align-items: center;justify-content: center;}
        .exit>img{width: 50px;}
        .breadlink{width: 90%;height:80px;font-size: 18px;line-height: 80px;}
        .breadlink a{color: #000;}
        .content{width: 90%;min-height: 700px;border-radius: 20px;box-shadow: 0 0 15px #ccc;background-color: #fff;}
    </style>
</head>
<body>
    <div class="main disflex" style="background-color: #e7e7e7;min-height: 100vh;color: #000;">
    <!-- 公共头部 -->
        <div class="commonHead">
            <div class="left disflex" onclick="window.location.assign('/home');">
                <img src="{{ asset('images/logo.png') }}">
            </div>
            <div class="right disflex">
                <div class="letter disflex"><img src="{{ asset('images/letter.png') }}"></div>
                <div class="person_icon disflex"><img src="{{ asset('images/photo.png') }}"></div>
                <div class="info disflex">
                    <div>qully</div>
                    <div>积分：0</div>
                </div>
                <div class="exit disflex">
                    <img src="{{ asset('images/Vector-icon.png') }}">
                </div>
            </div>
        </div>
        <div class="breadlink">
            @yield('breadlink')
        </div>
        <div class="content">
            @yield('content')
        </div>
       
    </div>

    <!-- Scripts -->
    
</body>
</html>
