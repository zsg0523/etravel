<style>
    .personal_input_form{width: 100%;min-height:650px;justify-content: center;align-items:flex-start;font-size: 16px;position: relative;}
    .pane_content_promise{width:70%;height:auto;margin-bottom: 30px;font-size: 16px;margin-top:20px;}
    
    .right_title{width:100%;height:50px;line-height: 50px;text-align: center;font-size: 20px;border-bottom: 1px solid #d6d6d6;}
    .form_content{width: 94%;min-height: 150px;align-content:flex-start;flex-direction: row;flex-wrap: wrap;margin-left: 3%;}

    .form_item_password{width: 100%;min-height:100px;}
    .form_item_password>div{width: 96%;min-height: 40px;}
    .form_item_password input{width: 100%;height: 45px;padding: 0 10px;border-radius: 8px;}
    .form_item_password>div button{width: 100%;height: 45px;border: none;outline: none;background-color: #ffde01;border-radius: 8px;font-weight: bold;font-size: 16px;}
    #sendCodeUser{width:40%;height:45px;line-height:45px;font-size: 16px;background-color: #ffde01;border-radius: 8px;outline: none;border: none;}
    #sendCodeUser:hover{cursor: pointer;}

    .item_area{width:97%;height:80px;border-radius: 8px;resize:none;line-height:25px;font-size: 14px;outline: none;overflow: hidden;background-color: #eee;}

    .active{font-size: 18px;}   
    .van-dialog{width:50%;}
    .password_btn{width: 94%;}
    .editUser{height:50px;display: inline;}
    .editUser>button{width:60%;margin-left:20%;height:50px;background-color: #ffde01;font-size: 16px;border-radius: 8px;border: none;outline: none;}
</style>

<template>
    <div style="width:100%;">
        <div class="personal_input_form disflex">
            <div class="pane_content_promise">
                <div class="form_content disflex">
                    <div class="form_item_password">
                        <div class="item_title">區號</div>
                        <div v-if="idd_code"><input type="text" placeholder="區號" disabled="disabled" v-model="idd_code"></div>
                        <div v-else><input type="text" placeholder="未設定區號" disabled="disabled"></div>
                        <!-- <div><input type="text" placeholder="區號" disabled="disabled" v-model="idd_code"></div> -->
                    </div>
                    <div class="form_item_password">
                        <div class="item_title">手機號碼</div>
                        <div><input type="text" placeholder="手機號" disabled="disabled" v-model="phoneNumber"></div>
                    </div>
                    <div class="form_item_password">
                        <div class="item_title">驗證碼</div>
                        <div class="disflex" style="justify-content: space-between;">
                            <input type="text" placeholder="驗證碼" v-model="smscode" style="width: 56%;">
                            <button class="tc" id="sendCodeUser" @click='getCode()' :disabled="disabled || time > 0">{{text}}</button>
                        </div>
                    </div>
                    <div class="form_item_password">
                        <div class="item_title">新密碼</div>
                        <div>
                            <input type="password" placeholder="請輸入新密碼" v-model="password"/>
                        </div>
                    </div>
                    <div class="form_item_password">
                        <div class="item_title">確認密碼</div>
                        <div>
                            <input type="password" placeholder="請輸入確認密碼" v-model="repassword"/>
                        </div>
                    </div>
                </div>
                <div class="password_btn">
                    <div class="editUser">
                        <button @click="changePassword()">修改</button>
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
                phoneNumber: '',
                idd_code:'',
                smscode:'',
                password: '',
                repassword:'',
                key:'',
                time: 0,
                disabled:false,
            }
        },
        mounted:function(){
            this.$get(this.$config+'/api/user',
            {
                headers: {
                    "Authorization": 'Bearer '+sessionStorage.token,
                }
            }).then(res => {
                // console.log(res.data);
                this.phoneNumber=res.data.phone;
                this.idd_code=res.data.code;
            }).catch(err => {
                console.log(err);
                this.$toast('登入失效');
                sessionStorage.clear();
                this.setUserInfo('');
                this.setTravels('');
                this.setToken('');
                this.$router.push("/");
            });
        },
        methods: {
            changePassword() {
                if (this.password && this.repassword && this.smscode) {
                    if(this.password == this.repassword){
                        this.$post(this.$config+'/api/password/reset', {
                            password: this.password,
                            password_confirmation:this.repassword,
                            verification_code: this.smscode,
                            verification_key: this.key,
                            phone:this.phoneNumber,
                        }).then(res => {
                            // console.log(res.data);
                            this.$toast(res.data.message);
                            sessionStorage.clear();
                            this.$router.push('/');
                        }).catch(err => {
                            console.log(err)
                        });
                    }else{
                        this.$toast('兩次密碼不一致！');
                        this.repassword='';
                    }
                } else {
                    this.$toast('請填寫完整資訊');
                }
            },
            getCode() {
                if (this.phoneNumber) {
                    axios.post(this.$config+'/api/verificationCodes', {
                        phone: this.phoneNumber,
                        un_unique:1,    
                    }).then(res => {
                        this.run();
                        // console.log(res.data);
                        if (res.data.key) {
                            // this.setUserInfo(res)
                            this.key=res.data.key;
                            this.$toast('驗證碼已成功發送，請注意查收。');
                        } else {
                            this.$toast(res.data.message);
                        }
                    }).catch(err => {
                        if(err.response.data.errors){
                            console.log(err.response.data.errors.phone[0]);
                        }else{
                            console.log('獲取驗證碼失敗');
                        }
                    });
                } else {
                    this.$toast('請填寫手機號碼');
                }
            },
            run() {
                this.time=60;
                this.timer();
            },
            setDisabled: function(val){
                this.disabled = val;
            },
            timer() {
                if (this.time > 0) {
                    this.time--;
                    this.disabled = true;
                    setTimeout(this.timer, 1000);
                }else{
                    this.disabled = false;
                    this.time=0;
                }
            },
        },
        computed: {
            text() {
                return this.time > 0 ? this.time + 's 後重獲取' : '獲取驗證碼';
            }
        }
    }
</script>