@extends('layouts.app')
@section('breadlink')
    <a href="/">项目</a><<a href="/projectDetail">项目详情</a><<a href="/dataBank">个人中心</a><<a class="onlink" href="">个人资料</a>
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
                <div class="personal_info">
                    <div class="personal_info_edit" id="edit">
                        <div class="head_edit">
                            <div class="info_title">
                                <span>基本资料</span><hr />
                            </div>
                            <div class="info_photo">
                                <p>头像</p>
                                <img class="photo-circle" src="{{asset('images/insert-pic.png')}}" />
                                <form method="POST" action="" enctype="multipart/form-data" style="display: none;">
                                    <div class="filePic">
                                        <input type="file" class="inputPic" name="file" allowexts="gif,jpeg,jpg,png,bmp" accept="image/*" onchange="this.form.submit()">
                                        <img class="photo-circle" src="{{asset('images/insert-pic.png')}}" />
                                    </div>
                                </form>
                            </div>
                            <div class="info_name">
                                <p>昵称</p>
                                <input type="text" name="" id="" value="" placeholder="呵呵哒" />
                                <p>性别</p>
                                <div class="sex">
                                    <input type="button" name="radio_sex" id="user_sex_male" checked="checked"/> Woman                                                                                                          
                                    <input type="button" name="radio_sex" id="user_sex_female" /> Man                                                                                   
                                </div>
                            </div>
                        </div>
                        <div class="information_edit">
                            <div class="info_title1">
                                <span>个人信息</span><hr />
                            </div>
                            <div class="info_phone">
                                <p>手机号</p>
                                <input type="text" name="" id="" value="" placeholder="38237917937" />
                                <input type="button" name="" id="bind_phone"  value="绑定" />
                                <p>邮箱</p>
                                <input type="text" name="" id="" value="" placeholder="379178439@qq.com" />
                                <input type="button" name="" id="bind_email" value="绑定" />
                            </div>
                            <div class="info_profession">
                                <p>行业</p>
                                <form action="" method="post">
                                    <!--<a class="btn-select" id="btn_select">
                                        <select>
                                            <option selected="selected">请选择</option>
                                            <option value="teacher">老师</option>
                                            <option value="student">学生</option>
                                            <option value="institutions">机构</option>
                                            <option value="other">其他</option>
                                        </select>
                                    </a>-->
                                    <div class="nav">
                                        <p class="set">请选择</p>
                                        <ul class="new">
                                            <li value="teacher">老师</li>
                                            <li value="student">学生</li>
                                            <li value="institutions">机构</li>
                                            <li value="other">其他</li>
                                        </ul>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <div class="personal_info_edit" id="view">
                        <div class="head_edit">
                            <div class="info_title">
                                <span>基本资料</span><hr />
                            </div>
                            <div class="info_photo">
                                <p>头像</p>
                                <img class="photo-circle" src="{{asset('images/insert-pic.png')}}" />
                            </div>
                            <div class="info_name">
                                <p>昵称</p>
                                <div class="info_view">呵呵哒</div>
                                <p>性别</p>
                                <div class="sex">
                                    <input type="button"  name="radio_sex" checked="checked"/> Woman                                                                                                            
                                    <input type="button" name="radio_sex" /> Man                                                                                    
                                </div>
                            </div>
                        </div>
                        <div class="information_edit">
                            <div class="info_title1">
                                <span>个人信息</span><hr />
                            </div>
                            <div class="info_phone">
                                <p>手机号</p>
                                <div class="info_view">38237917937</div>
                                <p>邮箱</p>
                                <div class="info_view">379178439@qq.com</div>
                            </div>
                            <div class="info_profession">
                                <p>行业</p>
                                <div class="info_view">老师</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="personal_info_btn">
                        <div class="info_btn1" id="btn_edit"></div>
                        <div class="info_btn2" id="btn_view">预览</div>
                    </div>
                    <div class="info-btn">
                        <div class="btn_cancel" onclick="cancel();">取消</div>
                        <div class="btn_save" onclick="save();">保存</div>
                    </div>
                </div>
            </div>
            <!--弹窗-->
            <div id="bg"></div>
            <div id="show">
                <form method="post" name="form" action="SendPhone/addPhone">
                    <div class="user-group borderbot" style="display: none;">
                        <select id="areacode" name="areacode">
                            <foreach name="areacodeList" item="v">
                                <option class="option" value="{$v['acnumber']}" acid="{$v['acid']}">{$v['name']}</option>
                            </foreach>
                        </select>
                    </div>
                    <div class="user-phone borderbot">
                        <label for="user">手机号</label>
                        <input type="text" name="phone" id="phone" placeholder="Please enter your Phone" onchange="judgment(this,0);">
                        <input type="button" id="Verify" class="btn" value="发送验证码">
                    </div>
                    <div class="user-pass borderbot">
                        <label for="code">验证码</label>
                        <input type="text" name="code" id="code" placeholder="Please enter a verification code">
                    </div>
                </form>
                <div class="spacing">
                    <input type="submit" name="" id="Modify" value="绑定" style="outline: none;">
                </div>
                <div class="close" onclick="hidediv();"></div>
            </div>
        </div>
        <script type="text/javascript" src="{{asset('bootstrap/js/jquery-1.11.0.min.js')}}"></script>   
        <script type="text/javascript">
            $(document).ready(function() {
                $(".title li:nth-child(1)").addClass('active');
            });
            $(function() {
                $(".nav p").click(function() {
                    var ul = $(".new");
                    if (ul.css("display") == "none") {
                        ul.slideDown();
                    } else {
                        ul.slideUp();
                    }
                });
                $(".set").click(function() {
                    var _name = $(this).attr("name");
                    if ($("[name=" + _name + "]").length > 1) {
                        $("[name=" + _name + "]").removeClass("select");
                        $(this).addClass("select");
                    } else {
                        if ($(this).hasClass("select")) {
                            $(this).removeClass("select");
                        } else {
                            $(this).addClass("select");
                        }
                    }
                });
            
                $(".nav li").click(function() {
                    var li = $(this).text();
                    $(".nav p").html(li);
                    $(".new").hide();
                    /*$(".set").css({background:'none'});*/
                    $("p").removeClass("select");
                });
            })
            
            //编辑与预览用户信息
            $("#btn_view").on('click', function() {
                $("#edit").css("display","none");
                $("#view").css("display","block");
                $(".info-btn").css("display","none");
            });
            $("#btn_edit").on('click', function() {
                $("#edit").css("display","block");
                $("#view").css("display","none");
                $(".info-btn").css("display","block");
            });
            //点击变换单选按钮颜色
            $("#user_sex_male").on('click', function() {
                $("#user_sex_male").attr("checked","checked");
                $("#user_sex_female").removeAttr("checked");
            });
            $("#user_sex_female").on('click', function() {
                $("#user_sex_female").attr("checked","checked");
                $("#user_sex_male").removeAttr("checked");
            });
            //弹窗关闭
            function hidediv() {
                $("#bg").css("display","none");
                $("#show").css("display","none");
            }
            
            /*手机号绑定*/
            $("#bind_phone").click(function() {
                /*弹框显示*/
                $("#bg").css("display","block");
                $("#show").css("display","block");
                //手机号获取验证码
                $("#Verify").on('click', function() {
                    var phone = $('#phone').val();
                    //var areacode = $('#areacode option:selected').val();
                });
                $("#Modify").on('click', function() {
                    var phone = $('#phone').val();
                    //var areacode = $('#areacode option:selected').val();
                    //var acid = $('#areacode option:selected').attr("acid");
                    var code = $('#code').val();
                });
            });
            /*邮箱绑定*/
            $("#bind_email").click(function() {
                $("#bg").css("display","block");
                $("#show").css("display","block");
                //邮箱获取验证码
                $("#Verify1").on('click', function() {
                    var email = $('#email').val();
                });
                $("#Modify2").on('click', function() {
                    var email = $('#email').val();
                    var code = $('#code1').val();
                });
            });
            function save(){
                
            }
        </script>
    </body>

</html>
@endsection
