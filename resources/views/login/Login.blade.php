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
        .main{width: 100%;height: 100vh;align-items: center;justify-content: center;}
        .content{width: 900px;height:500px;border-radius:10px;box-shadow: 0 0 10px #ccc;background-color: #ffde01;}
        .icon{width: 50%;height:500px;border-right: 1px solid #fff;align-items: center;justify-content: center;}
        .icon>img{width: 300px;}
        .login{width: 50%;height:500px;flex-flow:column nowrap;align-items: center;justify-content: center;}
        .login>div{width:70%;height: 70px;color: #000;}
        .title{font-size: 25px;font-weight: bold;}
        .login>div input{width: 100%;height:50px;border:none;outline: none;background: #fff;border-radius: 8px;padding-left: 8px;font-size: 16px;}
        .login>div a{color: #000;font-size: 16px;}
        .login>div button{width: 100%;height: 50px;border: none;outline: none;background-color: #fff;border-radius: 8px;font-weight: bold;font-size: 16px;}
    </style>
</head>
<body>
    <div class="disflex main">
        <div class="disflex content">
            <div class="disflex icon">
                <img src="{{ asset('images/logo_big.png') }}">
            </div>
            <div class="disflex login">
                <div class="title tc">后台系统</div>
                <div><input type="text" placeholder="用户名或手机号" name=""></div>
                <div><input type="password" placeholder="密码" name=""></div>
                <div style="height: 40px;"><a href="" class="fl">立即注册</a><a href="" class="fr">忘记密码</a></div>
                <div><button type="button">登录</button></div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        
    </script>
</body>
</html>
