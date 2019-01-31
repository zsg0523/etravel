<style>
	.dataBank_input_form{width: 100%;min-height:650px;justify-content: center;align-items:flex-start;font-size: 16px;position: relative;}
    .pane_content{width:70%;height:auto;margin-bottom: 30px;font-size: 16px;margin-top:20px;}
    
    .right_title{width:100%;height:50px;line-height: 50px;position: relative;text-align: center;font-size: 20px;border-bottom: 1px solid #d6d6d6;}
    .title_icon{width:35px;height:35px;position: absolute;left: 8px;top:8px;line-height: 35px;}
    .title_icon>img{width:28px;height: 28px;}

    .form_content{width: 94%;min-height: 150px;align-content:flex-start;flex-direction: row;flex-wrap: wrap;margin-left: 3%;}

    .form_item_ruleInfo{width: 100%;min-height:100px;}
    .form_item_ruleInfo>div{width: 96%;min-height: 45px;}

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
            <div class="title_icon" @click="$router.push('/rule/dataBankRules')">
                <img src="../../images/back.png">
            </div>
            {{rule.rule_category_name}}
        </div>
        <div class="dataBank_input_form disflex">
            <div class="pane_content">
                <div class="form_content disflex" v-for="(ruleInfo,index) in ruleInfos">
                    <div class="form_item_ruleInfo">
                        <div class="item_title">守则详情{{index+1}}</div>
                        <div>
                            <textarea class="item_area" placeholder="守则详情" disabled="disabled" :value="ruleInfo.rule"></textarea>
                        </div>
                    </div>
                    <div class="editBtnGroup">
		                <img @click="delRuleInfo(ruleInfo.id);" src="../../images/rush-icon.png">
		                <img @click="editRuleInfoShow(index);" src="../../images/edit-all.png">
		            </div>
                </div>
            </div>    
			<div class="dataBankAddBtn" @click="addNewRuleInfoShow();">
	            <img src="../../images/add_y.png">
	        </div>
        </div>
        <van-popup v-model="isNewRuleInfoShow" :overlay="true" style="border-radius: 15px;">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item_ruleInfo">
                        <div class="item_title">守则详情</div>
                        <div>
                            <textarea class="item_area" placeholder="守则详情" v-model="newRuleInfo.rule"></textarea>
                        </div>
                    </div>
                    <div class="issure">
                        <button @click="addNewRuleInfo()">添加</button>
                    </div>
                </div>
            </div>
        </van-popup>
        <van-popup v-model="isEditRuleInfoShow" :overlay="true" style="border-radius: 15px;">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item_ruleInfo">
                        <div class="item_title">守则详情</div>
                        <div>
                            <textarea class="item_area" placeholder="守则详情" v-model="edRuleInfo.rule"></textarea>
                        </div>
                    </div>
                    <div class="issure">
                        <button @click="editRuleInfo()">修改</button>
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
                rule:'',
	        	ruleInfos:[],
	        	newRuleInfo:{
	        		rule:'',
	        		rule_category_id:this.$route.params.id,
	        	},
	        	edRuleInfo:{
	        		id:'',
	        		rule:'',
	        		rule_category_id:'',
	        		index:'',
	        	},
	        	isNewRuleInfoShow:false,
	        	isEditRuleInfoShow:false,
            }
        },
        mounted:function(){
        	this.getRuleInfos();
        },
        methods:{
            getRuleInfos(){
                // 获取守则详情/api/categories/3?include=rules
                this.$get(this.$config+'/api/categories/'+this.$route.params.id+'?include=rules',
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    // console.log(res.data);
                    this.rule=res.data;
                    this.ruleInfos=res.data.rules.data;
                }).catch(err => {
                    this.$toast('获取失败');
                    console.log(err);
                });

            },
            addNewRuleInfoShow(){
                this.isNewRuleInfoShow=true;
            },
            addNewRuleInfo(){
                // 新增守则详情
                this.$post(this.$config+'/api/rules',this.newRuleInfo,
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    // console.log(res.data);
                    this.$toast('添加成功');
                    this.getRuleInfos();
                    this.isNewRuleInfoShow=false;
                    this.newRuleInfo.rule='';
                }).catch(err => {
                    this.$toast('添加失败');
                    console.log(err)
                });
            },
            editRuleInfoShow(index){
                this.edRuleInfo.id=this.ruleInfos[index].id;
               	this.edRuleInfo.rule=this.ruleInfos[index].rule;
               	this.edRuleInfo.rule_category_id=this.ruleInfos[index].rule_category_id;
                this.edRuleInfo.index=index;
                this.isEditRuleInfoShow=true;
            },
            editRuleInfo(){
                // 修改守则详情信息
                this.$ajax({
                    method: 'PATCH',
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    },
                    data:{
                        rule:this.edRuleInfo.rule,
                        rule_category_id:this.edRuleInfo.rule_category_id,
                    },
                    url: this.$config+'/api/rules/'+this.edRuleInfo.id,
                }).then(res => {
                	// console.log(res);
                    if(res.status==200){
                        this.RuleInfos[this.edRuleInfo.index].rule=this.edRuleInfo.rule;
                        this.$toast('修改成功');
                        this.isEditRuleInfoShow=false;    
                    }else{
                        this.$toast('修改失败');
                    }
                }).catch(err => {
                    this.$toast('修改失败');
                    console.log(err)
                });
            },
            delRuleInfo(RuleInfoId){
                // 删除守则详情
                this.$dialog.confirm({
                    title: '删除守则详情',
                    message: '是否删除该守则详情'
                }).then(() => {
                    this.$ajax({
                        method: 'DELETE',
                        headers: {
                            "Authorization": 'Bearer '+sessionStorage.token,
                        },
                        url: this.$config+'/api/rules/'+RuleInfoId,
                    }).then(res => {
                        // console.log(res);
                        if(res.status==204){
                            this.getRuleInfos();
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

        },
  	}
</script>