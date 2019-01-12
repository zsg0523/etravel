@extends('layouts.app')
@section('breadlink')
	<a href="/">项目</a><<a href="/projectDetail">项目详情</a><<a href="">图库</a>
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
        .photos{width: 100%;min-height: 700px;justify-content: center;align-items:center;flex-direction: row;position: relative;}
        
        .photo_list{width: 90%;min-height:600px;align-content: flex-start;}
        .photo_img{width: 100px;height:100px;border-radius: 10px;margin: 10px;border:1px solid #ccc;}
        .photo_img>img{width: 100%;height: 100%;border-radius: 10px;}
        .del_icon{width: 60px;height: 60px;position: absolute;right: 50px;top:50px;z-index: 5;}
        .del_icon>img{width: 60px;height: 60px;}
    </style>
</head>
<body>
    <div class="photos disflex">
        <div class="del_icon">
            <img src="{{asset('images/rush-icon.png')}}">
        </div>
    	<div class="photo_list disflex">
            <div class="photo_img">
                <img src="{{asset('images/photo.png')}}" alt="">
            </div>
            <div class="photo_img">
                <img src="{{asset('images/photo.png')}}" alt="">
            </div>
            <div class="photo_img">
                <img src="{{asset('images/photo.png')}}" alt="">
            </div>
            <div class="photo_img">
                <img src="{{asset('images/photo.png')}}" alt="">
            </div>
            <div class="photo_img">
                <img src="{{asset('images/photo.png')}}" alt="">
            </div>
            <div class="photo_img">
                <img src="{{asset('images/photo.png')}}" alt="">
            </div>
        </div>
    </div>
    <script type="text/javascript">
        
    </script>
</body>
</html>
@endsection
