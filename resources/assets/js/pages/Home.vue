
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
    				<span class="addnew" >{{$t('home.addNewPro')}}</span>
    			</div>
                <div class="project_icon">
                    
                </div>
    		</div>
    		
    		<div class="project disflex cursorPoint" v-for="(travel,index) in travels" @click.stop="$router.push('/projectDetail/'+travel.id)">
    			<div class="project_left disflex yellowbg">
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
                            <span>{{$t('home.notProgress')}}</span>
                        </div>
                        <div class="edit_icon disflex fl" v-else-if="travel.travel_status==20">
                            <img src="/etravel/public/images/In_progress.png">
                            <span>{{$t('home.progressing')}}</span>
                        </div>
                        <div class="edit_icon disflex fl" v-else="">
                            <img src="/etravel/public/images/ending.png">
                            <span>{{$t('home.end')}}</span>
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
                    <div @click.stop="delTravel(travel.id,index)"><img src="/etravel/public/images/rush_small.png"></div>
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
                    <div class="item_title">{{$t('home.travel_name')}}<span class="err" v-if="errors.travel_name" v-text="errors.travel_name[0]"></span></div>
                    <div>
                        <input class="item_input" :placeholder="$t('home.travel_name')" type="text"  v-model="newTravel.travel_name">
                    </div>
                </div>
                <div class="form_item_pro">
                    <div class="item_title">{{$t('home.travel_at')}}<span class="err" v-if="errors.travel_at" v-text="errors.travel_at[0]"></span></div>
                    <div>
                        <input class="item_input" :placeholder="$t('home.travel_at')+'（yyyy-mm-dd）'" type="text"  v-model="newTravel.travel_at">
                    </div>
                </div>
                <div class="form_item_pro">
                    <div class="item_title">{{$t('home.travel_return')}}<span class="err" v-if="errors.travel_return" v-text="errors.travel_return[0]"></span></div>
                    <div>
                        <input class="item_input" :placeholder="$t('home.travel_return')+'（yyyy-mm-dd）'" type="text"  v-model="newTravel.travel_return">
                    </div>
                </div>
                <div class="form_item_pro">
                    <div class="item_title">{{$t('home.travel_introduction')}}<span class="err" v-if="errors.travel_introduction" v-text="errors.travel_introduction[0]"></span></div>
                    <div>
                        <input class="item_input" :placeholder="$t('home.travel_introduction')" type="text"  v-model="newTravel.travel_introduction">
                    </div>
                </div>
                <button @click="addNewTravel()">{{$t('confirm')}}</button>
            </div>

        </van-popup>
        <van-popup v-model="isEditPopupShow" :overlay="true"> 
            <div class="addNewTravel disflex">
                <div class="form_item_pro">
                    <div class="item_title">{{$t('home.end')}}</div>
                    <div>
                        <input class="item_input" :placeholder="$t('home.end')" type="text"  v-model="edTravel.travel_name">
                    </div>
                </div>
                <div class="form_item_pro">
                    <div class="item_title">{{$t('home.travel_at')}}</div>
                    <div>
                        <input class="item_input" :placeholder="$t('home.travel_at')+'（yyyy-mm-dd）'" type="text"  v-model="edTravel.travel_at">
                    </div>
                </div>
                <div class="form_item_pro">
                    <div class="item_title">{{$t('home.travel_return')}}<span class="err" v-if="errors.travel_return" v-text="errors.travel_return[0]"></span></div>
                    <div>
                        <input class="item_input" :placeholder="$t('home.travel_return')+'（yyyy-mm-dd）'" type="text"  v-model="edTravel.travel_return">
                    </div>
                </div>
                <div class="form_item_pro">
                    <div class="item_title">{{$t('home.travel_introduction')}}</div>
                    <div>
                        <input class="item_input" :placeholder="$t('home.travel_introduction')" type="text"  v-model="edTravel.travel_introduction">
                    </div>
                </div>
                <button @click="editTravel()">{{$t('confirm')}}</button>
            </div>
        </van-popup>
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
            this.$store.state.links=[];
        },
        methods:{
            ...mapActions(['setTravels']),
            ...mapActions(['setUserInfo']),
            ...mapGetters(['userInfo']),
            getUserTravels(){
                // 获取旅游項目
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
                    // this.$toast('获取失敗');
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
                    title: this.$t('home.addNewPro'),
                    message: this.$t('home.confirmAddMsg'),
                    cancelButtonText:this.$t('cancel'),
                    cancelButtonColor:'#ccc',
                    confirmButtonText:this.$t('confirm'),
                    confirmButtonColor:'#000',
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
                            this.$toast(this.$t('createSuccess'));
                            this.newTravel.travel_name='';
                            this.newTravel.travel_at='';
                            this.newTravel.travel_return='';
                            this.newTravel.travel_introduction='';
                            this.getUserInfo();
                        }).catch(err => {
                            this.$toast(this.$t('createFail'));
                            // this.errors=err.response.data.errors;
                            if(err.response.data.errors){
                                for(var key in err.response.data.errors){
                                    this.$toast(err.response.data.errors[key][0]);
                                }
                            }

                            console.log(err)
                        });
                        
                    }else{
                        this.$toast(this.$t('home.coinShort'));
                    }
                }).catch(err => {

                });
                
            },
            delTravel(projectId,index){
                // 删除旅游
                this.$dialog.confirm({
                    title: this.$t('home.delPro'),
                    message: this.$t('home.confirmDelMsg'),
                    cancelButtonText:this.$t('cancel'),
                    cancelButtonColor:'#ccc',
                    confirmButtonText:this.$t('confirm'),
                    confirmButtonColor:'#000',
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
                            this.$toast(this.$t('delSuccess'));
                        }else{
                            this.$toast(this.$t('delFail'));
                        }
                    }).catch(err => {
                        this.$toast(this.$t('delFail'));
                        console.log(err)
                        if(err.response.data.errors){
                            for(var key in err.response.data.errors){
                                this.$toast(err.response.data.errors[key][0]);
                            }
                        }
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
                        this.$toast(this.$t('editSuccess'));
                    }else{
                        this.$toast(this.$t('editFail'));
                        if(err.response.data.errors){
                            for(var key in err.response.data.errors){
                                this.$toast(err.response.data.errors[key][0]);
                            }
                        }
                    }
                    this.editPopupHiden();
                }).catch(err => {
                    this.$toast(this.$t('editFail'));
                    // this.errors=err.response.data.errors;
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
                    this.$toast(this.$t('loginTimeout'));
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