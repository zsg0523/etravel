<style scoped>
    .dataBank_input_form{width: 100%;min-height:650px;justify-content: center;align-items:flex-start;font-size: 16px;position: relative;}
    .pane_content_luggage{width:70%;height:auto;margin-bottom: 30px;font-size: 16px;margin-top:20px;}

    .form_content_luggageLists{width: 94%;min-height: 110px;align-content:flex-start;flex-direction: row;flex-wrap: wrap;margin-left: 3%;}

    .form_item_luggageLists{width: 100%;min-height:100px;}
    .form_item_luggageLists>div{height: 45px;line-height: 45px;}
    .item_input{height:40px;padding-left:10px;outline: none;width: 90%;border-radius: 8px;}

    .input_icon{width: 100%;height: 50px;justify-content: flex-start;align-items:center;font-size: 18px;}
    .input_icon>input{width: 80%;height: 40px;border-radius: 8px;outline: none;padding-left:10px;}
    .input_icon>div{width: 80px;height: 45px;}
    .input_icon>div>img{width:40px;height: 40px;float: right;}
    .input_icon>div>img:hover{cursor: pointer;}
    .active{font-size: 18px;}   

    .dataBankAddBtn{width:50px;height: 50px;position: absolute;right: 5px;top: 5px;}
    .dataBankAddBtn:hover{cursor:pointer;}
    .dataBankAddBtn>img{width:50px;height: 50px;}
    
    .editBox{width: 760px;min-height:240px;background-color: #fff;border-radius: 15px;}
    .editBoxContent{width:90%;margin-left: 5%;margin-top:20px;flex-flow:row wrap;justify-content: center;align-items: center;}
    .issure{width:100%;height:50px;margin-top: 20px;margin-bottom: 20px;}
    .issure>button{width:60%;height:50px;margin-left: 20%;background-color: #ffde01;font-size: 16px;border-radius: 8px;border: none;outline: none;}

    .editBtnGroup_luggageLists{width:80%;height:50px;line-height: 50px;}
    .editBtnGroup_luggageLists>img{width:40px;height: 40px;margin-left: 25px;float: right;}

    .van-dialog{width:50%;}
</style>

<template>
    <div class="dataBank_input_form disflex" style="position:relative;">
        <div class="pane_content_luggage" >
            <div class="form_content_luggageLists disflex">
                <div class="form_item_luggageLists" v-for="(luggageList,index) in luggageLists">
                    <div class="item_title">{{$t('dataBankLuggageList.rule_category_name')}}{{index+1}}</div>
                    <div class="input_icon disflex">
                        <input type="text" disabled="disabled"  :value="luggageList.rule_category_name">
                        <div @click="$router.push('/luggage/dataBankLuggageListInfo/'+luggageList.id)">
                            <img src="/etravel/public/images/See-next.png" alt="">
                        </div>
                    </div>
                    <div class="editBtnGroup_luggageLists">
                        <img @click="delLuggageList(luggageList.id);" src="/etravel/public/images/rush-icon.png">
                        <img @click="editLuggageListShow(index);" src="/etravel/public/images/edit-all.png">
                    </div>
                </div>

            </div>
        </div>    
        <div class="dataBankAddBtn" @click="addNewLuggageListShow();">
            <img src="/etravel/public/images/add_y.png">
        </div>
       <van-popup v-model="isNewLuggageListShow" :overlay="true">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item_luggageLists">
                        <div class="item_title">{{$t('dataBankLuggageList.rule_category_name')}}{{$t('filled')}}</div>
                        <div><input class="item_input" :placeholder="$t('dataBankLuggageList.rule_category_name')" type="text" v-model="newLuggageList.rule_category_name"></div>
                    </div>
                    <div class="issure">
                        <button @click="addNewLuggageList()">{{$t('add')}}</button>
                    </div>
                </div>
            </div>
        </van-popup>
        <van-popup v-model="isEditLuggageListShow" :overlay="true">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item_luggageLists">
                        <div class="item_title">{{$t('dataBankLuggageList.rule_category_name')}}{{$t('filled')}}</div>
                        <div><input class="item_input" :placeholder="$t('dataBankLuggageList.rule_category_name')" type="text" v-model="edLuggageList.rule_category_name"></div>
                    </div>
                    <div class="issure">
                        <button @click="editLuggageList()">{{$t('edit')}}</button>
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
                luggageLists:[],
                newLuggageList:{
                    rule_category_name:'',
                    type:30,
                },
                edLuggageList:{
                    type:30,
                    rule_category_name:'',
                    id:'',
                    index:'',
                },
                isNewLuggageListShow:false,
                isEditLuggageListShow:false,
            }
        },
        mounted:function(){
            this.getLuggageLists();
        },
        methods:{
            getLuggageLists(){
                // 获取題目類型
                this.$ajax({
                    method: 'GET',
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    },
                    // url: this.$config+'/api/travels/'+sessionStorage.actTravelId+'/luggageLists',api/travels/1/luggageListCategories?include=luggageLists
                    url: this.$config+'/api/travels/'+sessionStorage.actTravelId+'/packages?include=rules',
                }).then(res => {
                    // console.log(res.data);
                    this.luggageLists=res.data.data;
                }).catch(err => {
                    this.$toast(this.$t('loginTimeout'));
                    console.log(err);
                });
            },
           addNewLuggageListShow(){
                this.isNewLuggageListShow=true;
           },
           addNewLuggageList(){
                // 新增行李清單
                this.$post(this.$config+'/api/travels/'+sessionStorage.actTravelId+'/categories',
                this.newLuggageList,
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    // console.log(res.data);
                    this.$toast(this.$t('addSuccess'));
                    this.isNewLuggageListShow=false;
                    this.getLuggageLists();  
                    this.newLuggageList.rule_category_name='';
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
           editLuggageListShow(index){
                this.edLuggageList.id=this.luggageLists[index].id;
                this.edLuggageList.rule_category_name=this.luggageLists[index].rule_category_name;
                this.edLuggageList.index=index;
                this.isEditLuggageListShow=true;
            },
            editLuggageList(){
                // 修改題目類型
                this.$ajax({
                    method: 'PATCH',
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    },
                    data:{
                        type:this.edLuggageList.type,
                        rule_category_name:this.edLuggageList.rule_category_name,
                    },
                    url: this.$config+'/api/travels/'+sessionStorage.actTravelId+'/categories/'+this.edLuggageList.id,
                }).then(res => {
                    if(res.status==200){
                        this.luggageLists[this.edLuggageList.index].rule_category_name=this.edLuggageList.rule_category_name;
                        this.$toast(this.$t('editSuccess'));
                        this.isEditLuggageListShow=false;    
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
           delLuggageList(luggageListId){
                // 删除清單
                this.$dialog.confirm({
                    title: this.$t('dataBankLuggageList.delLuggage'),
                    message: this.$t('dataBankLuggageList.confirmDelLuggage'),
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
                        url: this.$config+'/api/travels/'+sessionStorage.actTravelId+'/categories/'+luggageListId,
                    }).then(res => {
                        // console.log(res);
                        if(res.status==204){
                            this.getLuggageLists();
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
        },
    }
</script>