y<style>
    .dataBank_input_form{width: 100%;min-height:650px;justify-content: center;align-items:flex-start;font-size: 16px;position: relative;}
    .pane_content_rule{width:70%;height:auto;margin-bottom: 30px;font-size: 16px;margin-top:20px;}

    .form_content_rules{width: 94%;min-height: 110px;align-content:flex-start;flex-direction: row;flex-wrap: wrap;margin-left: 3%;}

    .form_item_rules{width: 100%;min-height:100px;}
    .form_item_rules>div{height: 45px;line-height: 45px;}
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

    .editBtnGroup_rules{width:80%;height:50px;line-height: 50px;}
    .editBtnGroup_rules>img{width:40px;height: 40px;margin-left: 25px;float: right;}

    .van-dialog{width:50%;}
</style>

<template>
    <div class="dataBank_input_form disflex" style="position:relative;">
        <div class="pane_content_rule" >
            <div class="form_content_rules disflex">
                <div class="form_item_rules"  v-for="(rule,index) in ruless">
                    <div class="item_title">承諾標題{{index+1}}</div>
                    <div class="input_icon disflex">
                        <input placeholder="承諾標題" type="text" disabled="disabled" :value="rule.rule_category_name">
                        <div @click="$router.push('/promise/dataBankPromisesInfo/'+rule.id)">
                            <img src="/etravel/public/images/See-next.png" alt="">
                        </div>
                    </div>
                    <div class="editBtnGroup_rules">
		                <img @click="delRule(rule.id);" src="/etravel/public/images/rush-icon.png">
		                <img @click="editRuleShow(index);" src="/etravel/public/images/edit-all.png">
		            </div>
                </div>
            </div>
        </div>    
        <div class="dataBankAddBtn" @click="addNewRuleShow();">
            <img src="/etravel/public/images/add_y.png">
        </div>
  		<van-popup v-model="isNewRuleShow" :overlay="true">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item_rules">
		                <div class="item_title">承諾標題</div>
		                <div><input class="item_input" placeholder="承諾標題" type="text"  v-model="newRule.rule_category_name"></div>
		            </div>
                    <div class="issure">
                        <button @click="addNewRule()">添加</button>
                    </div>
                </div>
            </div>
        </van-popup>
        <van-popup v-model="isEditRuleShow" :overlay="true">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item_rules">
		                <div class="item_title">承諾標題</div>
		                <div><input class="item_input" placeholder="承諾標題" type="text"  v-model="edRule.rule_category_name"></div>
		            </div>
                    <div class="issure">
                        <button @click="editRule()">修改</button>
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
	        	ruless:[],
	        	newRule:{
	        		rule_category_name:'',
	        		type:20,
	        	},
	        	edRule:{
	        		rule_category_name:'',
	        		id:'',
	        		index:'',
	        	},
	        	isNewRuleShow:false,
	        	isEditRuleShow:false,
            }
        },
        mounted:function(){
        	this.getRules();
        },
        methods:{
            getRules(){
                // 获取承诺分类
                this.$ajax({
                    method: 'GET',
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    },
                    params:{
                        type:20,
                    },
                    url: this.$config+'/api/travels/'+sessionStorage.actTravelId+'/categories',
                }).then(res => {
                    // console.log(res.data);
                    this.ruless=res.data.data;
                }).catch(err => {
                    this.$toast('獲取失敗');
                    console.log(err);
                });

            },
            addNewRuleShow(){
                this.isNewRuleShow=true;
            },
            addNewRule(){
                // 新增承诺
                this.$post(this.$config+'/api/travels/'+sessionStorage.actTravelId+'/categories',this.newRule,
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    // console.log(res.data);
                    this.$toast('添加成功');
                    this.getRules();
                    this.isNewRuleShow=false;
                    this.newRule.rule_category_name='';
                }).catch(err => {
                    this.$toast('添加失败');
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
                // 修改承诺信息
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
                        this.$toast('修改成功');
                        this.isEditRuleShow=false;    
                    }else{
                        this.$toast('修改失败');
                    }
                }).catch(err => {
                    this.$toast('修改失败');
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
                // 删除承诺
                this.$dialog.confirm({
                    title: '删除承诺',
                    message: '是否删除该承诺',
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

        },
  	}
</script>