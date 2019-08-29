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
                        <div class="item_title">{{$t('personal.newCode')}}</div>
                        <div v-if="idd_code"><input type="text" :placeholder="$t('personal.newCode')" disabled="disabled" v-model="idd_code"></div>
                        <div v-else><input type="text" :placeholder="$t('personal.newCode')" disabled="disabled"></div>
                        <!-- <div><input type="text" placeholder="區號" disabled="disabled" v-model="idd_code"></div> -->
                    </div>
                    <div class="form_item_password">
                        <div class="item_title">{{$t('personal.phone')}}</div>
                        <div><input type="text" :placeholder="$t('personal.phone')" disabled="disabled" v-model="phoneNumber"></div>
                    </div>
                    <div class="form_item_password">
                        <div class="item_title">{{$t('personal.phoneCode')}}</div>
                        <div class="disflex" style="justify-content: space-between;">
                            <input type="text" :placeholder="$t('personal.phoneCode')" v-model="smscode" style="width: 56%;">
                            <button class="tc" id="sendCodeUser" @click='getCode()' :disabled="disabled || time > 0">{{text}}</button>
                        </div>
                    </div>
                    <div class="form_item_password">
                        <div class="item_title">{{$t('personal.newPassword')}}</div>
                        <div>
                            <input type="password" :placeholder="$t('personal.newPassword')" v-model="password"/>
                        </div>
                    </div>
                    <div class="form_item_password">
                        <div class="item_title">{{$t('personal.confirmPassword')}}}</div>
                        <div>
                            <input type="password" :placeholder="$t('personal.confirmPassword')" v-model="repassword"/>
                        </div>
                    </div>
                </div>
                <div class="password_btn">
                    <div class="editUser">
                        <button @click="changePassword()">{{$t('edit')}}</button>
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
                this.$toast(this.$t('loginTimeout'));
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
                        this.$toast(this.$t('personal.confirmPsdErr'));
                        this.repassword='';
                    }
                } else {
                    this.$toast(this.$t('personal.formErr'));
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
                            this.$toast(this.$t('register.codeMsg'));
                        } else {
                            this.$toast(res.data.message);
                        }
                    }).catch(err => {
                        if(err.response.data.errors){
                            console.log(err.response.data.errors.phone[0]);
                        }else{
                            console.log(this.$t('register.contentErr'));
                        }
                    });
                } else {
                    this.$toast(this.$t('register.phoneErr'));
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
                return this.time > 0 ? this.time + 's '+this.$t('register.laveTime') : this.$t('register.getCode');
            }
        }
    }
</script>