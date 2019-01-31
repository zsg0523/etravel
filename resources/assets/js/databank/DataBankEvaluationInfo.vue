<style>
	.dataBank_input_form{width: 100%;min-height:650px;justify-content: center;align-items:flex-start;font-size: 16px;position: relative;}
    .pane_content{width:70%;height:auto;margin-bottom: 30px;font-size: 16px;margin-top:20px;}
    
    .right_title{width:100%;height:50px;line-height: 50px;position: relative;text-align: center;font-size: 20px;border-bottom: 1px solid #d6d6d6;}
    .title_icon{width:35px;height:35px;position: absolute;left: 8px;top:8px;line-height: 35px;}
    .title_icon>img{width:28px;height: 28px;}

    .form_content{width: 94%;min-height: 150px;align-content:flex-start;flex-direction: row;flex-wrap: wrap;margin-left: 3%;}

    .form_item_evaluationInfo{width: 100%;min-height:100px;}
    .form_item_evaluationInfo>div{width: 96%;min-height: 45px;}

    .item_area{width:97%;height:75px;border-radius: 8px;resize:none;line-height:25px;font-size: 14px;outline: none;overflow: hidden;}

    .active{font-size: 18px;}

	.dataBankAddBtn{width:50px;height: 50px;position: absolute;right: 5px;top: 5px;}
    .dataBankAddBtn:hover{cursor:pointer;}
    .dataBankAddBtn>img{width:50px;height: 50px;}
	
    .editBox{width: 600px;min-height:240px;background-color: #fff;border-radius: 15px;}
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
                <img src="./../../images/back.png">
            </div>
            在飞机上
        </div>

        <div class="dataBank_input_form disflex">
            <div class="pane_content">
                <div class="form_content disflex"  v-for="(evaluationInfo,index) in evaluationInfos">
                    <div class="form_item_evaluationInfo">
                        <div class="item_title">题目{{index+1}}</div>
                        <div>
                            <textarea class="item_area" placeholder="守则详情" disabled="disabled"  :value="evaluationInfo.content"></textarea>
                        </div>
                    </div>
                    <div class="editBtnGroup">
		                <img @click="delEvaluationInfo(evaluationInfo.id);" src="./../../images/rush-icon.png">
		                <img @click="editEvaluationInfoShow(index);" src="./../../images/edit-all.png">
		            </div>
                </div>
            </div>    
			<div class="dataBankAddBtn" @click="addNewEvaluationInfoShow();">
	            <img src="./../../images/add_y.png">
	        </div>
        </div>
        <van-popup v-model="isNewEvaluationInfoShow" :overlay="true" style="border-radius: 15px;">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item_evaluationInfo">
                        <div class="item_title">详情</div>
                        <div>
                            <textarea class="item_area" placeholder="守则详情"></textarea>
                        </div>
                    </div>
                    <div class="issure">
                        <button @click="addNewEvaluationInfo()">添加</button>
                    </div>
                </div>
            </div>
        </van-popup>
        <van-popup v-model="isEditEvaluationInfoShow" :overlay="true" style="border-radius: 15px;">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item_evaluationInfo">
                        <div class="item_title">守则详情</div>
                        <div>
                            <textarea class="item_area" placeholder="守则详情"></textarea>
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
	        	isNewEvaluationInfoShow:false,
	        	isEditEvaluationInfoShow:false,
            }
        },
        mounted:function(){
        	this.getEvaluationInfos();
        },
        methods:{
            getEvaluationInfos(){
                // 获取题目详情
                this.$get(this.$config+'/api/evaluations/'+sessionStorage.actTravelId,
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    // console.log(res.data);
                    this.evaluationInfos=res.data.data;
                }).catch(err => {
                    this.$toast('获取失败');
                    console.log(err);
                });
            },
            addNewEvaluationInfoShow(){
                this.isNewEvaluationInfoShow=true;
            },
            addNewEvaluationInfo(){
            },
            editEvaluationInfoShow(index){
                this.isEditEvaluationInfoShow=true;
            },
            editEvaluationInfo(){
            },
            delEvaluationInfo(evaluationInfoId){
            },

        },
  	}
</script>