<style>
    .personal_input_form{width: 100%;min-height:650px;justify-content: center;align-items:flex-start;font-size: 16px;position: relative;}
    .pane_content_promise{width:70%;height:auto;margin-bottom: 30px;font-size: 16px;margin-top:20px;}
    
    .right_title{width:100%;height:50px;line-height: 50px;text-align: center;font-size: 20px;border-bottom: 1px solid #d6d6d6;}
    .form_content{width: 94%;min-height: 150px;align-content:flex-start;flex-direction: row;flex-wrap: wrap;margin-left: 3%;}

    .form_item_password{width: 100%;min-height:100px;}
    .form_item_password>div{width: 96%;min-height: 40px;}
    .form_item_password input{width: 80%;height: 45px;padding: 0 10px;border-radius: 8px;}

    .item_area{width:97%;height:80px;border-radius: 8px;resize:none;line-height:25px;font-size: 14px;outline: none;overflow: hidden;background-color: #eee;}

    .active{font-size: 18px;}   
    .van-dialog{width:50%;}
    .password_btn{width: 100%;margin-left: 20%;}
    .cancel,.edit{height:50px;display: inline;}
    .cancel>button,.edit>button{width:15%;height:50px;background-color: #ffde01;font-size: 16px;border-radius: 8px;border: none;outline: none;}
</style>

<template>
    <div style="width:100%;">
        <div class="personal_input_form disflex">
            <div class="pane_content_promise">
                <div class="form_content disflex">
                    <div class="form_item_password">
                        <div class="item_title">原始密码</span></div>
                        <div>
                            <input type="password" placeholder="请输入原始密码"/>
                        </div>
                    </div>
                    <div class="form_item_password">
                        <div class="item_title">新密码</span></div>
                        <div>
                            <input type="password" placeholder="请输入新密码"/>
                        </div>
                    </div>
                    <div class="form_item_password">
                        <div class="item_title">确认密码</span></div>
                        <div>
                            <input type="password" placeholder="请输入确认密码" disabled="disabled"/>
                        </div>
                    </div>
                </div>
                <div class="password_btn">
                    <div class="cancel">
                        <button>取消</button>
                    </div>
                    <div class="edit">
                        <button>保存</button>
                    </div>
                </div>
            </div>       
        </div>
    </div>

</template>

<script>
  	export default {

  	}
</script>