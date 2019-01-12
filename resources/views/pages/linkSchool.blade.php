@extends('layouts.app')
@section('breadlink')
	<a href="/">项目</a><<a href="/projectDetail">项目详情</a><<a href="">链接学校</a>
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
        .linkSchool{width: 100%;min-height: 700px;justify-content: space-around;align-items:center;flex-direction: row;}
        .schoolInput{width: 450px;height: 200px;border-radius: 15px;}
        .input_icon{width: 450px;height: 50px;background-color: #e7e7e7;border-top-left-radius: 15px;border-top-right-radius: 15px;justify-content: flex-start;align-items:center;}
        .input_icon>img{width: 30px;height: 30px;margin-left: 20px;}
        .input_icon>span{font-size: 16px;}
        .detail_info{width: 450px;height: 60px;background-color: #ffde01;line-height: 50px;font-size: 18px;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;text-indent: 5px;}
        .detail_info>div{width: 90%;height:60px;margin-left: 5%;justify-content: flex-start;align-items:center;}
        .detail_info>div>input{width: 65%;height: 40px;outline: none;border: none;background-color: #fff;border-top-left-radius: 8px;border-bottom-left-radius: 8px;}
        .detail_info>div>button{width: 35%;height: 40px;outline: none;border: none;background-color: #ccc;border-top-right-radius: 8px;border-bottom-right-radius: 8px;font-size: 16px;line-height: 40px;}
    </style>
</head>
<body>
    <div class="linkSchool disflex">
    	<div class="schoolInput">
            <div class="input_icon disflex" ">
                <img src="{{asset('images/write-icon.png')}}">
                <span>(请填写学校)</span>
            </div>
            <div class="detail_info">
                <div class="disflex">
                    <input type="text" name="" value="">
                    <button>确定</button>    
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        
    </script>
</body>
</html>
@endsection
