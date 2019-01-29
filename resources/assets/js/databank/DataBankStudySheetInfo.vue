<style>
    .dataBank_input_form{width: 100%;min-height:650px;justify-content: center;align-items:flex-start;font-size: 16px;position: relative;}
    .pane_content{width:70%;height:auto;margin-bottom: 30px;font-size: 16px;margin-top:20px;}
    
    .right_title{width:100%;height:50px;line-height: 50px;position: relative;text-align: center;font-size: 20px;border-bottom: 1px solid #d6d6d6;}
    .title_icon{width:35px;height:35px;position: absolute;left: 8px;top:8px;line-height: 35px;}
    .title_icon>img{width:28px;height: 28px;}

    .form_content{width: 94%;min-height: 210px;align-content:flex-start;flex-direction: row;flex-wrap: wrap;margin-left: 3%;margin-top: 10px;}

    .form_item{width: 100%;min-height:100px;}
    .form_item>div{width: 96%;min-height: 45px;line-height: 45px;}
    .item_title_icon{margin-right: 3%;}
    .item_title_icon>img{height:25px;}
    .item_title_icon>img:hover{cursor: pointer;}
    .item_input{height:40px;padding-left:10px;outline: none;width: 97%;border-radius: 8px;}
    .input2{width:30%;height:40px;padding-left:10px;outline: none;border-radius: 8px;}
    .item_area{width:97%;height:95px;border-radius: 8px;resize:none;line-height:25px;font-size: 14px;outline: none;overflow: hidden;background-color: #eee;}
    .item_add{width:100%;height:80px;}
    .item_add>img{width:80px;height: 80px;}
    .active{font-size: 18px;}    

	.dataBankAddBtn{width:50px;height: 50px;position: absolute;right: 5px;top: 50px;}
    .dataBankAddBtn:hover{cursor:pointer;}
    .dataBankAddBtn>img{width:50px;height: 50px;}
	
    .editBox{width: 600px;min-height:240px;background-color: #fff;border-radius: 15px;}
    .editBoxContent{width:90%;margin-left: 5%;margin-top:20px;flex-flow:row wrap;justify-content: center;align-items: center;}
    .issure{width:100%;height:50px;margin-top: 20px;margin-bottom: 20px;}
    .issure>button{width:60%;height:50px;margin-left: 20%;background-color: #ffde01;font-size: 16px;border-radius: 8px;border: none;outline: none;}

    .editBtnGroup{width:85%;height:50px;line-height: 50px;}
    .editBtnGroup>img{width:40px;height: 40px;margin-left: 25px;float: right;}

    .van-dialog{width:50%;}
</style>

<template>
	<div style="width:100%">
	    <div class="right_title">
		    <div class="title_icon" onclick="window.location.assign('/studySheet')">
		        <img src="../../images/back.png">
		    </div>
		    Day.01
		</div>
		<div class="dataBank_input_form disflex">
		    <div class="pane_content">
		        <div class="form_content disflex">
		            <div class="form_item">
		                <div class="item_title">首图</div>
		                <div class="item_add">
		                    <img src="../../images/add-pic.png">
		                </div>
		            </div>
		            <div class="form_item">
		                <div class="item_title">题目背景文化介绍标题(16个字符以内)</div>
		                <div><input class="item_input" type="text" name=""></div>
		            </div>
		            <div class="form_item" style="width:100%;height:140px;">
		                <div class="item_title">内容
		                    <div class="fr item_title_icon">
		                        <img style="height:35px;border:1px solid #666;border-radius:5px;" src="../../images/insert-pic.png" alt="">
		                    </div>
		                </div>
		                <div>
		                    <textarea class="item_area" placeholder="内容"></textarea>
		                </div>
		            </div>
		            <div class="form_item">
		                <div class="item_title">
		                    设置问题1
		                    <div class="fr item_title_icon">
		                        <img src="../../images/appointAdd.png" alt="">
		                        <img src="../../images/dele.png">
		                    </div>
		                </div>
		                <div><input class="item_input" type="text" name=""></div>
		            </div>
		            <div class="form_item">
		                <div class="item_title">
		                    设置问题2
		                    <div class="fr item_title_icon">
		                        <img src="../../images/appointAdd.png" alt="">
		                        <img src="../../images/dele.png">
		                    </div>
		                </div>
		                <div><input class="item_input" type="text" name=""></div>
		            </div>
		        </div>
		    </div>      
		    <div class="dataBankEditBtn">
		        <img src="../../images/editAll.png">
		    </div>
		</div>
	</div>
</template>

<script>
  export default {

  }
</script>