
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
	.edit_icon>span{font-size: 16px;color:#c1c1c1;margin-left: 5px;}
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
    .form_item_pro{width: 90%;min-height:100px;margin-left: 5%;}
    .form_item_pro>div{height: 45px;line-height: 45px;}
    .form_item{width: 90%;min-height:100px;}
    .form_item>div{height: 45px;line-height: 45px;}
    .item_input{height:40px;padding-left:10px;outline: none;width: 90%;border-radius: 8px;}

    .van-dialog{width:50%;}
    /*.van-picker{width:80%;}*/
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
    				<span class="addnew" >新建項目</span>
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
    					<!-- <div class="edit_icon disflex fl" @click="editPopupShow(travel.id,index)">
    						<img src="/etravel/public/images/write-icon.png">
    						<span>編輯</span>
    					</div> -->
                        <div class="edit_icon disflex fl" v-if="travel.travel_status==10">
                            <img src="/etravel/public/images/Not_progress.png">
                            <span>未进行</span>
                        </div>
                        <div class="edit_icon disflex fl" v-else-if="travel.travel_status==20">
                            <img src="/etravel/public/images/In_progress.png">
                            <span>进行中</span>
                        </div>
                        <div class="edit_icon disflex fl" v-else="">
                            <img src="/etravel/public/images/ending.png">
                            <span>已结束</span>
                        </div>
    					<!-- <div class="project_type disflex fr" v-if="travel.pivot['is_promise'] == 1">
    						<img src="/etravel/public/images/sent.png">
    						<span>已发布！</span>
    					</div>
                        <div class="project_type disflex fr" v-else> 
                            <img src="/etravel/public/images/unsent.png">
                            <span>未发布！</span>
                        </div> -->
    				</div>
    				<div class="project_name">
    					<p class="overdot">{{travel.travel_name}}</p>
    				</div>
    			</div>
                <div class="project_icon disflex">
                    <div @click="delTravel(travel.id,index)"><img src="/etravel/public/images/rush_small.png"></div>
                    <!-- <div><img src="/etravel/public/images/Released.png"></div>        -->

                </div>
    		</div>
    		
    	</div>
    	<!-- <div class="btn_publish disflex">
    		<button type="button">发布</button>
    	</div> -->
        <van-popup v-model="isPopupShow" :overlay="true">
            <div class="addNewTravel disflex">
                <div class="form_item_pro">
                    <div class="item_title">項目名稱<span class="err" v-if="errors.travel_name" v-text="errors.travel_name[0]"></span></div>
                    <div>
                        <input class="item_input" placeholder="項目名稱" type="text"  v-model="newTravel.travel_name">
                    </div>
                </div>
                <div class="form_item_pro">
                    <div class="item_title">出行日期<span class="err" v-if="errors.travel_at" v-text="errors.travel_at[0]"></span></div>
                    <div>
                        <input class="item_input" placeholder="出行日期（例:1979-01-01）" type="text"  v-model="newTravel.travel_at">
                    </div>
                </div>
                <div class="form_item_pro">
                    <div class="item_title">回程日期<span class="err" v-if="errors.travel_return" v-text="errors.travel_return[0]"></span></div>
                    <div>
                        <input class="item_input" placeholder="回程日期（例:1979-01-01）" type="text"  v-model="newTravel.travel_return">
                    </div>
                </div>
                <!-- <div class="form_item_pro">
                    <div class="item_title">出行日期<span class="err" v-if="errors.travel_at" v-text="errors.travel_at[0]"></span></div>
                    <div>
                        <input class="item_input" placeholder="出行日期（例:1979-01-01）" type="text"  v-model="newTravel.travel_at" readonly="readonly" @click="pickTimeShow('newTravel')">
                    </div>
                </div>
                <div class="form_item_pro">
                    <div class="item_title">回程日期<span class="err" v-if="errors.travel_return" v-text="errors.travel_return[0]"></span></div>
                    <div>
                        <input class="item_input" placeholder="回程日期（例:1979-01-01）" type="text"  v-model="newTravel.travel_return" readonly="readonly" @click="pickTimeShow('newTravel')">
                    </div>
                </div> -->
                <div class="form_item_pro">
                    <div class="item_title">項目簡介<span class="err" v-if="errors.travel_introduction" v-text="errors.travel_introduction[0]"></span></div>
                    <div>
                        <input class="item_input" placeholder="項目簡介" type="text"  v-model="newTravel.travel_introduction">
                    </div>
                </div>
                <button @click="addNewTravel()">確定</button>
            </div>

        </van-popup>
        <van-popup v-model="isEditPopupShow" :overlay="true"> 
            <div class="addNewTravel disflex">
                <div class="form_item_pro">
                    <div class="item_title">項目名稱</div>
                    <div>
                        <input class="item_input" placeholder="項目名稱" type="text"  v-model="edTravel.travel_name">
                    </div>
                </div>
                <div class="form_item_pro">
                    <div class="item_title">出行日期</div>
                    <div>
                        <input class="item_input" placeholder="出行日期（例:1979-01-01）" type="text"  v-model="edTravel.travel_at">
                    </div>
                </div>
                <div class="form_item_pro">
                    <div class="item_title">回程日期<span class="err" v-if="errors.travel_return" v-text="errors.travel_return[0]"></span></div>
                    <div>
                        <input class="item_input" placeholder="回程日期（例:1979-01-01）" type="text"  v-model="edTravel.travel_return">
                    </div>
                </div>
                <!-- <div class="form_item_pro">
                    <div class="item_title">出行日期</div>
                    <div>
                        <input class="item_input" placeholder="出行日期（例:1979-01-01）" type="text"  v-model="edTravel.travel_at" readonly="readonly" @click="pickTimeShow('edTravel')">
                    </div>
                </div>
                <div class="form_item_pro">
                    <div class="item_title">回程日期<span class="err" v-if="errors.travel_return" v-text="errors.travel_return[0]"></span></div>
                    <div>
                        <input class="item_input" placeholder="回程日期（例:1979-01-01）" type="text"  v-model="newTravel.travel_return" readonly="readonly" @click="pickTimeShow('newTravel')">
                    </div>
                </div> -->
                <div class="form_item_pro">
                    <div class="item_title">項目簡介</div>
                    <div>
                        <input class="item_input" placeholder="項目簡介" type="text"  v-model="edTravel.travel_introduction">
                    </div>
                </div>
                <button @click="editTravel()">確定</button>
            </div>
        </van-popup>
       <!--  <van-popup v-model="isPickTimeShow" :overlay="true"> 
            <div class="addNewTravel disflex">
                <van-datetime-picker
                    v-model="currentDate"
                    type="date"
                    :min-date="minDate"
                    :max-date="maxDate"
                    :formatter="formatter"
                    @cancel="pickTimeCancel()"
                    @confirm="pickTimeConfirm()"/>
            </div>
        </van-popup> -->
    </div>
</template>

<script>
    import { mapActions } from 'vuex';
    import { mapGetters } from 'vuex';
    export default {
        data() {
            return {
                travels:[],
                isPopupShow:false,
                isEditPopupShow:false,
                newTravel:{
                    travel_name:'',
                    travel_at:'',
                    travel_return:'',
                    travel_introduction:'',
                },
                edTravel:{
                    travel_name:'',
                    travel_at:'',
                    travel_return:'',
                    travel_introduction:'',
                },
                edTravelId:'',
                edTravelIndex:'',
                errors:{},
                // isPickTimeShow:false,
                // currentDate:new Date(),
                // minDate:new Date(1999,1,1),
                // maxDate:new Date(2200,1,1),
                // actDate:'',
            }
        },
        mounted:function(){
            this.getUserTravels();
            this.$store.state.links=[{link:'/home',linkName:'项目'}];
        },
        methods:{
            ...mapActions(['setTravels']),
            ...mapActions(['setUserInfo']),
            ...mapGetters(['userInfo']),
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
                this.errors={};
            },
            popupHiden(){
                // 隐藏新增弹窗
                this.isPopupShow=false;
            },
            addNewTravel(){
                // 新增旅游
                this.$dialog.confirm({
                    title: '新建項目',
                    message: '新建項目將會消耗您一枚金幣，是否創建？'
                }).then(() => {
                    if(this.$store.state.userInfo.tokens>=1){
                        this.$post(this.$config+'/api/travels',{
                            travel_name:this.newTravel.travel_name,
                            travel_at:this.newTravel.travel_at,
                            travel_return:this.newTravel.travel_return,
                            travel_introduction:this.newTravel.travel_introduction, 
                        },
                        {
                            headers: {
                                "Authorization": 'Bearer '+sessionStorage.token,
                            }
                        }).then(res => {
                            // console.log(res.data);
                            this.getUserTravels();
                            this.popupHiden();
                            this.$toast('創建成功');
                            this.newTravel.travel_name='';
                            this.newTravel.travel_at='';
                            this.newTravel.travel_return='';
                            this.newTravel.travel_introduction='';
                            this.getUserInfo();
                        }).catch(err => {
                            this.$toast('創建失败');
                            this.errors=err.response.data.errors;

                            console.log(err)
                        });
                        
                    }else{
                        this.$toast('您的金幣不足!');
                    }
                }).catch(err => {

                });
                
            },
            delTravel(projectId,index){
                // 删除旅游
                this.$dialog.confirm({
                    title: '删除項目',
                    message: '是否删除該項目'
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
                this.edTravel.travel_return=this.travels[index].travel_return;
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
                        travel_return:this.edTravel.travel_return,
                        travel_introduction:this.edTravel.travel_introduction,
                    },
                    url: this.$config+'/api/travels/'+this.edTravelId,
                }).then(res => {
                    // console.log(res);
                    if(res.status==200){
                        this.travels[this.edTravelIndex].travel_name=this.edTravel.travel_name;
                        this.travels[this.edTravelIndex].travel_at=this.edTravel.travel_at;
                        this.travels[this.edTravelIndex].travel_return=this.edTravel.travel_return;
                        this.travels[this.edTravelIndex].introduction=this.edTravel.travel_introduction;
                        // this.getUserTravels();
                        this.$toast('修改成功');
                    }else{
                        this.$toast('修改失败');
                    }
                    this.editPopupHiden();
                }).catch(err => {
                    this.$toast('修改失败');
                    this.errors=err.response.data.errors;
                    console.log(err)
                });

            },
            getUserInfo(){
                // 获取用户基本信息
                this.$get(this.$config+'/api/user?include=student.school',
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    // console.log(res.data);
                    this.setUserInfo(res.data);
                }).catch(err => {
                    console.log(err);
                    this.$toast('登录失效');
                    sessionStorage.clear();
                    this.setUserInfo('');
                    this.setTravels('');
                    this.setToken('');
                    this.$router.push("/");
                });
            },
        //     pickTimeShow(str){
        //         this.isPickTimeShow=true;
        //         this.actDate=str;
        //     },
        //     pickTimeCancel(){
        //         this.isPickTimeShow=false;
        //     },
        //     pickTimeConfirm(){
        //         this.isPickTimeShow=false;
        //         if(this.actDate=='newTravel'){
        //             this.newTravel.travel_at=this.formatDate(this.currentDate); 
        //         }else if(this.actDate=='edTravel'){
        //             this.edTravel.travel_at=this.formatDate(this.currentDate); 
        //         }
        //         this.currentDate=new Date();
        //     },
        //     formatter(type, value) {
        //   　　  if (type === 'year') {
        //     　　    return value+'年';
        //   　　  } else if (type === 'month') {
        //   　　      return value+'月'
        //   　　  } else if (type === 'day') {
        //     　　    return value+'日'
        //   　　  } 
        //   　　  return value;
        // 　　},
        //     formatDate(obj){
        //         var date =  new Date(obj);
        //         var y = 1900+date.getYear();
        //         var m = "0"+(date.getMonth()+1);
        //         var d = "0"+date.getDate();
        //         return y+"-"+m.substring(m.length-2,m.length)+"-"+d.substring(d.length-2,d.length);
        //     }
        },
    }
</script>