@extends('layouts.app')
@section('breadlink')
    <a href="/">项目</a><<a href="/projectDetail">项目详情</a><<a href="/dataBank">资料库</a><<a class="onlink" href="">行李清单</a>
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
        .dataBank{width: 100%;min-height: 700px;justify-content: flex-start;align-items:center;flex-direction: column;background-color: #fff;}
        .dataBankList{width: 100%;height: 100%;align-content: flex-start;flex-direction: row;}
        .dataBank_left{width: 18%;min-height:100%;border-right: 3px solid #d6d6d6;}
        .dataBank_left>ul{width: 100%;height: auto;}
        .dataBank_left>ul>li{width: 100%;height:50px;line-height: 50px;font-size: 16px;}
        .dataBank_left>ul>li>div{width: 90%;height:50px;line-height: 50px;margin-left: 5%;}
        .dataBank_right{width: 82%;min-height:100%;justify-content: flex-start;align-items:center;flex-direction: column;}

        .dataBank_input_form{width: 100%;min-height:650px;justify-content: center;align-items:flex-start;font-size: 16px;}
        .dataBank_input_form>table{margin-top: 20px;width: 90%;}

        .dataBank_input_form table th{border:1px solid #d6d6d6;height:40px;line-height:40px;padding:0px;margin: 0px;}
        .dataBank_input_form thead{background-color: #ffde01;}
        .dataBank_input_form thead th{text-align: center;}
        .dataBank_input_form th>input{padding:0px;margin: 0px;border: none;padding-left: 5px;}
        .dataBank_input_form th>input[type="checkbox"] {width:18px;height:18px; margin: 10px !important;}
        .editIcon{width:40px;height:40px;line-height: 40px;float: left;margin-left: 5px;}
        .editIcon:hover{cursor: pointer;}
        .editIcon>img{width:25px;height:25px;}

        .active{font-size: 18px;}        

        .dataBankComfirm{width:100%;height: 50px;font-size: 16px;align-items: center;justify-content: center;}
        .btnItem{width:160px;height: 50px;}
        .btnItem>button{width:80%;height: 40px;line-height: 40px;border-radius: 8px;}
        .act{background-color: #ffde01;}
        .cancel{background-color: #fff;border:1px solid #ffde01;}
        .ensure{background-color: #ffde01;}
    </style>
</head>
<body>
    <div class="dataBank disflex">
        <div class="dataBankList disflex">
            <div class="dataBank_left">
                <ul style="padding: 0;margin:0;">
                    <li><div>重要资料<input type="checkbox" class="checke"></div></li>
                    <li><div>常用电话<input type="checkbox" class="checke"></div></li>
                    <li><div>团队守则<input type="checkbox" class="checke"></div></li>
                    <li><div>我的承诺<input type="checkbox" class="checke"></div></li>
                    <li><div>师生名单分组<input type="checkbox" checked="true" class="checke"></div></li>
                    <li><div>当地文化<input type="checkbox" class="checke"></div></li>
                    <li><div>分房表<input type="checkbox" class="checke"></div></li>
                    <li class="act"><div>行李清单<input type="checkbox" class="checke"></div></li>
                    <li><div>行程<input type="checkbox" class="checke"></div></li>
                    <li><div>学习工作纸<input type="checkbox" class="checke"></div></li>
                    <li><div>每日记事<input type="checkbox" class="checke"></div></li>
                    <li><div>自我评估<input type="checkbox" class="checke"></div></li>
                    <li><div>自我感想<input type="checkbox" class="checke"></div></li>
                </ul>
            </div>
            <div class="dataBank_right disflex">
                <div class="dataBank_input_form disflex"> 
                    <table>
                        <thead>
                            <tr>
                                <th>编号</th>
                                <th>装备内容</th>
                                <th>出发前</th>
                                <th>离开后</th>
                                <th>类型</th>
                                <th>编辑</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th><input type="text"></th>
                                <th><input type="text"></th>
                                <th><input type="checkbox"></th>
                                <th><input type="checkbox"></th>
                                <th><input type="text"></th>
                                <th>
                                    <div class="editIcon"><img src="{{asset('images/edit.png')}}"></div>
                                    <div class="editIcon"><img src="{{asset('images/appointAdd.png')}}"></div>
                                    <div class="editIcon"><img src="{{asset('images/dele.png')}}"></div>
                                </th>
                            </tr>
                            <tr>
                                <th><input type="text"></th>
                                <th><input type="text"></th>
                                <th><input type="checkbox"></th>
                                <th><input type="checkbox"></th>
                                <th><input type="text"></th>
                                <th>
                                    <div class="editIcon"><img src="{{asset('images/edit.png')}}"></div>
                                    <div class="editIcon"><img src="{{asset('images/appointAdd.png')}}"></div>
                                    <div class="editIcon"><img src="{{asset('images/dele.png')}}"></div>
                                </th>
                            </tr>
                            <tr>
                                <th><input type="text"></th>
                                <th><input type="text"></th>
                                <th><input type="checkbox"></th>
                                <th><input type="checkbox"></th>
                                <th><input type="text"></th>
                                <th>
                                    <div class="editIcon"><img src="{{asset('images/edit.png')}}"></div>
                                    <div class="editIcon"><img src="{{asset('images/appointAdd.png')}}"></div>
                                    <div class="editIcon"><img src="{{asset('images/dele.png')}}"></div>
                                </th>
                            </tr>
                        </tbody>
                    </table>   
                </div>
                <div class="dataBankComfirm disflex">
                    <div class="btnItem"><button class="cancel">取消</button></div>
                    <div class="btnItem"><button class="ensure">确定</button></div>
                </div>
                
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{asset('bootstrap/js/jquery-1.11.0.min.js')}}"></script>
    <script type="text/javascript">
        
    </script>
</body>
</html>
@endsection
