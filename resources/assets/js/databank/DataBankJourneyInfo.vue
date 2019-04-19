<style>
    .dataBank_input_form{width: 100%;min-height:650px;justify-content: center;align-items:flex-start;font-size: 16px;position: relative;}
    .pane_content{width:70%;height:auto;margin-bottom: 30px;font-size: 16px;margin-top:20px;}
    
    .right_title{width:100%;height:50px;line-height: 50px;position: relative;text-align: center;font-size: 20px;border-bottom: 1px solid #d6d6d6;}
    .title_icon{width:35px;height:35px;position: absolute;left: 8px;top:8px;line-height: 35px;}
    .title_icon>img{width:28px;height: 28px;}

    .form_content_journeyInfo{width: 94%;min-height: 210px;align-content:flex-start;flex-direction: row;flex-wrap: wrap;margin-left: 3%;margin-top: 10px;}

    .form_item_journeyInfo{width: 100%;min-height:80px;}
    .form_item_journeyInfo>div{width: 96%;min-height: 45px;line-height: 45px;}
    .item_input_journeyInfo{height:40px;padding-left:10px;outline: none;width: 97%;border-radius: 8px;}
    .item_area{width:97%;min-height:80px;border-radius: 8px;resize:none;line-height:25px;font-size: 14px;outline: none;overflow: hidden;}

    .active{font-size: 18px;}     

	.dataBankAddBtn_journeyInfo{width:50px;height: 50px;position: absolute;right: 5px;top: 5px;}
    .dataBankAddBtn_journeyInfo:hover{cursor:pointer;}
    .dataBankAddBtn_journeyInfo>img{width:50px;height: 50px;}
	
    .editBox{width: 760px;min-height:240px;background-color: #fff;border-radius: 15px;}
    .editBoxContent{width:90%;margin-left: 5%;margin-top:20px;flex-flow:row wrap;justify-content: center;align-items: center;}
    .issure{width:100%;height:50px;margin-top: 20px;margin-bottom: 20px;}
    .issure>button{width:60%;height:50px;margin-left: 20%;background-color: #ffde01;font-size: 16px;border-radius: 8px;border: none;outline: none;}

    .editBtnGroup_journeyInfo{width:94%;height:50px;line-height: 50px;}
    .editBtnGroup_journeyInfo>img{width:40px;height: 40px;margin-left: 25px;float: right;}

    .van-dialog{width:50%;}
</style>

<template>
	<div style="width:100%;">
		<div class="right_title">
            <div class="title_icon" @click="$router.push('/journey/dataBankJourney')">
                <img src="/etravel/public/images/back.png">
            </div>
            {{journey.day}}
        </div>
        <div class="dataBank_input_form disflex">
            <div class="pane_content">
                <div class="form_content_journeyInfo disflex" v-for="(journeyInfo,index) in journeyInfos">
                    <!-- <div class="form_item_journeyInfo">
		                <div class="item_title">时间点</div>
		                <div><input class="item_input_journeyInfo" placeholder="时间点(hh:mm)" type="text" disabled="disabled"  :value="journeyInfo.time"></div>
		            </div> -->
		            <div class="form_item_journeyInfo">
		                <div class="item_title">景点内容(必填)</div>
		                <div><input class="item_input_journeyInfo" placeholder="景点内容" type="text" disabled="disabled"  :value="journeyInfo.content"></div>
		            </div>
                    <div class="form_item_journeyInfo">
                        <div class="item_title">景点介绍(必填)</div>
                        <div>
                            <textarea class="item_area" disabled="disabled" placeholder="景点介绍" :value="journeyInfo.description"></textarea>
                        </div>
                    </div>
                    <div class="editBtnGroup_journeyInfo">
		                <img @click="delJourneyInfo(journeyInfo.id)" src="/etravel/public/images/rush-icon.png">
		                <img @click="editJourneyInfoShow(index)" src="/etravel/public/images/edit-all.png">
		            </div>
                </div>
            </div> 
            <div class="dataBankAddBtn_journeyInfo" @click="addNewJourneyInfoShow()">
	            <img src="/etravel/public/images/add_y.png">
	        </div>   
        </div>
        <van-popup v-model="isNewJourneyInfoShow" :overlay="true">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <!-- <div class="form_item_journeyInfo">
		                <div class="item_title">时间点</div>
		                <div><input class="item_input_journeyInfo" placeholder="时间点(hh:mm)" type="text" v-model="newJourneyInfo.time"></div>
		            </div> -->
		            <div class="form_item_journeyInfo">
		                <div class="item_title">景点内容(必填)</div>
		                <div><input class="item_input_journeyInfo" placeholder="景点内容" type="text" v-model="newJourneyInfo.content"></div>
		            </div>
                    <div class="form_item_journeyInfo">
                        <div class="item_title">景点介绍(必填)</div>
                        <div>
                            <textarea class="item_area" placeholder="景点介绍" v-model="newJourneyInfo.description"></textarea>
                        </div>
                    </div>
                    <div class="issure">
                        <button @click="addNewJourneyInfo()">添加</button>
                    </div>
                </div>
            </div>
        </van-popup>
        <van-popup v-model="isEditJourneyInfoShow" :overlay="true">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <!-- <div class="form_item_journeyInfo">
		                <div class="item_title">时间</div>
		                <div><input class="item_input_journeyInfo" placeholder="时间" type="text"  v-model="edJourneyInfo.time"></div>
		            </div> -->
		            <div class="form_item_journeyInfo">
		                <div class="item_title">内容</div>
		                <div><input class="item_input_journeyInfo" placeholder="内容" type="text" v-model="edJourneyInfo.content" ></div>
		            </div>
                    <div class="form_item_journeyInfo">
                        <div class="item_title">介绍</div>
                        <div>
                            <textarea class="item_area"  placeholder="介绍" v-model="edJourneyInfo.description"></textarea>
                        </div>
                    </div>
                    <div class="issure">
                        <button @click="editJourneyInfo()">修改</button>
                    </div>
                </div>
            </div>
        </van-popup>  
	</div>
</template>

<script>
  	export default {
  		data() {
            return {
            	journey:'',
	        	journeyInfos:[],
	        	newJourneyInfo:{
	        		// time:'',
	        		content:'',
	        		description:'',
	        	},
	        	edJourneyInfo:{
	        		id:'',
	        		// time:'',
	        		content:'',
	        		description:'',
	        		index:'',
	        	},
	        	isNewJourneyInfoShow:false,
	        	isEditJourneyInfoShow:false,
            }
        },
        mounted:function(){
        	this.getJourneyInfos();
        },
        methods:{
            getJourneyInfos(){
                // 获取景点
                this.$ajax({
                    method: 'GET',
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    },
                    url: this.$config+'/api/travel/'+sessionStorage.actTravelId+'/route/'+this.$route.params.id+'?include=sceneries',
                }).then(res => {
                    // console.log(res.data.sceneries.data);
                    this.journey=res.data;
                    this.journeyInfos=res.data.sceneries.data;
                }).catch(err => {
                    this.$toast('获取失败');
                    console.log(err);
                });
            },
            addNewJourneyInfoShow(){
                this.isNewJourneyInfoShow=true;
            },
            addNewJourneyInfo(){
                // 新增景点/api/route/21/scenery
                this.$post(this.$config+'/api/route/'+this.$route.params.id+'/scenery',this.newJourneyInfo,
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    // console.log(res.data);
                    this.$toast('添加成功');
                    this.getJourneyInfos();
                    this.isNewJourneyInfoShow=false;
                    // this.newJourneyInfo.time='';
                    this.newJourneyInfo.content='';
                    this.newJourneyInfo.description='';
                }).catch(err => {
                    this.$toast('添加失败');
                    console.log(err)
                });
            },
            editJourneyInfoShow(index){
                this.edJourneyInfo.id=this.journeyInfos[index].id;
                // this.edJourneyInfo.time=this.journeyInfos[index].time;
                this.edJourneyInfo.content=this.journeyInfos[index].content;
                this.edJourneyInfo.description=this.journeyInfos[index].description;
                this.edJourneyInfo.index=index;
                this.isEditJourneyInfoShow=true;
            },
            editJourneyInfo(){
                // 修改景点信息/api/route/2/scenery/101
                this.$ajax({
                    method: 'PATCH',
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    },
                    data:{
                        // time:this.edJourneyInfo.time,
                        content:this.edJourneyInfo.content,
                        description:this.edJourneyInfo.description,    
                    },
                    url: this.$config+'/api/route/'+this.$route.params.id+'/scenery/'+this.edJourneyInfo.id,
                }).then(res => {
                    if(res.status==200){
                        // this.journeyInfos[this.edJourneyInfo.index].time=this.edJourneyInfo.time;
                        this.journeyInfos[this.edJourneyInfo.index].content=this.edJourneyInfo.content;
                        this.journeyInfos[this.edJourneyInfo.index].description=this.edJourneyInfo.description;
                        this.$toast('修改成功');
                        this.isEditJourneyInfoShow=false;    
                    }else{
                        this.$toast('修改失败');
                    }
                }).catch(err => {
                    this.$toast('修改失败');
                    console.log(err)
                });
            },
            delJourneyInfo(journeyInfoId){
                // 删除景点
                this.$dialog.confirm({
                    title: '删除景点',
                    message: '是否删除该景点'
                }).then(() => {
                    this.$ajax({
                        method: 'DELETE',
                        headers: {
                            "Authorization": 'Bearer '+sessionStorage.token,
                        },
                        url: this.$config+'/api/route/'+this.$route.params.id+'/scenery/'+journeyInfoId,
                    }).then(res => {
                        // console.log(res);
                        if(res.status==204){
                            this.getJourneyInfos();
                            this.$toast('删除成功');
                        }else{
                            this.$toast('删除失败');
                        }
                    }).catch(err => {
                        this.$toast('删除失败');
                        console.log(err)
                    });
                }).catch(err => {

                });
            },

        },
  	}
</script>