<style>
    .personal_input_form{width: 100%;min-height:650px;justify-content: center;align-items:flex-start;font-size: 16px;position: relative;}
    .pane_content_promise{width:70%;height:auto;margin-bottom: 30px;font-size: 16px;margin-top:20px;}
    
    .right_title{width:100%;height:50px;line-height: 50px;text-align: center;font-size: 20px;border-bottom: 1px solid #d6d6d6;}
    .form_content_pe{width: 94%;min-height: 150px;align-content:flex-start;flex-direction: row;flex-wrap: wrap;margin-left: 3%;}

    .form_item_information{width: 100%;min-height:100px;}
    .form_item_information>div{width: 96%;min-height: 40px;}
    .form_item_information input{width: 100%;min-height: 40px;border: none;border-radius: 8px;border: 1px solid rgb(136,136,136);padding: 0 10px; }
    .item_area{width:97%;height:80px;border-radius: 8px;resize:none;line-height:25px;font-size: 14px;outline: none;overflow: hidden;background-color: #eee;}

    .active{font-size: 18px;}        

	.personalEditBtn{width:50px;height: 50px;position: absolute;right: 20px;top: 20px;}
    .personalEditBtn:hover{cursor:pointer;}
    .personalEditBtn>img{width:50px;height: 50px;}
	
    .editBox{width: 600px;min-height:240px;background-color: #fff;border-radius: 15px;}
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
    .head_edit .info_photo .photo img{width: 100%;border-radius: 50%;}

    .head_edit .info_name input[type="text"]{height: 40px;margin: 10px 0; width: 80%;   padding-left: 15px; border: 1px solid #cdcdcd;  border-radius: 8px;}
    .head_edit .info_name .sex{margin: 10px 0;color: #666666;}
    
    .info_phone input[type="text"]{height: 40px;margin: 10px 0; width: 35%;   padding-left: 15px; border: 1px solid #cdcdcd;  border-radius: 8px;min-width: 350px;}

</style>

<template>
    <div style="width:100%;">
        <div class="personal_input_form disflex">
            <div class="pane_content_promise">

                <div class="form_content_pe" id="view">
                    <div class="head_edit">
                        <div class="info_title">
                            <span>基本资料</span><hr />
                        </div>
                        <div class="info_photo">
                            <p class="padding_none">头像</p>

                            <div class="photo" v-if="personalInfos.avatar">
                                <img class="photo-circle" :src="personalInfos.avatar" />                                                            
                            </div>
                            <div class="photo"  v-else>
                                <img class="photo-circle" src="/etravel/public/images/poto-icon.png" />                                                                                     </div>
                            
                        </div>
                        <div class="info_name">
                            <p class="padding_none">昵称</p>
                            <div class="info_view" v-if="personalInfos.name" >
                                <input disabled="disabled" type="text" v-model="personalInfos.name"/>                                                                
                            </div>
                            <div class="info_view" v-else >
                                <input disabled="disabled" type="text" placeholder="未设置" />                                                                               
                            </div>
                            <p class="padding_none">性别</p>
                            <div class="sex" v-if="personalInfos.sex==0">
                                <input disabled="disabled" type="text" value="女" />                                               
                            </div>
                            <div class="sex" v-else-if="personalInfos.sex==1">
                                <input disabled="disabled" type="text" value="男" />                                               
                            </div>
                            <div class="sex"  v-else>
                                <input disabled="disabled" type="text" placeholder="未设置" />                                                                             
                            </div>
                        </div>
                    </div>
                    <div class="information_edit">
                        <div class="info_title1">
                            <span>个人信息</span><hr />
                        </div>
                        <div class="info_phone">
                            <p class="padding_none">手机号</p>               
                            <div class="info_view" v-if="personalInfos.phone"><input disabled="disabled" type="text" v-model="personalInfos.phone"/></div>
                            <div class="info_view" v-else><input disabled="disabled" type="text" placeholder="未设置" /></div>
                            <p class="padding_none">邮箱</p>
                            <div class="info_view" v-if="personalInfos.email"><input disabled="disabled" type="text" v-model="personalInfos.email"/></div>
                            <div class="info_view" v-else><input disabled="disabled" type="text" placeholder="未设置" /></div>      
                        </div>
                    </div>
                </div>
                <div class="personalEditBtn" @click="edInformationInfoShow()">
		            <img src="/etravel/public/images/edit-all.png">
		        </div>
            </div>       
        </div>
         <van-popup v-model="isEditInformationShow" :overlay="true" style="border-radius: 15px;">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="gather_info">
                        <div class="gather_info_title"><span>编辑信息</span><hr></div>
                    </div>   
                    <div class="form_item_information" style="width:100%;">
                        <div class="item_title">昵称</div>
                        <div>
                            <input class="item_input" placeholder="昵称" type="text" v-model="edInformation.name">
                        </div>
                    </div>
                    <div class="form_item_information" style="width:100%;">
                        <div class="item_title">性别</div>
                        <div>
                            <select id="edTypeId" v-model="edInformation.sex">
                                <option value="">--请选择--</option>
                                <option v-for="item in optList" value="item.value">{{ item.name }}</option>
                            </select>
                        </div>
                    </div>
                    <!-- <div class="form_item_information" style="width:100%;">
                        <div class="item_title">手机号<span class="err" v-if="errors.phone" v-text="errors.phone[0]"></span></div>
                        <div>
                            <input class="item_input" placeholder="手机号" type="text" v-model="edInformation.phone">
                        </div>
                    </div> -->
                    <div class="form_item_information" style="width:100%;">
                        <div class="item_title">邮箱<span class="err" v-if="errors.email" v-text="errors.email[0]"></span></div>
                        <div>
                            <input class="item_input" placeholder="邮箱" type="text" v-model="edInformation.email">
                        </div>
                    </div>
                    
                    <div class="issure">
                        <button @click="editInformation()">修改</button>
                    </div>
                </div>
            </div>
        </van-popup>
    </div>
</template>

<script>
  	export default {
        data(){
            return{
                personalInfos:[],
                optList:[{
                    value:'0',
                    name:'女'
                },{
                    value:'1',
                    name:'男'
                }],
                edInformation:{
                    id:'',
                    name:'',
                    sex:'',
                    // phome:'',
                    email:'',
                },
                isEditInformationShow:false,
                errors:{},
            }
        },
        mounted:function(){
            this.getPersonalInfos();
        },
        methods:{
            getPersonalInfos(){
                // 获取个人资料
                this.$get(this.$config+'/api/user',
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    this.personalInfos=res.data;               
                }).catch(err => {
                    this.$toast('获取失败');
                    // this.$router.push('/');
                    console.log(err);
                });
            },
            edInformationInfoShow(){
                this.edInformation.name=this.personalInfos.name;
                // this.edInformation.phone=this.personalInfos.phone;
                this.edInformation.email=this.personalInfos.email;
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
                        phone:this.edInformation.phone,
                        sex:this.edInformation.sex,    
                        email:this.edInformation.email,  
                    },
                    url: this.$config+'/api/user',
                }).then(res => {
                    if(res.status==200){
                        this.personalInfos.name=this.edInformation.name;
                        // this.personalInfos.phone=this.edInformation.phone;
                        this.personalInfos.sex=this.edInformation.sex;
                        this.personalInfos.email=this.edInformation.email;
                        this.$toast('修改成功');
                        this.isEditInformationShow=false;    
                    }else{
                        this.$toast('修改失败');
                    }
                }).catch(err => {
                    this.$toast('修改失败');
                    console.log(err)
                    this.errors=err.response.data.errors;
                });
            },
        }
  	}
</script>