<style>
    .linkSchool{
        width: 100%;
        min-height: 700px;
        justify-content: space-around;
        align-items:flex-start;
        flex-direction: row;
    }
    .travelInfo{
        width: 60%;
        min-height: 100px;
        align-content:flex-start;
        flex-direction: row;
        flex-wrap: wrap;
        font-size: 16px;
        margin-top: 20px;
    }
    .travelInfoItem{
        width: 100%;
        min-height:100px;
    }
    .travelInfoItem>div{
        width: 100%;
        min-height: 45px;
        line-height: 45px;
    }
    .item_input_school{
        height:40px;
        padding-left:10px;
        outline: none;
        width: 95%;
        border-radius: 8px;
    }
    .imgIcon{
        width:100px;
        height: 40px;
        float: right;
    }
    .imgIcon img{
        height: 35px;
        float: right;
    }
    .imgs{
        width:95%;
        position: relative;
    }
    .travelImg{
        width:100%;
        border-radius: 15px;
    }
    .cancelImg{
        width:30px;
        height: 30px;
        top: 15px;
        right: 15px;
        position: absolute;
    }
    .changBtn{
        width:50%;
        height: 45px;
        border-radius: 8px;
        background: #ffde01;
        text-align: center;
        line-height: 45px;
        border: none;
        outline: none;
        margin-top: 20px;
        margin-left: 25%;
    }
    .travelStatus{
        justify-content:space-between;
        align-items:center;
        flex-direction: row;
    }
    .travelStatus>div{
        width:100px;
        height:43px;
        border-radius: 8px;
        border: 1px solid #ccc;
        text-align: center;
    }
    .actStatus{
        background: #ccc;
    }
    [v-cloak]{
        display: none;
    }
    .van-dialog{
        width:50%;
    }

</style>

<template>
	<div class="linkSchool disflex">
        <div v-cloak class="travelInfo disflex">    
            <div class="travelInfoItem">
                <div>旅游名称</div>
                <div><input class="item_input_school" placeholder="旅游名称" v-model="travelInfo.travel_name" type="text"></div>
            </div>
            <div class="travelInfoItem" style="width:50%;">
                <div>出行日期</div>
                <div><input class="item_input_school" style="width:90%;" v-model="travelInfo.travel_at" placeholder="出行日期" type="text"></div>
            </div>
            <div class="travelInfoItem" style="width:50%;">
                <div>结束日期</div>
                <div><input class="item_input_school" style="width:90%;" v-model="travelInfo.travel_return" placeholder="结束日期" type="text"></div>
            </div>
            <div class="travelInfoItem">
                <div>旅游简介</div>
                <div><input class="item_input_school" placeholder="旅游简介" v-model="travelInfo.introduction" type="text"></div>
            </div> 
            <div class="travelInfoItem">
                <div>学校名称</div>
                <div><input class="item_input_school" placeholder="学校名称" v-model="travelInfo.school_name" type="text"></div>
            </div>
            <div class="travelInfoItem">
                <div>项目进行状态</div>
                <div class="travelStatus disflex" style="width:95%;">
                    <div :class="{ actStatus: travelInfo.travel_status==10 }" @click="changeStatus(10);">未进行</div>
                    <div :class="{ actStatus: travelInfo.travel_status==20 }" @click="changeStatus(20);">进行中</div>
                    <div :class="{ actStatus: travelInfo.travel_status==30 }" @click="changeStatus(30);">已结束</div>
                </div>
            </div>
            <div class="travelInfoItem">
                <div style="width:95%;">
                    背景图
                    <div class="imgIcon">
                        <van-uploader style="width:50px;height:40px;float:right;" :after-read="onRead" accept="image/*">
                            <img src="/etravel/public/images/sm-insert.png">
                        </van-uploader>
                    </div>
                </div>
                <div>
                    <div class="imgs">    
                        <img class="travelImg" :src="travelInfo.image">
                        <img class="cancelImg" src="/etravel/public/images/delete.png" @click="resetImg();" />
                    </div>
                </div>
            </div>
            <div class="travelInfoItem">
                <button class="changBtn" @click="editTravelInfo();">保存修改</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                travelInfo:{},
            }
        },
        mounted:function(){
            this.$store.state.links=[{link:'/home',linkName:'项目'},{link:'/projectDetail/'+sessionStorage.actTravelId,linkName:'项目详情'}];
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
                }).catch(err => {
                    this.$toast('获取失败');
                    console.log(err);
                });
            },
            editTravelInfo(){
                // 修改旅游基本信息
                this.$ajax({
                    method: 'PATCH',
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    },
                    data:this.travelInfo,
                    url: this.$config+'/api/travels/'+sessionStorage.actTravelId,
                }).then(res => {
                    // console.log(res);
                    if(res.status==200){
                        this.$toast('修改成功');
                    }else{
                        this.$toast('修改失败');
                    }
                }).catch(err => {
                    this.$toast('修改失败');
                    console.log(err);
                });
            },
            changeStatus(status){
                this.travelInfo.travel_status=status;
            },
            onRead(file){
                this.$ajax({
                    method: 'post',
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    },
                    data:{
                        type:'travel',
                        image:file.content,
                    },
                    url: this.$config+'/api/images',
                }).then(res => {
                    console.log(res);
                    if(res.status==201){
                        this.$toast('上传成功');
                        this.travelInfo.image=res.data.data.path;
                    }else{
                        this.$toast('上传失败');
                    }
                }).catch(err => {
                    this.$toast('上传失败');
                    console.log(err)
                });
            },
            resetImg(){
                this.$dialog.confirm({
                    title: '重置图片',
                    message: '是否重置該图片'
                }).then(() => {
                    this.travelInfo.image='http://120.77.206.79/etravel/public/uploads/images/travels/201904/12/1_1555059034_CNDm3c7vCL.png';
                }).catch(err => {
                });
            }
        },
    }
</script>