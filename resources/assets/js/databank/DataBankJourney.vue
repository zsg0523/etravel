<style>
    .dataBank_input_form{width: 100%;min-height:650px;justify-content: center;align-items:flex-start;font-size: 16px;position: relative;}
    .tablist{width:100%;}
    .nav-tabs>li>a{color: #000;}
    .pane_content_journey{width:70%;margin-left: 15%;height:auto;margin-bottom: 30px;font-size: 16px;margin-top:20px;}

    .form_content_journey{width: 94%;min-height: 120px;align-content:flex-start;flex-direction: row;flex-wrap: wrap;margin-left: 3%;}

    .form_item_journey{width: 100%;min-height:50px;}
    .form_item_journey>div{min-height: 50px;line-height: 50px;align-items: center;justify-content: flex-start;}
    .item_input{height:40px;padding-left:10px;outline: none;width: 90%;border-radius: 8px;}
    .item_left{width:85%;border-radius: 8px;background-color: #d6d6d6;align-items: center;justify-content: flex-start;}
    .item_left>input{height:40px;border-radius: 6px;}
    .item_right{min-width:10%;line-height: 50px;text-align: center;}
    .item_right>img{width:30px;height:30px;}
    .active{font-size: 18px;}        

	.dataBankAddBtn_journey{width:50px;height: 50px;position: absolute;right: 5px;top: 5px;}
    .dataBankAddBtn_journey:hover{cursor:pointer;}
    .dataBankAddBtn_journey>img{width:50px;height: 50px;}
	
    .editBox{width: 760px;min-height:240px;background-color: #fff;border-radius: 15px;}
    .editBoxContent{width:90%;margin-left: 5%;margin-top:20px;flex-flow:row wrap;justify-content: center;align-items: center;}
    .issure{width:100%;height:50px;margin-top: 20px;margin-bottom: 20px;}
    .issure>button{width:60%;height:50px;margin-left: 20%;background-color: #ffde01;font-size: 16px;border-radius: 8px;border: none;outline: none;}

    .editBtnGroup_journey{width:85%;height:50px;line-height: 50px;}
    .editBtnGroup_journey>img{width:40px;height: 40px;margin-left: 25px;float: right;}

    .van-dialog{width:50%;}

</style>

<template>
	<div class="dataBank_input_form disflex">
        <div class="tablist">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#journey" aria-controls="journey" role="tab" data-toggle="tab">景點安排</a></li>
                <li role="presentation"><a href="#flight" aria-controls="flight" role="tab" data-toggle="tab">膳食安排</a></li>
            </ul>
            <div class="tab-content">
                <!-- 行程安排 -->
                <div role="tabpanel" class="tab-pane active" id="journey">
                    <div class="pane_content_journey">
                        <div class="form_content_journey disflex">
                            <div class="form_item_journey">
                                <div class="item_title">景點安排</div>
                                <div style="border:1px solid #ccc;border-radius: 8px;width:97%;background-color:#eeeeee;line-height:25px;" v-html="travelInfo.view_plan"></div>
                            </div>
                        </div>
                        <div class="dataBankAddBtn_journey" @click="editViewShow();">
				            <img src="/etravel/public/images/edit-all.png">
				        </div>
                    </div>   
                </div>

                <!-- 膳食安排 -->
                <div role="tabpanel" class="tab-pane" id="flight">
                    <div class="pane_content_journey">
                        <div class="form_content_journey disflex">
                            <div class="form_item_journey">
                                <div class="item_title">膳食安排</div>
                                <div style="border:1px solid #ccc;border-radius: 8px;width:97%;background-color:#eeeeee;line-height:25px;" v-html="travelInfo.meal_plan"></div>
                            </div>
                        </div>
                        <div class="dataBankAddBtn_journey" @click="editMealShow();">
				            <img src="/etravel/public/images/edit-all.png">
				        </div>
                    </div>    
                </div>
            </div>
        </div>
        <van-popup v-model="isEditViewShow" :overlay="true">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item_journey">
                        <div class="item_title">景點安排</div>
                        <div><Editor @catchData='catchData' :childData='view_plan'></Editor></div>
                    </div>
                    <div class="issure">
                        <button @click="editTravelInfo()">保存</button>
                    </div>
                </div>
            </div>
        </van-popup>
        <van-popup v-model="isEditMealShow" :overlay="true">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item_journey">
                        <div class="item_title">膳食安排</div>
                        <div><Editor @catchData='catchData' :childData='meal_plan'></Editor></div>
                    </div>
                    <div class="issure">
                        <button @click="editTravelInfo()">保存</button>
                    </div>
                </div>
            </div>
        </van-popup>
    </div>
</template>

<script>
    import Editor from '../components/Editor.vue';
  	export default {
        components: {
            Editor,
        },
  		data() {
            return {
                travelInfo:{},
	        	isEditViewShow:false,
	        	isEditMealShow:false,
                edStatus:0,
                view_plan:'',
                meal_plan:'',
            }
        },
        mounted:function(){
            this.getTravelInfo();
        },
        methods:{
            getTravelInfo(){
                // 获取旅游的基本信息
                this.$get(this.$config+'/api/travels/'+sessionStorage.actTravelId,
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    this.travelInfo=res.data;
                    this.view_plan=res.data.view_plan;
                    this.meal_plan=res.data.meal_plan;
                }).catch(err => {
                    this.$toast('獲取失敗');
                    console.log(err);
                });
            },
            editViewShow(){
                this.isEditViewShow=true;
                this.edStatus=0;
            },
            editMealShow(){
                this.isEditMealShow=true;
                this.edStatus=1;
            },
            editTravelInfo(){
                // 修改旅游基本信息
                this.$ajax({
                    method: 'PATCH',
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    },
                    data:{
                        view_plan:this.view_plan,
                        meal_plan:this.meal_plan,
                    },
                    url: this.$config+'/api/travels/'+sessionStorage.actTravelId,
                }).then(res => {
                    // console.log(res);
                    if(res.status==200){
                        this.$toast('修改成功');
                        this.travelInfo.view_plan=this.view_plan;
                        this.travelInfo.meal_plan=this.meal_plan;
                        this.isEditViewShow=false;
                        this.isEditMealShow=false;
                    }else{
                        this.$toast('修改失敗');
                    }
                }).catch(err => {
                    this.$toast('修改失敗');
                    if(err.response.data.errors){
                        for(var key in err.response.data.errors){
                            this.$toast(err.response.data.errors[key][0]);
                        }
                    }else{
                        this.$toast(err.response.data.message);
                    }
                    console.log(err);
                });
            },
            catchData(value){
                if(this.edStatus==0){
                    this.view_plan=value;
                }else if(this.edStatus==1){
                    this.meal_plan=value;
                }
            },
        },
  	}
</script>