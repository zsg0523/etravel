@extends('layouts.app')
@section('breadlink')
	<a href="">项目</a>
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
        .main{width: 100%;height: auto;justify-content: flex-start;align-items:center;flex-direction: column;position: relative;}
		.project_list{width: 90%;min-height:550px;flex-flow:row wrap; align-content:flex-start;margin-top: 50px;}
		.project{margin: 10px;min-width: 350px;height: 140px;border: none;font-size: 18px;border-radius: 15px;}

		.project_left{width: 110px;height: 100%;align-items: center;justify-content: center;border-bottom-left-radius: 15px;border-top-left-radius: 15px;}
		.project_left>img{width: 80px;height: 100px;}

		.project_right{width: 240px;height: 100%;align-items: center;flex-direction: column; justify-content: flex-start;background-color: #ebebeb;border-bottom-right-radius: 15px;border-top-right-radius: 15px;}
		.project_right>div{width: 90%;}

		.edit_name{height: 40px;margin-top: 10px;}
		.edit_icon{width: auto;height: 40px;align-items: center;justify-content: flex-start;}
		.edit_icon>span{font-size: 14px;color:#c1c1c1;}
		.edit_icon>img{width: 30px;height:30px;}
		.project_type{width: auto;height: 40px;align-items: center;justify-content: flex-start;}
		.project_type>img{width: 20px;height:20px;}
		.project_type>span{font-size: 14px;color:#c1c1c1;}
		.project_name{height: 80px;overflow: hidden;}
		.project_name>p{line-height: 40px;width: 100%;font-size: 24px;word-break: break-all;overflow: hidden;}

		.addnew{font-size: 30px;color: #c1c1c1;height: 100%;line-height: 140px;display: block;}
        .btn_publish{width: 100%;height: 60px;justify-content: center;margin-top:20px; }
        .btn_publish>button{width: 350px;height: 50px;border-radius: 8px;background-color: #ffde01;border: none;font-size: 18px;}
		
		.del_icon{width: 60px;height: 60px;position: absolute;right: 50px;top:50px;z-index: 5;}
		.del_icon>img{width: 60px;height: 60px;}
    </style>
</head>
<body>
    <div class="main disflex">
    	<div class="del_icon">
    		<img src="{{asset('images/rush-icon.png')}}">
    	</div>
    	<div class="project_list disflex">
    		
    		<div class="project disflex">
    			<div class="project_left disflex huise">
    				<img src="{{asset('images/add1.png')}}">
    			</div>
    			<div class="project_right disflex">
    				<span class="addnew" >新建项目</span>
    			</div>
    		</div>
    		<div class="project disflex">
    			<div class="project_left disflex yellowbg">
    				<img src="{{asset('images/plane-icon.png')}}">
    			</div>
    			<div class="project_right disflex">
    				<div class="edit_name">
    					<div class="edit_icon disflex fl">
    						<img src="{{asset('images/write-icon.png')}}">
    						<span>（4-X个字符内）</span>
    					</div>
    					<div class="project_type disflex fr">
    						<img src="{{asset('images/unsent.png')}}">
    						<span>未发布！</span>
    					</div>
    				</div>
    				<div class="project_name">
    					<p class="overdot" style="color: #c1c1c1;">项目名称</p>
    				</div>
    			</div>
    		</div>
    		<div class="project disflex" onclick="window.location.assign('/projectDetail')">
    			<div class="project_left disflex yellowbg">
    				<img src="{{asset('images/plane-icon.png')}}">
    			</div>
    			<div class="project_right disflex">
    				<div class="edit_name">
    					<div class="edit_icon disflex fl">
    						<img src="{{asset('images/write-icon.png')}}">
    						<span>（4-X个字符内）</span>
    					</div>
    					<div class="project_type disflex fr">
    						<img src="{{asset('images/unsent.png')}}">
    						<span>已发布！</span>
    					</div>
    				</div>
    				<div class="project_name">
    					<p class="overdot">香港小学韩国交流十五日游香港小学韩国交流十五日游</p>
    				</div>
    			</div>
    		</div>
    		<div class="project disflex">
    			<div class="project_left disflex yellowbg">
    				<img src="{{asset('images/plane-icon.png')}}">
    			</div>
    			<div class="project_right disflex">
    				<div class="edit_name">
    					<div class="edit_icon disflex fl">
    						<img src="{{asset('images/write-icon.png')}}">
    						<span>（4-X个字符内）</span>
    					</div>
    					<div class="project_type disflex fr">
    						<img src="{{asset('images/unsent.png')}}">
    						<span>已发布！</span>
    					</div>
    				</div>
    				<div class="project_name">
    					<p class="overdot">香港小学韩国交流十五日游香港小学韩国交流十五日游</p>
    				</div>
    			</div>
    		</div>
    		<div class="project disflex">
    			<div class="project_left disflex yellowbg">
    				<img src="{{asset('images/plane-icon.png')}}">
    			</div>
    			<div class="project_right disflex">
    				<div class="edit_name">
    					<div class="edit_icon disflex fl">
    						<img src="{{asset('images/write-icon.png')}}">
    						<span>（4-X个字符内）</span>
    					</div>
    					<div class="project_type disflex fr">
    						<img src="{{asset('images/unsent.png')}}">
    						<span>已发布！</span>
    					</div>
    				</div>
    				<div class="project_name">
    					<p class="overdot">香港小学韩国交流十五日游香港小学韩国交流十五日游</p>
    				</div>
    			</div>
    		</div>
    	</div>
    	<div class="btn_publish disflex">
    		<button type="button">发布</button>
    	</div>
    </div>
    <script type="text/javascript">
        
    </script>
</body>
</html>
@endsection
