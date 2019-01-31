<style type="text/css">
    .students{width: 100%;min-height: 700px;justify-content: flex-start;align-items:center;flex-direction: column;}
    .studentsList{width: 100%;height: auto;justify-content: flex-start;flex-direction: row;}
    .students_left{width: 18%;min-height:100%;border-right: 3px solid #d6d6d6;}
    .students_left>ul{width: 100%;height: auto;}
    .students_left>ul>li{width: 100%;height:50px;line-height: 50px;font-size: 18px;}
    .students_left>ul>li>div{width: 90%;height:50px;line-height: 50px;margin-left: 5%;}
    .left_title{justify-content: space-between;align-items:center;}
    .left_title img{width: 40px;height: 40px;}
    .left_title img:hover{cursor: pointer;}
    .left_title_icon{width: auto;height: auto; }
    .left_title_icon>div{width: 40px;height: 40px;line-height: 40px;float: left;text-align: center;}
    .students_right{width: 82%;min-height:100%;justify-content: flex-start;align-items:center;flex-direction: column;}
    .students_right_title{width: 100%;height: 50px;line-height: 50px;}
    .search_input{width: 100%;height: 50px;justify-content: center;align-items:center;font-size: 18px;}
    .search_input>input{width: 30%;height: 40px;border-radius: 8px;outline: none;padding-left:10px;}
    .search_icon{width: 50px;height: 50px;}
    .search_icon>img{width:40px;height: 40px}
    .search_icon>img:hover{cursor: pointer;}

    .students_input_form{width: 100%;min-height:600px;justify-content: center;align-items:flex-start;font-size: 18px;position: relative;}
    .form_content{width: 70%;min-height: 600px;align-content:flex-start;flex-direction: row;flex-wrap: wrap;}
    .form_item{width: 50%;height:100px;}
    .form_item>div{width: 94%;margin-left: 3%;height: 45px;line-height: 45px;}
    .item_input{height:40px;padding-left:10px;outline: none;width: 90%;border-radius: 8px;}
    .item_checkbox>div{width:30%;height:40px;line-height: 40px;float: left;}
    .item_checkbox>div>input{width:35px;height: 35px;border-radius: 5px;background-color: #ccc;}
    .studentEditBtn{width:70px;height: 70px;position: absolute;right: 50px;top: 50px;}
    .studentEditBtn:hover{cursor:pointer;}
    .studentEditBtn>img{width:70px;height: 70px;}
    .studentComfirm{width:100%;height: 50px;font-size: 16px;align-items: center;justify-content: center;}
    .btnItem{width:160px;height: 50px;}
    .btnItem>button{width:80%;height: 40px;line-height: 40px;border-radius: 8px;}
    .act{background-color: #ffde01;}
    .cancel{background-color: #fff;border:1px solid #ffde01;}
    .ensure{background-color: #ffde01;}
</style>

<template>
    <div class="students disflex">
        <div class="studentsList disflex">
            <div class="students_left">
                <ul style="padding: 0;margin:0;">
                    <li>
                        <div class="left_title disflex">
                            <span>填写信息</span>
                            <div class="left_title_icon">
                                <div>
                                    <img src="/etravel/public/images/del_y.png" alt="">
                                </div>
                                <div>
                                    <img src="/etravel/public/images/add_y.png" alt="">
                                </div>
                            </div>
                        </div> 
                    </li>
                    <li><div>xxxxxxxxxxx</div></li>
                    <li><div>xxxxxxxxxxx</div></li>
                    <li class="act"><div>xxxxxxxxxxx</div></li>
                    <li><div>xxxxxxxxxxx</div></li>
                    <li><div>xxxxxxxxxxx</div></li>
                    <li><div>xxxxxxxxxxx</div></li>
                    <li><div>xxxxxxxxxxx</div></li>
                </ul>
            </div>
            <div class="students_right disflex">
                <div class="students_right_title">
                    <div class="search_input disflex">
                        <input type="text" name="studentSearch">
                        <div class="search_icon">
                            <img src="/etravel/public/images/search.png">
                        </div>
                    </div>
                </div>
                <div class="students_input_form disflex">
                    <div class="form_content disflex">
                        <div class="form_item">
                            <div class="item_title">用户ID</div>
                            <div><input class="item_input" type="text" name=""></div>
                        </div>
                        <div class="form_item">
                            <div class="item_title">密码</div>
                            <div><input class="item_input" type="text" name=""></div>
                        </div>
                        <div class="form_item">
                            <div class="item_title">英文名字</div>
                            <div><input class="item_input" type="text" name=""></div>
                        </div>
                        <div class="form_item">
                            <div class="item_title">性别</div>
                            <div class="item_checkbox">
                                <div><input type="button"name="sex_g">Girl</div>
                                <div><input type="button" name="sex_b">Boy</div>
                            </div>
                        </div>
                        <div class="form_item">
                            <div class="item_title">学生班级</div>
                            <div><input class="item_input" type="text" name=""></div>
                        </div>
                        <div class="form_item">
                            <div class="item_title">学生学号</div>
                            <div><input class="item_input" type="text" name=""></div>
                        </div>
                        <div class="form_item">
                            <div class="item_title">电话</div>
                            <div><input class="item_input" type="studentName" name=""></div>
                        </div>
                    </div>
                    <div class="studentEditBtn">
                        <img src="/etravel/public/images/editAll.png">
                    </div>
                </div>
                <div class="studentComfirm disflex">
                    <div class="btnItem"><button class="cancel">取消</button></div>
                    <div class="btnItem"><button class="ensure">确定</button></div>
                </div>
                
            </div>
        </div>
    </div>
</template>
<script>
	export default{


	}
</script>