<style>
    .personal_input_form{width: 100%;min-height:650px;justify-content: center;align-items:flex-start;font-size: 16px;position: relative;}
    .pane_content_information{width:70%;height:auto;margin-bottom: 30px;font-size: 16px;margin-top:20px;}
    
    .form_content{width: 94%;min-height: 100px;align-content:flex-start;flex-direction: row;flex-wrap: wrap;margin-left: 3%;}

    .form_item_information{width: 100%;height:auto;padding: 10px 0; border-bottom: 1px solid #e3e3e3;     align-content: flex-start;
        -webkit-box-orient: horizontal; -webkit-box-direction: normal; -ms-flex-direction: row; flex-direction: row;}

    .form_item_information>div{width: 96%;}
    .form_item_information>.informationl{width: 10%;display: inline-block;margin-right: 10px;}
    .informationl>img{width: 100%;}
    .form_item_information>.informationr{width: 90%;overflow: hidden;}

    .item_title_information{font-size: 18px;}
    .item_title_information>span{float: right;width: 30px;}
    span:hover{cursor: pointer;}
    span>img{width: 100%;}

    .item_content_information{width:100%;height:auto;border-radius: 8px;line-height:25px;font-size: 14px;overflow: hidden;text-overflow:ellipsis;white-space: nowrap;}

    .active{font-size: 18px;}        

    .van-dialog{width:50%;}

</style>

<template>
    <div style="width:100%;">
        <div class="personal_input_form disflex">
            <div class="pane_content_information">
                <div class="form_content disflex">
                    <div class="form_item_information disflex" v-for="(information,index) in informations">
                        <div class="informationl"><img src="/etravel/public/images/information.png" /></div>
                        <div class="informationr">
                            <div class="item_title_information">系统消息<span  @click="changeShow(index)"><img src="/etravel/public/images/down.png"></span></div>
                            <div class="item_content_information">{{information.data.travel_name}}</div>
                        </div>
                    </div>
                </div>
            </div>       
        </div>
        <van-popup v-model="isInformationShow" :overlay="true" style="border-radius: 15px;">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item_information">
                        <div class="item_title">消息详情</div>
                        <div>{{showInformation.travel_name}}</div>
                    </div>
                </div>
            </div>
        </van-popup> 
    </div>
</template>

<script>
  	export default {
        data(){
             return {
                informations:[],
                showInformation:{
                    travel_name:'',
                },
                isInformationShow:false,
             }
        },
        mounted:function(){
            this.getInformations();
        },
        methods:{
            getInformations(){
                // 获取消息详情
                this.$get('/api/user/notifications',
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    // console.log(res.data);
                    //this.eval=res.data;
                    this.informations=res.data.data;
                }).catch(err => {
                    this.$toast('获取失败');
                    console.log(err);
                });
            },
            changeShow(index){
                this.showInformation.travel_name=this.informations[index].travel_name;
                this.isInformationShow=true;
            },
        }
  	}
</script>