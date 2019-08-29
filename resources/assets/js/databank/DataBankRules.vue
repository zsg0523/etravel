<style scoped>
    .dataBank_input_form{width: 100%;min-height:650px;justify-content: center;align-items:flex-start;font-size: 16px;position: relative;}
    .pane_content_rule{width:70%;height:auto;margin-bottom: 30px;font-size: 16px;margin-top:20px;}

    .form_content_rules{width: 94%;min-height: 110px;align-content:flex-start;flex-direction: row;flex-wrap: wrap;margin-left: 3%;}

    .form_item_rules{width: 100%;min-height:100px;}
    .form_item_rules>div{min-height: 45px;line-height: 45px;}
    .item_input{min-height:40px;padding-left:10px;outline: none;width: 90%;border-radius: 8px;}


    .dataBankAddBtn{width:50px;height: 50px;position: absolute;right: 5px;top: 5px;}
    .dataBankAddBtn:hover{cursor:pointer;}
    .dataBankAddBtn>img{width:50px;height: 50px;}
	
    .editBox{width: 760px;min-height:240px;background-color: #fff;border-radius: 15px;}
    .editBoxContent{width:90%;margin-left: 5%;margin-top:20px;flex-flow:row wrap;justify-content: center;align-items: center;height: 100%;}
    .issure{width:100%;height:50px;margin-top: 20px;margin-bottom: 20px;}
    .issure>button{width:60%;height:50px;margin-left: 20%;background-color: #ffde01;font-size: 16px;border-radius: 8px;border: none;outline: none;}

    .editBtnGroup_rules{width:80%;height:50px;line-height: 50px;}
    .editBtnGroup_rules>img{width:40px;height: 40px;margin-left: 25px;float: right;}

    .van-dialog{width:50%;}
</style>

<template>
    <div class="dataBank_input_form disflex" style="position:relative;">
        <div class="pane_content_rule" >
            <div class="form_content_rules disflex" v-if="ruless[0]">
                <div class="form_item_rules">
                    <div class="item_title">{{$t('dataBankRules.rule')}}</div>
                    <div style="border:1px solid #ccc;width:97%;background-color:#eeeeee;line-height:normal;min-height:45px;" v-html="ruless[0].content"></div>
                </div>
            </div>
            <div class="form_content_rules disflex" v-else>
                <div class="form_item_rules">
                    <div class="item_title">{{$t('dataBankRules.rule')}}</div>
                    <div style="border:1px solid #ccc;width:97%;background-color:#eeeeee;line-height:40px;min-height: 45px;">
                        {{$t('dataBankRules.noRule')}}
                    </div>
                </div>
            </div>
            <div class="dataBankAddBtn" @click="addNewRuleShow();">
                <img src="/etravel/public/images/edit-all.png">
            </div>
        </div>    
  		<van-popup v-model="isNewRuleShow" :overlay="true">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item_rules">
		                <div class="item_title">{{$t('dataBankRules.rule')}}</div>
                        <div><Editor @catchData='catchData' :childData='newRule.content' v-model='newRule.content'></Editor></div>
		            </div>
                    <div class="issure">
                        <button @click="addNewRule()">{{$t('edit')}}</button>
                    </div>
                </div>
            </div>
        </van-popup>
    </div>
</template>

<script>
    import Editor from '../components/Editor.vue';
  	export default {
        components: {
            Editor,
        },
  		data() {
            return {
	        	ruless:[],
	        	newRule:{
	        		content:'',
                    rule_category_name:'團隊守則',
	        		type:10,
	        	},
	        	isNewRuleShow:false,
            }
        },
        mounted:function(){
        	this.getRules();
        },
        methods:{
            getRules(){
                // 获取團隊守則分类
                this.$ajax({
                    method: 'GET',
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    },
                    params:{
                        type:10,
                    },
                    url: this.$config+'/api/travels/'+sessionStorage.actTravelId+'/categories',
                }).then(res => {
                    // console.log(res.data);
                    this.ruless=res.data.data;
                    this.newRule.content=res.data.data[0].content;
                }).catch(err => {
                    this.$toast(this.$t('loginTimeout'));
                    console.log(err);
                });

            },
            addNewRuleShow(){
                this.isNewRuleShow=true;
            },
            addNewRule(){
                // 新增團隊守則
                this.$post(this.$config+'/api/travels/'+sessionStorage.actTravelId+'/categories',this.newRule,
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    // console.log(res.data);
                    this.$toast(this.$t('editSuccess'));
                    this.getRules();
                    this.isNewRuleShow=false;
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
            editRuleShow(index){
                this.edRule.id=this.ruless[index].id;
                this.edRule.rule_category_name=this.ruless[index].rule_category_name;
                this.edRule.index=index;
                this.isEditRuleShow=true;
            },
            editRule(){
                // 修改團隊守則信息
                this.$ajax({
                    method: 'PATCH',
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    },
                    data:{
                        rule_category_name:this.edRule.rule_category_name,
                    },
                    url: this.$config+'/api/travels/'+sessionStorage.actTravelId+'/categories/'+this.edRule.id,
                }).then(res => {
                    if(res.status==200){
                        this.ruless[this.edRule.index].rule_category_name=this.edRule.rule_category_name;
                        this.$toast(this.$t('editSuccess'));
                        this.isEditRuleShow=false;    
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
            delRule(ruleId){
                // 删除團隊守則
                this.$dialog.confirm({
                    title: '删除團隊守則',
                    message: '是否删除該團隊守則',
                    cancelButtonText:'取消',
                    cancelButtonColor:'#ccc',
                    confirmButtonText:'確定',
                    confirmButtonColor:'#000',
                }).then(() => {
                    this.$ajax({
                        method: 'DELETE',
                        headers: {
                            "Authorization": 'Bearer '+sessionStorage.token,
                        },
                        url: this.$config+'/api/travels/'+sessionStorage.actTravelId+'/categories/'+ruleId,
                    }).then(res => {
                        // console.log(res);
                        if(res.status==204){
                            this.getRules();
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
            catchData(value){
                this.newRule.content=value;
            },

        },
  	}
</script>