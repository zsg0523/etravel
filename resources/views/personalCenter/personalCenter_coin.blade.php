@extends('layouts.app')
@section('breadlink')
    <a href="/">项目</a><<a href="/projectDetail">项目详情</a><<a href="/dataBank">资料库</a><<a class="onlink" href="">重要资料</a>
@endsection
@section('content')
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>personalinfo</title>
<!--         <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/common.css') }}" rel="stylesheet"> -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/personal_center.css') }}" />
        <style type="text/css">
            p,span{color: #666666;}
        </style>
    </head>
    <body>
        <div class="personal_center">
            <div class="personal_left">
                <ul class="title">
                    <li>
                        <a href="">个人资料</a>
                    </li>
                    <li>
                        <a href="">账户设置</a>
                    </li>
                    <li>
                        <a href="">金币管理</a>
                    </li>
                    <li>
                        <a href="">信息中心</a>
                    </li>
                </ul>
            </div>
            <div class="personal_right">
                <div class="main-wrap">
                    <div class="password_title"><span>修改密码</span></div>
                    <form class="password_form" action="" method="post">
                        <div class="am-form-group" >
                            <label for="user-old-password" class="am-form-label">原始密码</label>
                            <div class="am-form-content">
                                <input type="password" id="user-old-password" placeholder="请输入原密码">
                                <span class="psdInfo">你输入的原始密码有误！</span>
                            </div>
                        </div>
                        <div class="am-form-group" style="margin-bottom: 0.5rem;">
                            <label for="user-new-password" class="am-form-label">新密码</label>
                            <div class="am-form-content">
                                <input type="password" id="user-new-password" placeholder="请输入新密码">
                                <span class="psdInfo1">请重新输入正确的密码！</span>
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-confirm-password" class="am-form-label">确认密码</label>
                            <div class="am-form-content">
                                <input type="password" id="user-confirm-password" placeholder="确认新密码">
                                <span class="psdInfo2">两次输入的密码不一致！</span>
                            </div>
                        </div>
                        <div class="info-btn" style="display: block;">
                            <div class="btn_cancel" onclick="Confirm();">取消</div>
                            <div class="btn_save" onclick="Confirm();">保存</div>
                        </div>
                    </form>
                </div>
            </div> 
            
        </div>
        <script type="text/javascript" src="{{asset('bootstrap/js/jquery-1.11.0.min.js')}}"></script>   
        <script type="text/javascript">
            $(document).ready(function() {
                $(".title li:nth-child(2)").addClass('active');
            });
        </script>
    </body>

</html>
@endsection
