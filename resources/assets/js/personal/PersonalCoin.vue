<style>
    .personal_input_form{width: 100%;min-height:650px;justify-content: center;align-items:flex-start;font-size: 16px;position: relative;}
    .pane_content_promise{width:70%;height:auto;margin-bottom: 30px;font-size: 16px;margin-top:20px;}
    
    .right_title{width:100%;height:50px;line-height: 50px;text-align: center;font-size: 20px;border-bottom: 1px solid #d6d6d6;}
    .form_content{width: 94%;min-height: 150px;align-content:flex-start;flex-direction: row;flex-wrap: wrap;margin-left: 3%;}

    .form_item_promise{width: 100%;min-height:100px;}
    .form_item_promise>div{width: 96%;min-height: 45px;}

    .item_area{width:97%;height:80px;border-radius: 8px;resize:none;line-height:25px;font-size: 14px;outline: none;overflow: hidden;background-color: #eee;}

    .active{font-size: 18px;}        

    .van-dialog{width:50%;}
    /*金币管理*/
    .personal_right .coins_center{  width:100%;text-align: center;display: inline-block;margin-top: 80px;}
    .coins_center .coins_img{width: 346px;height: 180px;background: url(/etravel/public/images/Gold-BJ.png) no-repeat;display: inline-block;background-size: 100% 100%;}
    .coins_center .coins_info{width: 100%;margin-top: 30px;font-size: 18px;}
    .coins_info p.fonts{display: inline-block;height: 80px;line-height: 80px;}
    .coins_info span.num{font-size: 45px;color: #ffde01;margin: 0px 30px;display: inline-block;}
    .coins_info div{display: inline-block;}
    .coins_info div .pay{height: 50px;line-height: 50px;padding: 0px 55px;background: #E3E3E3;color: #666666;border-radius: 8px;}

</style>

<template>
    <div style="width:100%;">
        <div class="personal_input_form disflex">
            <div class="pane_content_promise">
                <div class="form_content disflex">
                    <div class="personal_right">
                        <div class="coins_center">
                            <div class="coins_img"></div>
                            <div class="coins_info">
                                <p class="fonts">{{$t('personal.laveCoin')}}</p>
                                <span class="num">{{userInfo.tokens}}</span>
                                <div><div class="pay">{{$t('personal.recharge')}}</div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>       
        </div>
    </div>

</template>

<script>
    export default {
        data() {
            return {
                userInfo:{},
            }
        },
        mounted:function(){
            this.getUserInfo();
        },
        methods:{
            getUserInfo(){
                // 获取用户基本信息
                this.$get(this.$config+'/api/user?include=student.school',
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    // console.log(res.data);
                    this.userInfo=res.data;
                }).catch(err => {
                    console.log(err);
                    this.$toast('獲取失敗');
                });
            },
        },
    }
</script>