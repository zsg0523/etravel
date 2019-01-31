<style>
    .dataBank_input_form{width: 100%;min-height:650px;justify-content: center;align-items:flex-start;font-size: 16px;position: relative;}
    .tablist{width:100%;}
    .nav-tabs>li>a{color: #000;}
    .pane_content_study{width:70%;height:auto;margin-bottom: 30px;font-size: 16px;margin-top:20px;}

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
	
    .editBox{width: 600px;min-height:240px;background-color: #fff;border-radius: 15px;}
    .editBoxContent{width:90%;margin-left: 5%;margin-top:20px;flex-flow:row wrap;justify-content: center;align-items: center;}
    .issure{width:100%;height:50px;margin-top: 20px;margin-bottom: 20px;}
    .issure>button{width:60%;height:50px;margin-left: 20%;background-color: #ffde01;font-size: 16px;border-radius: 8px;border: none;outline: none;}

    .editBtnGroup_journey{width:85%;height:50px;line-height: 50px;}
    .editBtnGroup_journey>img{width:40px;height: 40px;margin-left: 25px;float: right;}

    .van-dialog{width:50%;}

</style>

<template>
	<div class="dataBank_input_form disflex">
        <!-- 行程安排 -->

        <div class="pane_content_study">
            <div class="form_content_journey disflex" v-for="(journey,index) in journeys">
                <div class="form_item_journey disflex">
                    <div class="item_left disflex">
                        <div style="width:40%;margin-left: 5%;">{{journey.day}}</div>
                        <div style="width:20%;text-align: center;">日期</div>
                        <input type="text" style="width:30%;" disabled="disabled" :value="journey.date">
                    </div>
                    <div class="item_right">
                        <img @click="$router.push('/study/dataBankStudySheet/'+journey.id)" src="../../images/See-next.png">
                    </div>
                </div>
                <div class="editBtnGroup_journey">
	                <img @click="delJourney(journey.id);" src="../../images/rush-icon.png">
	                <img @click="editJourneyShow(index);" src="../../images/edit-all.png">
	            </div>
            </div>
            <div class="dataBankAddBtn_journey" @click="addNewJourneyShow();">
	            <img src="../../images/add_y.png">
	        </div>
        </div>   
        <van-popup v-model="isNewJourneyShow" :overlay="true" style="border-radius: 15px;">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item_journey">
		                <div class="item_title">第几天</div>
		                <div><input class="item_input" placeholder="第几天" type="text"  v-model="newJourney.day"></div>
		            </div>
		            <div class="form_item_journey">
		                <div class="item_title">时间</div>
		                <div><input class="item_input" placeholder="时间" type="text"  v-model="newJourney.date"></div>
		            </div>
                    <div class="issure">
                        <button @click="addNewJourney()">添加</button>
                    </div>
                </div>
            </div>
        </van-popup>
        <van-popup v-model="isEditJourneyShow" :overlay="true" style="border-radius: 15px;">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item_journey">
		                <div class="item_title">第几天</div>
		                <div><input class="item_input" placeholder="第几天" type="text"  v-model="edJourney.day"></div>
		            </div>
		            <div class="form_item_journey">
		                <div class="item_title">时间</div>
		                <div><input class="item_input" placeholder="时间" type="text"  v-model="edJourney.date"></div>
		            </div>
                    <div class="issure">
                        <button @click="editJourney()">修改</button>
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
	        	journeys:[],
	        	newJourney:{
	        		day:'',
	        		date:'',
	        		description:'描述'
	        	},
	        	edJourney:{
	        		id:'',
	        		day:'',
	        		date:'',
	        		index:'',
	        	},
	        	isNewJourneyShow:false,
	        	isEditJourneyShow:false,
            }
        },
        mounted:function(){
        	this.getJourneys();
        },
        methods:{
            getJourneys(){
                // 获取行程
                this.$ajax({
                    method: 'GET',
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    },
                    url: this.$config+'/api/travel/'+sessionStorage.actTravelId+'/routes',
                }).then(res => {
                    // console.log(res.data);
                    this.journeys=res.data.data;
                }).catch(err => {
                    this.$toast('获取失败');
                    console.log(err);
                });
            },
            addNewJourneyShow(){
                this.isNewJourneyShow=true;
            },
            addNewJourney(){
                // 新增行程
                this.$post(this.$config+'/api/travel/'+sessionStorage.actTravelId+'/route',this.newJourney,
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    // console.log(res.data);
                    this.$toast('添加成功');
                    this.getJourneys();
                    this.isNewJourneyShow=false;
                    this.newJourney.day='';
                    this.newJourney.date='';
                }).catch(err => {
                    this.$toast('添加失败');
                    console.log(err)
                });
            },
            editJourneyShow(index){
                this.edJourney.id=this.journeys[index].id;
                this.edJourney.day=this.journeys[index].day;
                this.edJourney.date=this.journeys[index].date;
                this.edJourney.index=index;
                this.isEditJourneyShow=true;
            },
            editJourney(){
                // 修改行程信息
                this.$ajax({
                    method: 'PATCH',
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    },
                    data:{
                        day:this.edJourney.day,
                        date:this.edJourney.date,
                    },
                    url: this.$config+'/api/travel/'+sessionStorage.actTravelId+'/route/'+this.edJourney.id,
                }).then(res => {
                    if(res.status==200){
                        this.journeys[this.edJourney.index].day=this.edJourney.day;
                        this.journeys[this.edJourney.index].date=this.edJourney.date;
                        this.$toast('修改成功');
                        this.isEditJourneyShow=false;    
                    }else{
                        this.$toast('修改失败');
                    }
                }).catch(err => {
                    this.$toast('修改失败');
                    console.log(err)
                });
            },
            delJourney(journeyId){
                // 删除行程
                this.$dialog.confirm({
                    title: '删除行程',
                    message: '是否删除该行程'
                }).then(() => {
                    this.$ajax({
                        method: 'DELETE',
                        headers: {
                            "Authorization": 'Bearer '+sessionStorage.token,
                        },
                        url: this.$config+'/api/travel/'+sessionStorage.actTravelId+'/route/'+journeyId,
                    }).then(res => {
                        // console.log(res);
                        if(res.status==204){
                            this.getJourneys();
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