
<style type="text/css">
    .main1{width: 100%;height: auto;justify-content: flex-start;align-items:center;flex-direction: column;position: relative;}
	.project_list{width: 94%;min-height:550px;flex-flow:row wrap; align-content:flex-start;margin-top: 50px;}
	.project{margin: 10px;min-width:380px;height: 140px;border: none;font-size: 18px;border-radius: 15px;}

	.project_left{width: 110px;height: 100%;align-items: center;justify-content: center;border-bottom-left-radius: 15px;border-top-left-radius: 15px;}
	.project_left>img{width: 80px;height: 100px;}

	.project_right{width: 240px;height: 100%;align-items: center;flex-direction: column; justify-content: flex-start;background-color: #ebebeb;}
	.project_right>div{width: 90%;}
    .project_icon{width:30px;height:100%;background-color: #ebebeb;border-bottom-right-radius: 15px;border-top-right-radius: 15px;flex-direction: column;justify-content: flex-start;}
    .project_icon>div{width:30px;height:30px;margin-top: 4px;}
    .project_icon>div>img{width:30px;height:30px;}


	.edit_name{width:100%; height: 40px;margin-top: 10px;}
	.edit_icon{width: auto;height: 40px;align-items: center;justify-content: flex-start;}
	.edit_icon>span{font-size: 14px;color:#c1c1c1;}
	.edit_icon>img{width: 30px;height:30px;}
	.project_type{width: auto;height: 40px;align-items: center;justify-content: flex-start;}
	.project_type>img{width: 20px;height:20px;}
	.project_type>span{font-size: 14px;color:#c1c1c1;}
	.project_name{height: 80px;overflow: hidden;}
	.project_name>p{line-height: 40px;width: 100%;font-size: 24px;word-break: break-all;overflow: hidden;}
    

	.addnew{font-size: 30px;color: #c1c1c1;height: 100%;line-height: 140px;display: block;}
    .btn_publish{width: 100%;height: 60px;justify-content: center;margin-top:20px; }
    .btn_publish>button{width: 350px;height: 50px;border-radius: 8px;background-color: #ffde01;border: none;font-size: 18px;}
	
	.del_icon{width: 60px;height: 60px;position: absolute;right: 50px;top:50px;z-index: 5;}
	.del_icon>img{width: 60px;height: 60px;}
    
    .addNewTravel{width: 600px;min-height:260px;background-color: #fff;border-radius: 15px;box-shadow: 0 0 10px #ccc;flex-direction: column;justify-content: center;align-items: center;}
    .addNewTravel>button{width:60%;height:50px;background-color: #ffde01;font-size: 16px;border-radius: 8px;border: none;outline: none;margin-top: 20px;margin-bottom: 20px;}
    .form_item{width: 90%;min-height:100px;}
    .form_item>div{height: 45px;line-height: 45px;}
    .item_input{height:40px;padding-left:10px;outline: none;width: 90%;border-radius: 8px;}

    .van-dialog{width:50%;}
</style>

<template>
	<div class="main1 disflex" v-if="travels">
    	<!-- <div class="del_icon">
    		<img src="/etravel/public/images/rush-icon.png">
    	</div> -->
    	<div class="project_list disflex" >
    		<div class="project disflex" @click="popupShow();">
    			<div class="project_left disflex huise">
    				<img src="/etravel/public/images/add1.png">
    			</div>
    			<div class="project_right disflex">
    				<span class="addnew" >新建项目</span>
    			</div>
                <div class="project_icon">
                    
                </div>
    		</div>
    		
    		<div class="project disflex" v-for="(travel,index) in travels">
    			<div class="project_left disflex yellowbg"  @click="$router.push('/projectDetail/'+travel.id)">
    				<img src="/etravel/public/images/plane-icon.png">
    			</div>
    			<div class="project_right disflex">
    				<div class="edit_name">
    					<div class="edit_icon disflex fl" @click="editPopupShow(travel.id,index)">
    						<img src="/etravel/public/images/write-icon.png">
    						<span>（4-X个字符内）</span>
    					</div>
    					<div class="project_type disflex fr" v-if="travel.pivot['is_promise'] == 1">
    						<img src="/etravel/public/images/sent.png">
    						<span>已发布！</span>
    					</div>
                        <div class="project_type disflex fr" v-else> 
                            <img src="/etravel/public/images/unsent.png">
                            <span>未发布！</span>
                        </div>
    				</div>
    				<div class="project_name">
    					<p class="overdot">{{travel.travel_name}}</p>
    				</div>
    			</div>
                <div class="project_icon disflex">
                    <div @click="delTravel(travel.id,index)"><img src="/etravel/public/images/rush-icon.png"></div>
                    <!-- <div><img src="/etravel/public/images/Released.png"></div>        -->

                </div>
    		</div>
    		
    	</div>
    	<!-- <div class="btn_publish disflex">
    		<button type="button">发布</button>
    	</div> -->
        <van-popup v-model="isPopupShow" :overlay="true" style="border-radius: 15px;">
            <div class="addNewTravel disflex" >
                <div class="form_item">
                    <div class="item_title">项目名称</div>
                    <div>
                        <input class="item_input" placeholder="项目名称" type="text"  v-model="newTravel.travel_name">
                    </div>
                </div>
                <div class="form_item">
                    <div class="item_title">出行时间</div>
                    <div>
                        <input class="item_input" placeholder="出行时间" type="text"  v-model="newTravel.travel_at">
                    </div>
                </div>
                <div class="form_item">
                    <div class="item_title">项目简介</div>
                    <div>
                        <input class="item_input" placeholder="项目简介" type="text"  v-model="newTravel.travel_introduction">
                    </div>
                </div>
                <button @click="addNewTravel()">确定</button>
            </div>

        </van-popup>
        <van-popup v-model="isEditPopupShow" :overlay="true" style="border-radius: 15px;">
            <div class="addNewTravel disflex" >
                <div class="form_item">
                    <div class="item_title">项目名称</div>
                    <div>
                        <input class="item_input" placeholder="项目名称" type="text"  v-model="edTravel.travel_name">
                    </div>
                </div>
                <div class="form_item">
                    <div class="item_title">出行时间</div>
                    <div>
                        <input class="item_input" placeholder="出行时间" type="text"  v-model="edTravel.travel_at">
                    </div>
                </div>
                <div class="form_item">
                    <div class="item_title">项目简介</div>
                    <div>
                        <input class="item_input" placeholder="项目简介" type="text"  v-model="edTravel.travel_introduction">
                    </div>
                </div>
                <button @click="editTravel()">确定</button>
            </div>
        </van-popup>
    </div>
</template>

<script>
    import { mapActions } from 'vuex'
    
    export default {
        data() {
            return {
                travels:[],
                isPopupShow:false,
                isEditPopupShow:false,
                newTravel:{
                    travel_name:'',
                    travel_at:'',
                    travel_introduction:'',
                },
                edTravel:{
                    travel_name:'',
                    travel_at:'',
                    travel_introduction:'',
                },
                edTravelId:'',
                edTravelIndex:'',
            }
        },
        mounted:function(){
            this.getUserTravels();
        },
        methods:{
            ...mapActions(['setTravels']),
            getUserTravels(){
                // 获取旅游项目
                this.$get(this.$config+'/api/creater/travels',
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    // console.log(res.data.data);
                    this.setTravels(res.data.data);
                    this.travels=res.data.data;
                    // console.log(this.travels);
                   
                }).catch(err => {
                    // this.$toast('获取失败');
                    // this.$router.push('/');
                    console.log(err);
                });
            },
            popupShow(){
                // 显示新增弹窗
                this.isPopupShow=true;
            },
            popupHiden(){
                // 隐藏新增弹窗
                this.isPopupShow=false;
            },
            addNewTravel(){
                // 新增旅游
                this.$post(this.$config+'/api/travels',{
                    travel_name:this.newTravel.travel_name,
                    travel_at:this.newTravel.travel_at,
                    travel_introduction:this.newTravel.travel_introduction, 
                },
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    console.log(res.data);
                    this.getUserTravels();
                    this.popupHiden();
                    this.$toast('添加成功');
                    this.newTravel.travel_name='';
                    this.newTravel.travel_at='';
                    this.newTravel.travel_introduction='';
                }).catch(err => {
                    this.$toast('添加失败');
                    console.log(err)
                });
            },
            delTravel(projectId,index){
                // 删除旅游
                this.$dialog.confirm({
                    title: '删除项目',
                    message: '是否删除该旅游'
                }).then(() => {
                    this.$ajax({
                        method: 'DELETE',
                        headers: {
                            "Authorization": 'Bearer '+sessionStorage.token,
                        },
                        url: this.$config+'/api/travels/'+projectId,
                    }).then(res => {
                        // console.log(res);
                        if(res.status==204){
                            this.getUserTravels();
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
            editPopupShow(projectId,index){
                // 显示修改弹窗
                this.edTravelId=projectId;
                this.edTravelIndex=index;
                this.edTravel.travel_name=this.travels[index].travel_name;
                this.edTravel.travel_at=this.travels[index].travel_at;
                this.edTravel.travel_introduction=this.travels[index].introduction;
                this.isEditPopupShow=true;
            },
            editPopupHiden(){
                // 隐藏修改弹窗
                this.isEditPopupShow=false;
            },
            editTravel(){
                // 修改旅游基本信息
                this.$ajax({
                    method: 'PATCH',
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    },
                    data:{
                        travel_name:this.edTravel.travel_name,
                        travel_at:this.edTravel.travel_at,
                        travel_introduction:this.edTravel.travel_introduction,
                    },
                    url: this.$config+'/api/travels/'+this.edTravelId,
                }).then(res => {
                    // console.log(res);
                    if(res.status==200){
                        this.travels[this.edTravelIndex].travel_name=this.edTravel.travel_name;
                        this.travels[this.edTravelIndex].travel_at=this.edTravel.travel_at;
                        this.travels[this.edTravelIndex].introduction=this.edTravel.travel_introduction;
                        // this.getUserTravels();
                        this.$toast('修改成功');
                    }else{
                        this.$toast('修改失败');
                    }
                    this.editPopupHiden();
                }).catch(err => {
                    this.$toast('修改失败');
                    console.log(err)
                });

            },
        },
    }
</script>