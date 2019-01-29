<style>
    .dataBank_input_form{width: 100%;min-height:650px;justify-content: center;align-items:flex-start;font-size: 16px;position: relative;}
    .tablist{width:100%;}
    .nav-tabs>li>a{color: #000;}

    .form_content{width: 70%;min-height: 210px;align-content:flex-start;flex-direction: row;flex-wrap: wrap;margin-top:20px;}

    .form_item{width: 100%;min-height:50px;margin:10px 0;}
    .form_item>div{min-height: 50px;line-height: 50px;align-items: center;justify-content: flex-start;}
    .item_left{width:85%;border-radius: 8px;background-color: #d6d6d6;align-items: center;justify-content: flex-start;}
    .item_left>input{height:40px;border-radius: 6px;}
    .item_right{min-width:10%;line-height: 50px;text-align: center;}
    .item_right>img{width:30px;height:30px;}
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
	<div class="dataBank_input_form disflex">
        <div class="form_content disflex">
            <div class="form_item disflex">
                <div class="item_left disflex">
                    <div style="width:40%;margin-left: 5%;">Day.01</div>
                    <div style="width:20%;text-align: center;">日期</div>
                    <input type="text" style="width:30%;" name="">
                </div>
                <div class="item_right">
                    <img onclick="window.location.assign('/studySheetInfo')" src="../../images/See-next.png">
                </div>
            </div>
            <div class="form_item disflex">
                <div class="item_left disflex">
                    <div style="width:40%;margin-left: 5%;">Day.02</div>
                    <div style="width:20%;text-align: center;">日期</div>
                    <input type="text" style="width:30%;" name="">
                </div>
                <div class="item_right">
                    <img onclick="window.location.assign('/studySheetInfo')" src="../../images/See-next.png">
                </div>
            </div>
        </div>
        <div class="dataBankEditBtn">
            <img src="../../images/editAll.png">
        </div>
        <div class="dataBankAddBtn">
            <img src="../../images/add_y.png">
        </div>
        <div class="dataBankDelBtn">
            <img src="../../images/rush-icon.png">
        </div>
    </div>
</template>

<script>
  export default {

  }
</script>