@extends('layouts.app')
@section('breadlink')
    <a href="/">项目</a><<a href="/projectDetail">项目详情</a><<a href="/dataBank">资料库</a><<a class="onlink" href="">当地文化</a>
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
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <style type="text/css">
        .dataBank{width: 100%;min-height: 700px;justify-content: flex-start;align-items:center;flex-direction: column;background-color: #fff;}
        .dataBankList{width: 100%;height: 100%;align-content: flex-start;flex-direction: row;}
        .dataBank_left{width: 18%;min-height:100%;border-right: 3px solid #d6d6d6;}
        .dataBank_left>ul{width: 100%;height: auto;}
        .dataBank_left>ul>li{width: 100%;height:50px;line-height: 50px;font-size: 16px;}
        .dataBank_left>ul>li>div{width: 90%;height:50px;line-height: 50px;margin-left: 5%;}
        .dataBank_right{width: 82%;min-height:100%;justify-content: flex-start;align-items:center;flex-direction: column;}

        .dataBank_input_form{width: 100%;min-height:650px;justify-content: center;align-items:flex-start;font-size: 16px;position: relative;}
        .tablist{width:100%;}
        .nav-tabs>li>a{color: #000;}
        .pane_content{width:70%;margin-left: 15%;height:auto;margin-bottom: 30px;font-size: 16px;}
        .form_content{width: 100%;min-height: 300px;align-content:flex-start;flex-direction: row;flex-wrap: wrap;}
        .form_item{width:100%;height:100px;}
        .form_item>div{width: 100%;height: 45px;line-height: 45px;word-break: break-all;}
        .item_input{height:40px;padding-left:10px;outline: none;width: 97%;border-radius: 8px;}
        .item_area{width:97%;height:80px;border-radius: 8px;resize:none;line-height:25px;font-size: 14px;outline: none;overflow: hidden;background-color: #eee;}
        .active{font-size: 18px;}        

        .dataBankEditBtn{width:70px;height: 70px;position: absolute;right: 50px;top: 50px;}
        .dataBankEditBtn:hover{cursor:pointer;}
        .dataBankEditBtn>img{width:70px;height: 70px;}

        .dataBankAddBtn{width:70px;height: 70px;position: absolute;right: 50px;top: 150px;}
        .dataBankAddBtn:hover{cursor:pointer;}
        .dataBankAddBtn>img{width:70px;height: 70px;}

        .dataBankDelBtn{width:70px;height: 70px;position: absolute;right: 50px;top: 250px;}
        .dataBankDelBtn:hover{cursor:pointer;}
        .dataBankDelBtn>img{width:70px;height: 70px;}


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
                    <li><div>师生名单分组<input type="checkbox" class="checke"></div></li>
                    <li class="act"><div>当地文化<input type="checkbox" class="checke"></div></li>
                    <li><div>分房表<input type="checkbox" class="checke"></div></li>
                    <li><div>行李清单<input type="checkbox" class="checke"></div></li>
                    <li><div>行程<input type="checkbox" class="checke"></div></li>
                    <li><div>学习工作纸<input type="checkbox" class="checke"></div></li>
                    <li><div>每日记事<input type="checkbox" class="checke"></div></li>
                    <li><div>自我评估<input type="checkbox" class="checke"></div></li>
                    <li><div>自我感想<input type="checkbox" class="checke"></div></li>
                </ul>
            </div>
            <div class="dataBank_right disflex">
                <div class="dataBank_input_form disflex">
                    <div class="tablist">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#gather" aria-controls="gather" role="tab" data-toggle="tab">景点资讯</a></li>
                            <li role="presentation"><a href="#flight" aria-controls="flight" role="tab" data-toggle="tab">地图</a></li>
                        </ul>
                        <div class="tab-content">
                            <!-- 景点资讯 -->
                            <div role="tabpanel" class="tab-pane active" id="gather">
                                <div class="pane_content">   
                                    <div class="form_content disflex">
                                        <div class="form_item">
                                            <div class="item_title">小标题(多少字符以内)</div>
                                            <div><input class="item_input" placeholder="小标题" type="text" name=""></div>
                                        </div>
                                        <div class="form_item">
                                            <div class="item_title">图片</div>
                                            <div><input class="item_input" type="text" name=""></div>
                                        </div>
                                        <div class="form_item" style="width:100%;height:120px;">
                                            <div class="item_title">内容</div>
                                            <div>
                                                <textarea class="item_area" placeholder="内容"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- 地图 -->
                            <div role="tabpanel" class="tab-pane" id="flight">
                                <div class="pane_content"> 
                                    <div class="form_content disflex">
                                        <div class="form_item">
                                            <div class="item_title">城市地址</div>
                                            <div><input class="item_input" type="text" name=""></div>
                                        </div>
                                        <div class="form_item">
                                            <div class="item_title">酒店详细地址</div>
                                            <div>
                                                <div><input class="item_input" type="text" name=""></div>
                                            </div>
                                        </div>
                                        <div class="form_item">
                                            <div class="item_title">图片</div>
                                            <div>
                                                <div><input class="item_input" type="text" name=""></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>              
                    <div class="dataBankEditBtn">
                        <img src="{{asset('images/editAll.png')}}">
                    </div>
                    <div class="dataBankAddBtn">
                        <img src="{{asset('images/add_y.png')}}">
                    </div>
                     <div class="dataBankDelBtn">
                        <img src="{{asset('images/rush-icon.png')}}">
                    </div>
                </div>
                <div class="dataBankComfirm disflex">
                    <div class="btnItem"><button class="cancel">取消</button></div>
                    <div class="btnItem"><button class="ensure">确定</button></div>
                </div>
                
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{asset('bootstrap/js/jquery-1.11.0.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript">
        
    </script>
</body>
</html>
@endsection
