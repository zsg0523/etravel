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
    .simulateShade{
        width:90%;
        height: 44px;
        border-width: 2px;
        border-style: solid;
        border-top-color: #999;
        border-left-color: #999;
        border-right-color: #eee;
        border-bottom-color: #eee;
        border-radius: 8px;
    }

</style>

<template>
	<div class="linkSchool disflex">
        <div v-cloak class="travelInfo disflex">    
            <div class="travelInfoItem">
                <div>{{$t('home.travel_name')}}</div>
                <div><input class="item_input_school" :placeholder="$t('home.travel_name')" v-model="travelInfo.travel_name" type="text"></div>
            </div>
            <div class="travelInfoItem" style="width:50%;">
                <div>{{$t('home.travel_at')}}</div>
                <div><input class="item_input_school" style="width:90%;" v-model="travelInfo.travel_at" :placeholder="$t('home.travel_at')+'（yyyy-mm-dd）'" type="text"></div>
            </div>
            <div class="travelInfoItem" style="width:50%;">
                <div>{{$t('home.travel_return')}}</div>
                <div><input class="item_input_school" style="width:90%;" v-model="travelInfo.travel_return" :placeholder="$t('home.travel_return')+'（yyyy-mm-dd）'" type="text"></div>
            </div>
            <div class="travelInfoItem">
                <div>{{$t('home.travel_introduction')}}</div>
                <div><input class="item_input_school" :placeholder="$t('home.travel_introduction')" v-model="travelInfo.travel_introduction" type="text"></div>
            </div> 
            <div class="travelInfoItem">
                <div>{{$t('linkSchool.school_name')}}</div>
                <div><input class="item_input_school" :placeholder="$t('linkSchool.school_name')" v-model="travelInfo.school_name" type="text"></div>
            </div>
            <div class="travelInfoItem">
                <div>{{$t('linkSchool.travel_status')}}</div>
                <div class="travelStatus disflex" style="width:95%;">
                    <div :class="{ actStatus: travelInfo.travel_status==10 }" @click="changeStatus(10);">{{$t('home.notProgress')}}</div>
                    <div :class="{ actStatus: travelInfo.travel_status==20 }" @click="changeStatus(20);">{{$t('home.progressing')}}</div>
                    <div :class="{ actStatus: travelInfo.travel_status==30 }" @click="changeStatus(30);">{{$t('home.end')}}</div>
                </div>
            </div>
            <div class="travelInfoItem">
                <div style="width:95%;">
                    {{$t('linkSchool.image')}}
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
            <div class="travelInfoItem" style="width:50%;">
                <div>{{$t('students.code_one')}}</div>
                <div>
                    <!-- <input class="item_input_school" style="width:90%;" v-model="travelInfo.code_one" :placeholder="區號A" type="text"> -->
                    <div class="simulateShade">
                        <AreaCodeSelector @selectedAreaCode='selectedAreaCode' :areaCode='travelInfo.code_one'></AreaCodeSelector>
                    </div>
                </div>
            </div>
            <div class="travelInfoItem" style="width:50%;">
                <div>{{$t('students.emergency_phone_one')}}</div>
                <div><input class="item_input_school" style="width:90%;" v-model="travelInfo.emergency_phone_one" :placeholder="$t('students.emergency_phone_one')" type="text"></div>
            </div>
            <div class="travelInfoItem" style="width:50%;">
                <div>{{$t('students.code_two')}}</div>
                <div>
                    <!-- <input class="item_input_school" style="width:90%;" v-model="travelInfo.code_two" :placeholder="區號B" type="text"> -->
                    <div class="simulateShade">
                        <AreaCodeSelector @selectedAreaCode='selectedAreaCode1' :areaCode='travelInfo.code_two'></AreaCodeSelector>
                    </div>
                </div>
            </div>
            <div class="travelInfoItem" style="width:50%;">
                <div>{{$t('students.emergency_phone_two')}}</div>
                <div><input class="item_input_school" style="width:90%;" v-model="travelInfo.emergency_phone_two" :placeholder="$t('students.emergency_phone_two')" type="text"></div>
            </div>
            <div class="travelInfoItem" style="width:50%;">
                <div>{{$t('students.emergency_email_one')}}</div>
                <div><input class="item_input_school" style="width:90%;" v-model="travelInfo.emergency_email_one" :placeholder="$t('students.emergency_email_one')" type="text"></div>
            </div>
            <div class="travelInfoItem" style="width:50%;">
                <div>{{$t('students.emergency_email_two')}}</div>
                <div><input class="item_input_school" style="width:90%;" v-model="travelInfo.emergency_email_two" :placeholder="$t('students.emergency_email_two')" type="text"></div>
            </div>
            <div class="travelInfoItem">
                <button class="changBtn" @click="editTravelInfo();">{{$t('edit')}}</button>
            </div>
        </div>
    </div>
</template>

<script>
    import AreaCodeSelector from '../components/AreaCodeSelector.vue';
    export default {
        components: {
            AreaCodeSelector,
        },
        data() {
            return {
                travelInfo:{},
            }
        },
        mounted:function(){
            this.$store.state.links=[{link:'/home',linkName:this.$t('links.project')},{link:'/projectDetail/'+sessionStorage.actTravelId,linkName:this.$t('links.projectDetail')}];
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
                        this.$toast(this.$t('editSuccess'));
                    }else{
                        this.$toast(this.$t('edtlFail'));
                    }
                }).catch(err => {
                    this.$toast(this.$t('edtlFail'));
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
                        this.$toast(this.$t('uploadSuccess'));
                        this.travelInfo.image=res.data.data.path;
                    }else{
                        this.$toast(this.$t('uploadFail'));
                    }
                }).catch(err => {
                    this.$toast(this.$t('uploadFail'));
                    if(err.response.data.errors){
                        for(var key in err.response.data.errors){
                            this.$toast(err.response.data.errors[key][0]);
                        }
                    }else{
                        this.$toast(err.response.data.message);
                    }
                    console.log(err)
                });
            },
            resetImg(){
                this.$dialog.confirm({
                    title: this.$t('resetImg'),
                    message: this.$t('resetImgMsg'),
                    cancelButtonText:this.$t('cancel'),
                    confirmButtonText:this.$t('confirm'),
                }).then(() => {
                    this.travelInfo.image='http://app.study2go.net/etravel/public/uploads/images/travels/201908/29/1_1567068835_takJtrEmXZ.png';
                }).catch(err => {
                });
            },
            selectedAreaCode(value){
                this.travelInfo.code_one=value;
            },
            selectedAreaCode1(value){
                this.travelInfo.code_two=value;
            },
        },
    }
</script>