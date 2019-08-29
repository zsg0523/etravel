<style scoped>
    .dataBank_input_form{width: 100%;min-height:650px;justify-content: center;align-items:flex-start;font-size: 16px;position: relative;}
    .pane_content_feel{width:70%;height:auto;margin-bottom: 30px;font-size: 16px;margin-top:20px;}
    
    .right_title{width:100%;height:50px;line-height: 50px;text-align: center;font-size: 20px;border-bottom: 1px solid #d6d6d6;}
    .form_content_feel{width: 94%;min-height: 150px;align-content:flex-start;flex-direction: row;flex-wrap: wrap;margin-left: 3%;}

    .form_item_feel{width: 100%;min-height:100px;}
    .form_item_feel>div{width: 96%;min-height: 45px;}

    .item_area{width:97%;height:80px;border-radius: 8px;resize:none;line-height:25px;font-size: 14px;outline: none;overflow: hidden;background-color: #eee;}
    .item_input{height:40px;padding-left:10px;outline: none;width:97%;border-radius: 8px;}
    .active{font-size: 18px;}        

    .dataBankAddBtn{width:50px;height: 50px;position: absolute;right: 5px;top: 5px;}
    .dataBankAddBtn:hover{cursor:pointer;}
    .dataBankAddBtn>img{width:50px;height: 50px;}
    
    .editBox{width: 760px;min-height:240px;background-color: #fff;border-radius: 15px;}
    .editBoxContent{width:90%;margin-left: 5%;margin-top:20px;flex-flow:row wrap;justify-content: center;align-items: center;}
    .issure{width:100%;height:50px;margin-top: 20px;margin-bottom: 20px;}
    .issure>button{width:60%;height:50px;margin-left: 20%;background-color: #ffde01;font-size: 16px;border-radius: 8px;border: none;outline: none;}

    .editBtnGroup{width:97%;height:50px;line-height: 50px;}
    .editBtnGroup>img{width:40px;height: 40px;margin-right: 25px;float: right;}

    .van-dialog{width:50%;}
</style>

<template>
    <div style="width:100%;">
        <div class="right_title">
            {{$t('commonLeft.dataBankSelfPerception')}}
        </div>
        <div class="dataBank_input_form disflex">
            <div class="pane_content_feel">
                <div class="form_content_feel disflex" v-for="(feel,index) in feels">
                    <div class="form_item_feel">
                        <div class="item_title">{{$t('dataBankSelfPerception.title')}}{{index+1}}</div>
                        <div>
                            <!-- <textarea class="item_area" placeholder="$t('dataBankSelfPerception.title')" disabled="disabled" :value="feel.title" ></textarea> -->
                            <input class="item_input"  placeholder="$t('dataBankSelfPerception.title')"  type="text" disabled="disabled" :value="feel.title">
                        </div>
                    </div>
                    <div class="editBtnGroup">
                        <img @click="delFeel(feel.id);" src="/etravel/public/images/rush-icon.png">
                        <img @click="editFeelShow(index);" src="/etravel/public/images/edit-all.png">
                    </div>
                </div>
                <div class="dataBankAddBtn" @click="addFeelShow();">
                    <img src="/etravel/public/images/add_y.png">
                </div>
            </div>       
        </div>
        <van-popup v-model="isAddFeelShow" :overlay="true">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item_feel">
                        <div class="item_title">{{$t('dataBankSelfPerception.title')}}{{$t('filled')}}</div>
                        <div>
                            <!-- <textarea class="item_area" placeholder="$t('dataBankSelfPerception.title')" v-model="newFeel.title"></textarea> -->
                            <input class="item_input"  placeholder="$t('dataBankSelfPerception.title')"  type="text" v-model="newFeel.title">
                        </div>
                    </div>
                    <div class="issure">
                        <button @click="addFeel()">{{$t('add')}}</button>
                    </div>
                </div>
            </div>
        </van-popup>
        <van-popup v-model="isEditFeelShow" :overlay="true">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item_feel">
                        <div class="item_title">{{$t('dataBankSelfPerception.title')}}{{$t('filled')}}</div>
                        <div>
                            <!-- <textarea class="item_area" placeholder="$t('dataBankSelfPerception.title')" v-model="edFeel.title"></textarea> -->
                            <input class="item_input"  placeholder="$t('dataBankSelfPerception.title')"  type="text" v-model="edFeel.title">
                        </div>
                    </div>
                    <div class="issure">
                        <button @click="editFeel()">{{$t('edit')}}</button>
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
            feels:[],
            newFeel:{
                title:'',
            },
            edFeel:{
                id:'',
                title:'',
                index:'',
            },
            isAddFeelShow:false,
            isEditFeelShow:false,
        }
    },
    mounted:function(){
        this.getFeels();
    },
    methods:{
        getFeels(){
            // 获取感想標題
            this.$ajax({
                method: 'GET',
                headers: {
                    "Authorization": 'Bearer '+sessionStorage.token,
                },
                params:{
                    type:20,
                },
                url: this.$config+'/api/travels/'+sessionStorage.actTravelId+'/titles',
            }).then(res => {
                // console.log(res.data);
                this.feels=res.data.data;
            }).catch(err => {
                this.$toast(this.$t('loginTimeout'));
                console.log(err);
            });
        },
        addFeelShow(){
             this.isAddFeelShow=true;
        },
        addFeel(){
            // 新增感想標題
            this.$post(this.$config+'/api/travels/'+sessionStorage.actTravelId+'/titles',this.newFeel,
            {
                headers: {
                    "Authorization": 'Bearer '+sessionStorage.token,
                }
            }).then(res => {
                // console.log(res.data);
                this.$toast(this.$t('addSuccess'));
                this.getFeels();
                this.isAddFeelShow=false;
                this.newFeel.title='';
            }).catch(err => {
                this.$toast(this.$t('addFail'));
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
        editFeelShow(index){
            this.edFeel.id=this.feels[index].id;
            this.edFeel.title=this.feels[index].title;
            this.edFeel.index=index;
            this.isEditFeelShow=true;
        },
        editFeel(){
            // 修改感想標題信息
            this.$ajax({
                method: 'PATCH',
                headers: {
                    "Authorization": 'Bearer '+sessionStorage.token,
                },
                data:{
                    title:this.edFeel.title,
                },
                url: this.$config+'/api/travels/'+sessionStorage.actTravelId+'/titles/'+this.edFeel.id,
            }).then(res => {
                if(res.status==200){
                    this.feels[this.edFeel.index].title=this.edFeel.title;
                    this.$toast(this.$t('editSuccess'));
                    this.isEditFeelShow=false;    
                }else{
                    this.$toast(this.$t('editFail'));
                }
            }).catch(err => {
                this.$toast(this.$t('editFail'));
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
        delFeel(feelId){
             // 删除感想標題
            this.$dialog.confirm({
                title: this.$t('dataBankSelfPerception.delTitle'),
                message: this.$t('dataBankSelfPerception.confirmDelTitle'),
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
                    url: this.$config+'/api/travels/'+sessionStorage.actTravelId+'/titles/'+feelId,
                }).then(res => {
                    // console.log(res);
                    if(res.status==204){
                        this.getFeels();
                        this.$toast(this.$t('delSuccess'));
                    }else{
                        this.$toast(this.$t('delFail'));
                    }
                }).catch(err => {
                    this.$toast(this.$t('delFail'));
                    console.log(err)
                });
            }).catch(err => {

            });
        }
    }
  }
</script>