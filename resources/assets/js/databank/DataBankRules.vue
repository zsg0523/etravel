<style>
    .dataBank_input_form{width: 100%;min-height:650px;justify-content: center;align-items:flex-start;font-size: 16px;position: relative;}
    .pane_content{width:70%;height:auto;margin-bottom: 30px;font-size: 16px;margin-top:20px;}

    .form_content{width: 94%;min-height: 210px;align-content:flex-start;flex-direction: row;flex-wrap: wrap;margin-left: 3%;}

    .form_item{width: 100%;height:100px;}
    .form_item>div{width: 96%;height: 45px;line-height: 45px;}
    .item_input{height:40px;padding-left:10px;outline: none;width: 90%;border-radius: 8px;}

    .input_icon{width: 100%;height: 50px;justify-content: flex-start;align-items:center;font-size: 18px;}
    .input_icon>input{width: 80%;height: 40px;border-radius: 8px;outline: none;padding-left:10px;}
    .input_icon>div{width: 80px;height: 45px;}
    .input_icon>div>img{width:40px;height: 40px;float: right;}
    .input_icon>div>img:hover{cursor: pointer;}
    .active{font-size: 18px;}   
</style>

<template>
    <div class="dataBank_input_form disflex">
        <div class="pane_content" v-for="(rule,index) in rules">
            <div class="form_content disflex">
                <div class="form_item">
                    <div class="item_title">准则01</div>
                    <div class="input_icon disflex">
                        <input placeholder="准则" type="text" name="">
                        <div @click="$router.push('/dataBankRulesInfo')">
                            <img src="../../images/See-next.png" alt="">
                        </div>
                    </div>
                    <div class="editBtnGroup">
		                <img @click="delPhone(rule.id);" src="../../images/rush-icon.png">
		                <img @click="editPhoneShow(index);" src="../../images/edit-all.png">
		            </div>
                </div>
            </div>
        </div>    
        <div class="dataBankAddBtn" @click="addNewPhoneShow();">
            <img src="../../images/add_y.png">
        </div> 
    </div>
</template>

<script>
  	export default {
  		data() {
            return {
	        	rules:[],
	        	newRule:{

	        		travel_id:sessionStorage.actTravelId,
	        	},
	        	edRule:{

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
                // 获取守则分类
                this.$get('/api/travels/'+sessionStorage.actTravelId+'/categories',
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    // console.log(res.data);
                    this.rules=res.data.data;
                }).catch(err => {
                    this.$toast('获取失败');
                    console.log(err);
                });

            },
            addNewRuleShow(){
                this.isNewRuleShow=true;
            },
            addNewRule(){
                // 新增联系人
                this.$post('/api/telephones',this.newRule,
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    // console.log(res.data);
                    this.$toast('添加成功');
                    this.getRules();
                    this.isNewRuleShow=false;
                    this.newRule.name='';
                    this.newRule.area_code='';
                    this.newRule.phone='';
                }).catch(err => {
                    this.$toast('添加失败');
                    console.log(err)
                });
            },
            editRuleShow(index){
                this.edRule.id=this.rules[index].id;
                this.edRule.name=this.rules[index].name;
                this.edRule.area_code=this.rules[index].area_code;
                this.edRule.phone=this.rules[index].phone;
                this.edRule.index=index;
                this.isEditRuleShow=true;
            },
            editPhone(){
                // 修改联系人信息
                this.$ajax({
                    method: 'PATCH',
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    },
                    data:{
                        name:this.edPhone.name,
                        area_code:this.edPhone.area_code,
                        phone:this.edPhone.phone,
                    },
                    url: '/api/telephones/'+this.edPhone.id,
                }).then(res => {
                    if(res.status==200){
                        this.phones[this.edPhone.index].name=this.edPhone.name;
                        this.phones[this.edPhone.index].area_code=this.edPhone.area_code;
                        this.phones[this.edPhone.index].phone=this.edPhone.phone;
                        this.$toast('修改成功');
                        this.isEditPhoneShow=false;    
                    }else{
                        this.$toast('修改失败');
                    }
                }).catch(err => {
                    this.$toast('修改失败');
                    console.log(err)
                });
            },
            delPhone(phoneId){
                // 删除领队
                this.$dialog.confirm({
                    title: '删除联系人',
                    message: '是否删除该联系人'
                }).then(() => {
                    this.$ajax({
                        method: 'DELETE',
                        headers: {
                            "Authorization": 'Bearer '+sessionStorage.token,
                        },
                        url: '/api/telephones/'+phoneId,
                    }).then(res => {
                        // console.log(res);
                        if(res.status==204){
                            this.getPhones();
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