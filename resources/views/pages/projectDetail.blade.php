@extends('layouts.app')
@section('breadlink')
	<a href="/">项目</a><<a href="">项目详情</a>
@endsection
@section('content')
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
        .prodectDetail{width: 100%;min-height: 700px;justify-content: space-around;align-items:center;flex-direction: row;}
        .detail_btn{width: 240px;height: 280px;border-radius: 15px;}
        .detail_icon{width: 240px;height: 240px;background-color: #e7e7e7;border-top-left-radius: 15px;border-top-right-radius: 15px;justify-content: center;align-items:center;}
        .detail_icon>img{width: 180px;height: 180px;}
        .detail_info{width: 240px;height: 50px;background-color: #ffde01;line-height: 50px;font-size: 18px;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;text-indent: 5px;}
    </style>
</head>
<body>
    <div class="prodectDetail disflex">
    	<div class="detail_btn" onclick="window.location.assign('/linkSchool')">
            <div class="detail_icon disflex">
                <img src="{{asset('images/school.png')}}">
            </div>
            <div class="detail_info">链接学校</div>
        </div>
        <div class="detail_btn" onclick="window.location.assign('/dataBank')">
            <div class="detail_icon disflex">
                <img src="{{asset('images/base-icon.png')}}">
            </div>
            <div class="detail_info">资料库</div>
        </div>
        <div class="detail_btn" onclick="window.location.assign('/students')">
            <div class="detail_icon disflex">
                <img src="{{asset('images/IDmage-icon.png')}}">
            </div>
            <div class="detail_info">学员信息</div>
        </div>
        <div class="detail_btn" onclick="window.location.assign('/photo')">
            <div class="detail_icon disflex">
                <img src="{{asset('images/poto-icon.png')}}">
            </div>
            <div class="detail_info">图库</div>
        </div>
    </div>
    <script type="text/javascript">
        
    </script>
</body>
</html>
@endsection
