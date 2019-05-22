<style>
	.dataBank_input_form{width: 100%;min-height:650px;justify-content: center;align-items:flex-start;font-size: 16px;}
    .dataBank_input_form>table{margin-top: 20px;width: 90%;}

    .dataBank_input_form table th{border:1px solid #d6d6d6;height:40px;line-height:40px;padding:0px;margin: 0px;text-align: center;}
    .dataBank_input_form table td{border:1px solid #d6d6d6;height:40px;line-height:40px;padding:0px;margin: 0px;text-align: center;}
    .dataBank_input_form thead{background-color: #ffde01;}
    .dataBank_input_form td>input{padding:0px;margin: 0px;border: none;padding-left: 5px;}
    .form_item{width: 100%;min-height:100px;}
    .form_item>div{height: 45px;line-height: 45px;}
    .item_input{height:40px;padding-left:10px;outline: none;width: 90%;border-radius: 8px;}
    .editIcon{width:40px;height:40px;line-height: 40px;float: left;margin-left: 5px;}
    .editIcon:hover{cursor: pointer;}
    .editIcon>img{width:25px;height:25px;}

    .active{font-size: 18px;}
    
    .form_item_luggageListInfo{width: 100%;min-height:100px;}
    .form_item_luggageListInfo>div{width: 100%;min-height: 45px;}
    .item_area{width:97%;height:75px;border-radius: 8px;resize:none;line-height:25px;font-size: 14px;outline: none;overflow: hidden;}


    .editBox{width: 760px;min-height:240px;background-color: #fff;border-radius: 15px;}
    .editBoxContent{width:90%;margin-left: 5%;margin-top:20px;flex-flow:row wrap;justify-content: center;align-items: center;}
    .issure{width:100%;height:50px;margin-top: 20px;margin-bottom: 20px;}
    .issure>button{width:60%;height:50px;margin-left: 20%;background-color: #ffde01;font-size: 16px;border-radius: 8px;border: none;outline: none;}

    .editBtnGroup_rules{width:80%;height:50px;line-height: 50px;}
    .editBtnGroup_rules>img{width:40px;height: 40px;margin-left: 25px;float: right;}
   
    .right_title{width:100%;height:50px;line-height: 50px;position: relative;text-align: center;font-size: 20px;border-bottom: 1px solid #d6d6d6;}
    .title_icon{width:35px;height:35px;position: absolute;left: 8px;top:8px;line-height: 35px;}
    .title_icon>img{width:28px;height: 28px;}

    .van-dialog{width:50%;}    
</style>

<template>
	<div style="width:100%;">
        <div class="right_title">
            <div class="title_icon" @click="$router.push('/luggage/dataBankLuggageList')">
                <img src="/etravel/public/images/back.png">
            </div>
            {{luggageList.rule_category_name}}
        </div>
        <div class="dataBank_input_form disflex"> 
            <table>
                <thead>
                    <tr>
                        <th>編號</th>
                        <th>裝備內容</th>
                        <th>编辑</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>編號</td>
                        <td>填寫裝備內容</td>
                        <td width="100px">
                            <!-- <div class="editIcon"><img src="/etravel/public/images/edit.png"></div> -->
                            <div class="editIcon"><img src="/etravel/public/images/appointAdd.png" @click="addLuggageListInfoShow();"></div>
                            <!-- <div class="editIcon"><img src="/etravel/public/images/dele.png"></div> -->
                        </td>
                    </tr>
                    <tr v-for="(luggageListInfo,index) in luggageListInfos">
                        <td>{{index+1}}</td>
                        <td>{{luggageListInfo.rule}}</td>
                        <td width="100px">
                            <div class="editIcon"><img src="/etravel/public/images/edit.png" @click="editLuggageListInfoShow(index);"></div>
                            <!-- <div class="editIcon"><img src="/etravel/public/images/appointAdd.png" @click="addLuggageListInfoShow();"></div> -->
                            <div class="editIcon"><img src="/etravel/public/images/dele.png" @click="delLuggageListInfo(luggageListInfo.id);"></div>
                        </td>
                    </tr>
                </tbody>
            </table>   
        </div>
        <van-popup v-model="isNewLuggageListInfoShow" :overlay="true">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item_luggageListInfo">
                        <div class="item_title">裝備內容</div>
                        <div>
                            <textarea class="item_area" placeholder="填寫裝備內容" v-model="newLuggageListInfo.rule"></textarea>
                        </div>
                    </div>
                    <div class="issure">
                        <button @click="addLuggageListInfo()">添加</button>
                    </div>
                </div>
            </div>
        </van-popup>
        <van-popup v-model="isEditLuggageListInfoShow" :overlay="true">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item_luggageListInfo">
                        <div class="item_title">裝備內容</div>
                        <div>
                            <textarea class="item_area" placeholder="填寫裝備內容" v-model="edLuggageListInfo.rule"></textarea>
                        </div>
                    </div>
                    <div class="issure">
                        <button @click="editLuggageListInfo()">修改</button>
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
                luggageList:'',
                luggageListInfos:[],
                newLuggageListInfo:{
                    rule:'',
                    rule_category_id:this.$route.params.id,
                },
                edLuggageListInfo:{
                    id:'',
                    rule:'',
                    rule_category_id:'',
                    index:'',
                },
                isNewLuggageListInfoShow:false,
                isEditLuggageListInfoShow:false,
            }
        },
        mounted:function(){
            this.getLuggageListInfos();
        },
        methods:{
            getLuggageListInfos(){
                // 获取详细清单
                // this.$get(this.$config+'/api/travels/'+sessionStorage.actTravelId+'/packages?include=rules',
                this.$get(this.$config+'/api/categories/'+this.$route.params.id+'?include=rules',
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    // console.log(res.data);
                    this.luggageList=res.data;
                    this.luggageListInfos=res.data.rules.data;
                }).catch(err => {
                    this.$toast('獲取失敗');
                    console.log(err);
                });
            },
            addLuggageListInfoShow(){
                this.isNewLuggageListInfoShow=true;
            },
            addLuggageListInfo(){
                // 新增守则詳情
                this.$post(this.$config+'/api/rules',this.newLuggageListInfo,
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    // console.log(res.data);
                    this.$toast('添加成功');
                    this.getLuggageListInfos();
                    this.isNewLuggageListInfoShow=false;
                    this.newLuggageListInfo.rule='';
                }).catch(err => {
                    this.$toast('添加失败');
                    if(err.response.data.errors){
                        for(var key in err.response.data.errors){
                            this.$toast(err.response.data.errors[key][0]);
                        }
                    }
                    console.log(err)
                });
            },
            editLuggageListInfoShow(index){
                this.edLuggageListInfo.id=this.luggageListInfos[index].id;
                this.edLuggageListInfo.rule=this.luggageListInfos[index].rule;
                this.edLuggageListInfo.rule_category_id=this.luggageListInfos[index].rule_category_id;
                this.edLuggageListInfo.index=index;
                this.isEditLuggageListInfoShow=true;
            },
            editLuggageListInfo(){
                // 修改守则詳情信息
                this.$ajax({
                    method: 'PATCH',
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    },
                    data:{
                        rule:this.edLuggageListInfo.rule,
                        rule_category_id:this.edLuggageListInfo.rule_category_id,
                    },
                    url: this.$config+'/api/rules/'+this.edLuggageListInfo.id,
                }).then(res => {
                    // console.log(res);
                    if(res.status==200){
                        this.luggageListInfos[this.edLuggageListInfo.index].rule=this.edLuggageListInfo.rule;
                        this.$toast('修改成功');
                        this.isEditLuggageListInfoShow=false;    
                    }else{
                        this.$toast('修改失败');
                    }
                }).catch(err => {
                    this.$toast('修改失败');
                    if(err.response.data.errors){
                        for(var key in err.response.data.errors){
                            this.$toast(err.response.data.errors[key][0]);
                        }
                    }
                    console.log(err)
                });
            },
            delLuggageListInfo(luggageListInfoId){
                // 删除守则詳情
                this.$dialog.confirm({
                    title: '删除装备詳情',
                    message: '是否删除该装备詳情'
                }).then(() => {
                    this.$ajax({
                        method: 'DELETE',
                        headers: {
                            "Authorization": 'Bearer '+sessionStorage.token,
                        },
                        url: this.$config+'/api/rules/'+luggageListInfoId,
                    }).then(res => {
                        // console.log(res);
                        if(res.status==204){
                            this.getLuggageListInfos();
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
        }
  }
</script>