<style>
	.dataBank_input_form{width: 100%;min-height:650px;justify-content: center;align-items:flex-start;font-size: 16px;position: relative;}
    .pane_content_eval{width:70%;height:auto;margin-bottom: 30px;font-size: 16px;margin-top:20px;}
    
    .right_title{width:100%;height:50px;line-height: 50px;position: relative;text-align: center;font-size: 20px;border-bottom: 1px solid #d6d6d6;}
    .title_icon{width:35px;height:35px;position: absolute;left: 8px;top:8px;line-height: 35px;}
    .title_icon>img{width:28px;height: 28px;}

    .form_content{width: 94%;min-height: 150px;align-content:flex-start;flex-direction: row;flex-wrap: wrap;margin-left: 3%;}

    .form_item_evaluationInfo{width: 100%;min-height:50px;}
    .form_item_evaluationInfo>div{width: 96%;min-height: 35px;}

    .item_area_eval{width:100%;min-height:40px;border-radius: 8px;resize:none;line-height:38px;font-size: 14px;outline: none;overflow: hidden;padding: 0 10px;}
    select{width:100%;min-height:40px;border-radius: 8px;line-height:38px;font-size: 14px;outline: none;overflow: hidden;padding: 0 10px;}
    option{ border:1px solid #CCC;border-radius: 8px;background: #fff;}
    option:hover{background-color: #ffde01;  }

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
            <div class="title_icon" @click="$router.push('/topic/dataBankEvaluation')">
                <img src="/etravel/public/images/back.png">
            </div>
            {{eval.title}}
        </div>

        <div class="dataBank_input_form disflex">
            <div class="pane_content_eval">
                <div class="form_content disflex"  v-for="(evaluationInfo,index) in evaluationInfos">
                    <div class="form_item_evaluationInfo">
                        <div class="item_title">題目{{index+1}}<span class="fr">類型:{{evaluationInfo.type}}</span></div>
                        <div>
                            <textarea class="item_area_eval" placeholder="題目詳情" disabled="disabled"  :value="evaluationInfo.content"></textarea>
                        </div>
                    </div>
                    <div class="editBtnGroup">
		                <img @click="delEvaluationInfo(evaluationInfo.id);" src="/etravel/public/images/rush-icon.png">
		                <img @click="editEvaluationInfoShow(index);" src="/etravel/public/images/edit-all.png">
		            </div>
                </div>
            </div>    
			<div class="dataBankAddBtn" @click="addNewEvaluationInfoShow();">
	            <img src="/etravel/public/images/add_y.png">
	        </div>
        </div>
        <van-popup v-model="isNewEvaluationInfoShow" :overlay="true">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item_evaluationInfo">
                        <div class="item_title">題目詳情(必填)</div>
                        <div>
                            <textarea class="item_area_eval" placeholder="題目詳情" v-model="newEvaluationInfo.content"></textarea>
                        </div>
                    </div>
                    <div class="form_item_evaluationInfo">
                        <div class="item_title">題目類型</div>
                        <div>
                            <select id="edTypeId" v-model="newEvaluationInfo.type">
                                <option v-for="item in optList" :value="item.value">{{ item.title }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="issure">
                        <button @click="addNewEvaluationInfo()">添加</button>
                    </div>
                </div>
            </div>
        </van-popup>
        <van-popup v-model="isEditEvaluationInfoShow" :overlay="true">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item_evaluationInfo">
                        <div class="item_title">題目詳情(必填)</div>
                        <div>
                            <textarea class="item_area_eval" placeholder="題目詳情" v-model="edEvaluationInfo.content"></textarea>
                        </div>
                    </div>
                    <div class="form_item_evaluationInfo">
                        <div class="item_title">題目類型</div>
                        <div>
                            <select id="edTypeId" v-model="edEvaluationInfo.type">
                                <option v-for="item in optList" :value="item.value">{{ item.title }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="issure">
                        <button @click="editEvaluationInfo()">修改</button>
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
                evaluationInfos:[],
                eval:'',
                optList: [{value:'1',title:'1(一個選項)'},{value:'2',title:'2(兩個選項)'},{value:'3',title:'3(五個選項)'}],
                newEvaluationInfo:{
                    content:'',
                    type:'',
                },
                edEvaluationInfo:{
                    id:'',
                    type:'',
                    content:'',
                    index:'',
                },
	        	isNewEvaluationInfoShow:false,
	        	isEditEvaluationInfoShow:false,
            }
        },
        mounted:function(){
        	this.getEvaluationInfos();
        },
        methods:{
            getEvaluationInfos(){
                // 获取題目詳情
                this.$get(this.$config+'/api/evaluationCategories/'+this.$route.params.id+'?include=evaluations',
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    // console.log(res.data);
                    this.eval=res.data;
                    this.evaluationInfos=res.data.evaluations.data;
                }).catch(err => {
                    this.$toast('獲取失敗');
                    console.log(err);
                });
            },
            addNewEvaluationInfoShow(){
                this.isNewEvaluationInfoShow=true;
            },
            addNewEvaluationInfo(){
                // 新增題目
                this.$post(this.$config+'/api/evaluationCategories/'+this.$route.params.id+'/evaluations',this.newEvaluationInfo,
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    // console.log(res.data);
                    this.$toast('添加成功');
                    this.getEvaluationInfos();
                    this.isNewEvaluationInfoShow=false;
                    this.newEvaluationInfo.content='';
                    this.newEvaluationInfo.type='';
                }).catch(err => {
                    if(err.response.data.errors){
                        for(var key in err.response.data.errors){
                            this.$toast(err.response.data.errors[key][0]);
                        }
                    }
                    this.$toast('添加失敗');
                    console.log(err)
                });
            },
            editEvaluationInfoShow(index){
                this.edEvaluationInfo.id=this.evaluationInfos[index].id;
                this.edEvaluationInfo.type=this.evaluationInfos[index].type;
                this.edEvaluationInfo.content=this.evaluationInfos[index].content;
                this.edEvaluationInfo.index=index;
                this.isEditEvaluationInfoShow=true;
            },
            editEvaluationInfo(){
                // 修改題目信息/api/evaluationCategories/1/evaluations/51
                this.$ajax({
                    method: 'PATCH',
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    },
                    data:{
                        type:this.edEvaluationInfo.type,
                        content:this.edEvaluationInfo.content,    
                    },
                    url: this.$config+'/api/evaluationCategories/'+this.$route.params.id+'/evaluations/'+this.edEvaluationInfo.id,
                }).then(res => {
                    if(res.status==200){
                        this.evaluationInfos[this.edEvaluationInfo.index].type=this.edEvaluationInfo.type;
                        this.evaluationInfos[this.edEvaluationInfo.index].content=this.edEvaluationInfo.content;
                        this.$toast('修改成功');
                        this.isEditEvaluationInfoShow=false;    
                    }else{
                        this.$toast('修改失敗');
                    }
                }).catch(err => {
                    this.$toast('修改失敗');
                    if(err.response.data.errors){
                        for(var key in err.response.data.errors){
                            this.$toast(err.response.data.errors[key][0]);
                        }
                    }
                    console.log(err)

                });
            },
            delEvaluationInfo(evaluationInfoId){
                // 删除行程
                this.$dialog.confirm({
                    title: '删除題目',
                    message: '是否删除该題目'
                }).then(() => {
                    this.$ajax({
                        method: 'DELETE',
                        headers: {
                            "Authorization": 'Bearer '+sessionStorage.token,
                        },
                        url: this.$config+'/api/evaluationCategories/'+this.$route.params.id+'/evaluations/'+evaluationInfoId,
                    }).then(res => {
                        // console.log(res);
                        if(res.status==204){
                            this.getEvaluationInfos();
                            this.$toast('删除成功');
                        }else{
                            this.$toast('删除失敗');
                        }
                    }).catch(err => {
                        this.$toast('删除失敗');
                        console.log(err)
                    });
                }).catch(err => {

                });
            },

        },
  	}
</script>