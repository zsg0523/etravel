<style>
    .personal_input_form{width: 100%;min-height:650px;justify-content: center;align-items:flex-start;font-size: 16px;position: relative;}
    .pane_content_promise{width:70%;height:auto;margin-bottom: 30px;font-size: 16px;margin-top:20px;}
    
    .right_title{width:100%;height:50px;line-height: 50px;text-align: center;font-size: 20px;border-bottom: 1px solid #d6d6d6;}
    .form_content_pe{width: 94%;min-height: 150px;align-content:flex-start;flex-direction: row;flex-wrap: wrap;margin-left: 3%;}

    .form_item_information{width: 100%;min-height:100px;}
    .form_item_information>div{width: 96%;min-height: 40px;}
    .form_item_information input{width: 100%;min-height: 40px;border: none;border-radius: 8px;border: 1px solid rgb(136,136,136);padding: 0 10px; }
    .item_input{height:40px;padding-left:10px;outline: none;width: 90%;border-radius: 8px;}


	.personalEditBtn{width:50px;height: 50px;position: absolute;right: 20px;top: 20px;}
    .personalEditBtn:hover{cursor:pointer;}
    .personalEditBtn>img{width:50px;height: 50px;}
	
    .editBox{width: 760px;min-height:240px;background-color: #fff;border-radius: 15px;}
    .editBoxContent{width:90%;margin-left: 5%;margin-top:20px;flex-flow:row wrap;justify-content: center;align-items: center;}
    .issure{width:100%;height:50px;margin-top: 20px;margin-bottom: 20px;}
    .issure>button{width:60%;height:50px;margin-left: 20%;background-color: #ffde01;font-size: 16px;border-radius: 8px;border: none;outline: none;}

    .editBtnGroup{width:97%;height:50px;line-height: 50px;}
    .editBtnGroup>img{width:40px;height: 40px;margin-right: 25px;float: right;}

    .van-dialog{width:50%;}

    .info_phone,.info_profession{padding: 0 20px;}
    .head_edit, .information_edit{position: relative;}
    .head_edit .info_title,.information_edit .info_title1{  height: 50px;line-height: 50px;font-size: 0;}
    .head_edit .info_title span,.information_edit .info_title1 span{font-size: 16px; text-align: center; display: inline-block;}
    .info_title hr, .info_title1 hr{   margin: 5px 0px;  display: inline-block; padding: 0;border: 0; height: 0; border-top: 1px solid #ffde01; box-sizing: content-box; width: 85%;}
     p.padding_none{margin-bottom:0px;}

    select{width:100%;min-height:40px;border-radius: 8px;line-height:38px;font-size: 14px;outline: none;overflow: hidden;padding: 0 10px;}
    option{ border:1px solid #CCC;border-radius: 8px;background: #fff;}
    option:hover{background-color: #ffde01;  }

    .head_edit .info_photo,.head_edit .info_name{width: 50%;display: inline-block;padding: 0 20px;}
    .head_edit .info_name, .information_edit .info_name{position: absolute;}
    .head_edit .info_photo .photo{width: 150px;height: 150px;}
    .head_edit .info_photo .photo img{width: 100%;max-height:100%;border-radius: 50%;}

    .head_edit .info_name input[type="text"]{height: 40px;margin: 10px 0; width: 70%;   padding-left: 15px; border: 1px solid #cdcdcd;  border-radius: 8px;}
    .head_edit .info_name span{width:30%;display: block;float:left;height: 40px;line-height: 40px;margin: 10px 0;}
    .info_phone input[type="text"]{height: 40px;margin: 10px 0; width: 70%;   padding-left: 15px; border: 1px solid #cdcdcd;  border-radius: 8px;min-width: 350px;}

    .simulateShade01{width:100%;height: 44px;border-width: 2px;border-style: solid;border-top-color: #999;border-left-color: #999;border-right-color: #eee;border-bottom-color: #eee;border-radius: 8px;}
    .editPerson{width:60px;height: 60px;line-height: 60px;display: inline-block;}
    .editPerson>img{width:35px;height: 35px;}
    .sendCode{width:40%;height:40px;line-height:40px;font-size: 16px;background-color: #ffde01;border-radius: 8px;outline: none;border: none;}
    .sendCode:hover{cursor: pointer;}
    button:disabled{background-color: #eee;}
</style>

<template>
    <div style="width:100%;">
        <div class="personal_input_form disflex">
            <div class="pane_content_promise" v-if="personalInfos">
                <div class="form_content_pe" id="view">
                    <div class="head_edit">
                        <div class="info_title">
                            <span>{{$t('personal.basicInfo')}}</span><hr />
                        </div>
                        <div class="info_photo">
                            <p class="padding_none">{{$t('personal.avatar')}}</p>
                            <div class="photo" v-if="personalInfos.avatar">
                                <img class="photo-circle" :src="personalInfos.avatar" />                                                            
                            </div>
                            <div class="photo" v-else>
                                <img class="photo-circle" src="/etravel/public/images/poto-icon.png"/> 
                            </div>
                        </div>
                        <div class="info_name">
                            <!-- <p class="padding_none">中文名</p> -->
                            <div class="info_view" v-if="personalInfos.name" >
                                <span>{{$t('personal.name')}}：</span><input disabled="disabled" type="text" v-model="personalInfos.name"/>                                                                
                            </div>
                            <div class="info_view" v-else >
                                <span>{{$t('personal.name')}}：</span><input disabled="disabled" type="text" :placeholder="$t('personal.name')" />                                                                               
                            </div>
                            <!-- <p class="padding_none">英文名</p> -->
                            <div class="info_view" v-if="personalInfos.en_name" >
                                <span>{{$t('personal.en_name')}}：</span><input disabled="disabled" type="text" v-model="personalInfos.en_name"/>                                             
                            </div>
                            <div class="info_view" v-else >
                                <span>{{$t('personal.en_name')}}：</span><input disabled="disabled" type="text" :placeholder="$t('personal.en_name')" />                                                                               
                            </div>
                            <!-- <p class="padding_none">性别</p> -->
                            <div class="sex" v-if="personalInfos.sex==0">
                                  <span>{{$t('personal.sex')}}：</span><input disabled="disabled" type="text" :value="$t('man')" />                                               
                            </div>
                            <div class="sex" v-else-if="personalInfos.sex==1">
                                  <span>{{$t('personal.sex')}}：</span><input disabled="disabled" type="text" :value="$t('woman')" />                                               
                            </div>
                            <div class="sex"  v-else>
                                  <span>{{$t('personal.sex')}}：</span><input disabled="disabled" type="text" :placeholder="$t('noset')" />                                            
                            </div>
                        </div>
                    </div>
                    <div class="information_edit">
                        <div class="info_title1">
                            <span>{{$t('personal.personalInfo')}}</span><hr />
                        </div>
                        <div class="info_phone">
                            <p class="padding_none">{{$t('personal.phone')}}</p>               
                            <div class="info_view" v-if="personalInfos.phone">
                                <input disabled="disabled" type="text" v-model="personalInfos.phone"/>
                                <div class="editPerson"><img src="/etravel/public/images/edit-all.png" @click="editPhoneShow()"></div>
                            </div>
                            <div class="info_view" v-else>
                                <input disabled="disabled" type="text" :placeholder="$t('noset')" />
                                <div class="editPerson"><img src="/etravel/public/images/edit-all.png" @click="editPhoneShow()"></div>
                            </div>
                            <p class="padding_none">{{$t('personal.email')}}</p>
                            <div class="info_view" v-if="personalInfos.email">
                                <input disabled="disabled" type="text" v-model="personalInfos.email"/>
                                <div class="editPerson"><img src="/etravel/public/images/edit-all.png" @click="editEmailShow()"></div>
                            </div>
                            <div class="info_view" v-else>
                                <input disabled="disabled" type="text" :placeholder="$t('noset')" />
                                <div class="editPerson"><img src="/etravel/public/images/edit-all.png" @click="editEmailShow()"></div>
                            </div>      
                        </div>
                    </div>
                </div>
                <div class="personalEditBtn" @click="edInformationInfoShow()">
		            <img src="/etravel/public/images/edit-all.png">
		        </div>
            </div>       
        </div>
        <van-popup v-model="isEditInformationShow" :overlay="true">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="gather_info">
                        <div class="gather_info_title"><span>{{$t('edit')}}</span><hr></div>
                    </div>   
                    <div class="form_item_information" style="width:100%;">
                        <div class="item_title">{{$t('personal.name')}}</div>
                        <div>
                            <input class="item_input" :placeholder="$t('personal.name')" type="text" v-model="edInformation.name">
                        </div>
                    </div>
                    <div class="form_item_information" style="width:100%;">
                        <div class="item_title">{{$t('personal.en_name')}}</div>
                        <div>
                            <input class="item_input" :placeholder="$t('personal.en_name')" type="text" v-model="edInformation.en_name">
                        </div>
                    </div>
                    <div class="form_item_information" style="width:100%;">
                        <div class="item_title">{{$t('personal.sex')}}</div>
                        <div>
                            <select id="edTypeId" v-model="edInformation.sex">
                                <option value="">--{{$t('pleaseChoose')}}--</option>
                                <option v-for="item in optList" :value="item.value">{{ item.name }}</option>
                            </select>
                        </div>
                    </div>
                    <!-- <div class="form_item_information" style="width:100%;">
                        <div class="item_title">手機號<span class="err" v-if="errors.phone" v-text="errors.phone[0]"></span></div>
                        <div>
                            <input class="item_input" placeholder="手機號" type="text" v-model="edInformation.phone">
                        </div>
                    </div> -->
                    <!-- <div class="form_item_information" style="width:100%;">
                        <div class="item_title">郵箱<span class="err" v-if="errors.email" v-text="errors.email[0]"></span></div>
                        <div>
                            <input class="item_input" placeholder="郵箱" type="text" v-model="edInformation.email">
                        </div>
                    </div> -->
                    
                    <div class="issure">
                        <button @click="editInformation()">{{$t('edit')}}</button>
                    </div>
                </div>
            </div>
        </van-popup>
        <van-popup v-model="isEditPhone" :overlay="true">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item_information" style="width:100%;">
                        <div class="item_title">{{$t('personal.oldCode')}}</div>
                        <div>
                            <input class="item_input" :placeholder="$t('personal.oldCode')" type="text" disabled="disabled" v-model="personalInfos.code">
                        </div>
                    </div>
                    <div class="form_item_information" style="width:100%;">
                        <div class="item_title">{{$t('personal.oldPhone')}}</div>
                        <div>
                            <input class="item_input" :placeholder="$t('personal.oldPhone')" type="text" disabled="disabled" v-model="personalInfos.phone">
                        </div>
                    </div>
                    <div class="form_item_information" style="width:100%;">
                        <div class="item_title">{{$t('personal.phoneCode')}}</div>
                        <div class="disflex" style="justify-content: space-between;">
                            <input type="text" :placeholder="$t('personal.phoneCode')" v-model="phoneCode" style="width: 56%;">
                            <button class="tc sendCode" @click='getPhoneCode()' :disabled="disabled || time > 0">{{text}}</button>
                        </div>
                    </div>
                    <div class="form_item_information" style="width:100%;">
                        <div class="item_title">{{$t('personal.newCode')}}</div>
                        <div>
                            <div class="simulateShade01">
                                <AreaCodeSelector @selectedAreaCode='selectedAreaCode' :areaCode='areacode'></AreaCodeSelector>
                            </div>
                        </div>
                    </div>
                    <div class="form_item_information" style="width:100%;">
                        <div class="item_title">{{$t('personal.newPhone')}}</div>
                        <div>
                            <input class="item_input" :placeholder="$t('personal.newPhone')" type="text" v-model="phone">
                        </div>
                    </div>
                    <div class="issure">
                        <button @click="editPhone()">{{$t('edit')}}</button>
                    </div>
                </div>
            </div>
        </van-popup>
        <van-popup v-model="isEditEmail" :overlay="true">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item_information" style="width:100%;">
                        <div class="item_title">{{$t('personal.newEmail')}}</div>
                        <div>
                            <input class="item_input" :placeholder="$t('personal.newEmail')" type="text" v-model="email">
                        </div>
                    </div>
                    <div class="form_item_information" style="width:100%;">
                        <div class="item_title">{{$t('personal.phoneCode')}}</div>
                        <div class="disflex" style="justify-content: space-between;">
                            <input type="text" :placeholder="$t('personal.phoneCode')" v-model="emailCode" style="width: 56%;">
                            <button class="tc sendCode" @click='getEmailCode()' :disabled="emailDisabled || emailTime > 0">{{emailText}}</button>
                        </div>
                    </div>
                    <div class="issure">
                        <button @click="editEmail()">{{$t('edit')}}</button>
                    </div>
                </div>
            </div>
        </van-popup>
    </div>
</template>

<script>
    import AreaCodeSelector from '../components/AreaCodeSelector.vue';
  	export default {
        components: {
            AreaCodeSelector,
        },
        data(){
            return{
                personalInfos:[],
                optList:[{
                    value:'0',
                    name:this.$t('man'),
                },{
                    value:'1',
                    name:this.$t('weman'),
                }],
                edInformation:{
                    id:'',
                    name:'',
                    en_name:'',
                    sex:'',
                },
                isEditInformationShow:false,
                errors:{},
                isEditPhone:false,
                isEditEmail:false,
                time: 0,
                emailTime:0,
                disabled:false,
                phone:'',
                phoneCode:'',
                phoneKey:'',
                areacode:'',
                email:'',
                emailCode:'',
                emailKey:'',
                emailDisabled:false,
            }
        },
        mounted:function(){
            this.getPersonalInfos();
        },
        methods:{
            getPersonalInfos(){
                // 獲取个人资料
                this.$get(this.$config+'/api/user',
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    this.personalInfos=res.data;               
                }).catch(err => {
                    this.$toast(this.$t('loginTimeout'));
                    // this.$router.push('/');
                    console.log(err);
                });
            },
            edInformationInfoShow(){
                this.edInformation.name=this.personalInfos.name;
                this.edInformation.en_name=this.personalInfos.en_name;
                // this.edInformation.phone=this.personalInfos.phone;
                // this.edInformation.email=this.personalInfos.email;
                this.edInformation.sex=this.personalInfos.sex;
                this.isEditInformationShow=true;
            },
            editInformation(){
                // 修改个人资料/api/evaluationCategories/1/evaluations/51
                this.$ajax({
                    method: 'PATCH',
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    },
                    data:{
                        name:this.edInformation.name,
                        en_name:this.edInformation.en_name,
                        // phone:this.edInformation.phone,
                        sex:this.edInformation.sex,    
                        // email:this.edInformation.email,  
                    },
                    url: this.$config+'/api/user',
                }).then(res => {
                    if(res.status==200){
                        this.personalInfos.name=this.edInformation.name;
                        this.personalInfos.en_name=this.edInformation.en_name;
                        // this.personalInfos.phone=this.edInformation.phone;
                        this.personalInfos.sex=this.edInformation.sex;
                        // this.personalInfos.email=this.edInformation.email;
                        this.$toast(this.$t('editSuccess'));
                        this.isEditInformationShow=false;    
                    }else{
                        this.$toast(this.$t('editFail'));
                    }
                }).catch(err => {
                    this.$toast(this.$t('editFail'));
                    console.log(err)
                    // this.errors=err.response.data.errors;
                    if(err.response.data.errors){
                        for(var key in err.response.data.errors){
                            this.$toast(err.response.data.errors[key][0]);
                        }
                    }else{
                        this.$toast(err.response.data.message);
                    }
                });
            },
            editPhoneShow(){
                this.isEditPhone=true;
            },
            getPhoneCode() {
                if (this.personalInfos.phone&&this.personalInfos.code) {
                    axios.post(this.$config+'/api/verificationCodes', {
                        phone: this.personalInfos.phone,
                        idd_code:this.personalInfos.code,
                        un_unique:1,
                    }).then(res => {
                        console.log(res.data);
                        if (res.data.key) {
                            // this.setUserInfo(res)
                            this.run();
                            this.phoneKey=res.data.key;
                            this.$toast(this.$t('register.codeMsg'));
                        } else {
                            this.$toast(res.data.message);
                        }
                    }).catch(err => {
                        console.log(err);
                        if(err.response.data.errors){
                            for(var key in err.response.data.errors){
                                this.$toast(err.response.data.errors[key][0]);
                            }
                        }else{
                            this.$toast(err.response.data.message);
                        }
                        
                    });
                } else {
                    this.$toast(this.$t('personal.oldPhoneErr'));
                }
            },
            editPhone(){
                if(this.phoneCode){
                    if(this.phone){
                        this.$ajax({
                            method: 'PATCH',
                            headers: {
                                "Authorization": 'Bearer '+sessionStorage.token,
                            },
                            data:{
                                code: this.areacode,
                                phone: this.phone,
                                verification_code: this.phoneCode,
                                verification_key: this.phoneKey,       
                            },
                            url: this.$config+'/api/phone',
                        }).then(res => {
                            if(res.status==200){
                                this.$toast(this.$t('editSuccess'));
                                this.personalInfos.phone=this.phone;
                                this.personalInfos.code=this.areacode;
                                this.isEditPhone=false;    
                            }else{
                                this.$toast(this.$t('editFail'));
                            }
                        }).catch(err => {
                            this.$toast(this.$t('editFail'));
                            console.log(err)
                            // this.errors=err.response.data.errors;
                            if(err.response.data.errors){
                                for(var key in err.response.data.errors){
                                    this.$toast(err.response.data.errors[key][0]);
                                }
                            }else{
                                this.$toast(err.response.data.message);
                            }
                        });
                    }else{
                        this.$toast(this.$t('newPhoneErr'));
                    }
                }else{
                    this.$toast(this.$t('codeErr'));
                }
            },
            editEmailShow(){
                this.isEditEmail=true;
                this.email=this.personalInfos.email;
            },
            getEmailCode() {
                if (this.email) {
                    axios.post(this.$config+'/api/emailCodes', {
                        email: this.email,
                    }).then(res => {
                        console.log(res.data);
                        if (res.data.key) {
                            // this.setUserInfo(res)
                            this.emailRun();
                            this.emailKey=res.data.key;
                            this.emailDisabled=true;
                            this.$toast(this.$t('register.codeMsg'));
                        } else {
                            this.$toast(res.data.message);
                        }
                    }).catch(err => {
                        console.log(err);
                        if(err.response.data.errors){
                            for(var key in err.response.data.errors){
                                this.$toast(err.response.data.errors[key][0]);
                            }
                        }else{
                            this.$toast(err.response.data.message);
                        }
                        
                    });
                } else {
                    this.$toast(this.$t('register.newEmailErr'));
                }
            },
            editEmail(){
                this.$ajax({
                    method: 'PATCH',
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    },
                    data:{
                        email: this.email,
                        code: this.emailCode,
                        key: this.emailKey,       
                    },
                    url: this.$config+'/api/email',
                }).then(res => {
                    if(res.status==200){
                        this.$toast(this.$t('editSuccess'));
                        this.personalInfos.email=this.email;
                        this.isEditEmail=false;    
                    }else{
                        this.$toast(this.$t('editFail'));
                    }
                    this.emailCode='';
                    this.emailDisabled=true;
                    this.emailTime=0;
                }).catch(err => {
                    this.emailCode='';
                    this.emailDisabled=true;
                    this.emailTime=0;
                    console.log(err);
                    if(err.response.data.errors){
                        for(var key in err.response.data.errors){
                            this.$toast(err.response.data.errors[key][0]);
                        }
                    }else{
                        this.$toast(err.response.data.message);
                    }
                });
            },
            run() {
                this.time=60;
                this.timer();
            },
            emailRun() {
                this.emailTime=600;
                this.emailTimer();
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
            emailTimer() {
                if (this.emailTime > 0) {
                    this.emailTime--;
                    this.emailDisabled = true;
                    setTimeout(this.emailTimer, 1000);
                }else{
                    this.emailDisabled = false;
                    this.emailTime=0;
                }
            },
            selectedAreaCode(value){
                this.areacode=value;
            },
        },
        computed: {
            text() {
                return this.time > 0 ? this.time + 's '+this.$t('register.laveTime') : this.$t('register.getCode');
            },
            emailText() {
                return this.emailTime > 0 ? this.emailTime + 's '+this.$t('register.laveTime') : this.$t('register.getCode');
            }
        }
  	}
</script>