<style>
		.dataBank_input_form{width: 100%;min-height:650px;justify-content: center;align-items:flex-start;font-size: 16px;position: relative;}
        .pane_content{width:70%;height:auto;margin-bottom: 30px;font-size: 16px;margin-top:20px;}
        
        .right_title{width:100%;height:50px;line-height: 50px;position: relative;text-align: center;font-size: 20px;border-bottom: 1px solid #d6d6d6;}
        .title_icon{width:35px;height:35px;position: absolute;left: 8px;top:8px;line-height: 35px;}
        .title_icon>img{width:28px;height: 28px;}

        .form_content{width: 94%;min-height: 210px;align-content:flex-start;flex-direction: row;flex-wrap: wrap;margin-left: 3%;}

        .form_item{width: 100%;min-height:100px;}
        .form_item>div{width: 96%;min-height: 45px;line-height: 45px;}

        .item_area{width:97%;height:80px;border-radius: 8px;resize:none;line-height:25px;font-size: 14px;outline: none;overflow: hidden;background-color: #eee;}

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
            <div class="title_icon" @click="$router.push('/dataBankRules')">
                <img src="../../images/back.png">
            </div>
            在飞机上
        </div>
        <div class="dataBank_input_form disflex">
            
            <div class="pane_content">
                <div class="form_content disflex">
                    <div class="form_item">
                        <div class="item_title">要求01</div>
                        <div>
                            <textarea class="item_area" placeholder="要求01" ></textarea>
                        </div>
                    </div>
                    <div class="form_item">
                        <div class="item_title">要求01</div>
                        <div>
                            <textarea class="item_area" placeholder="要求01" ></textarea>
                        </div>
                    </div>
                    <div class="form_item">
                        <div class="item_title">要求01</div>
                        <div>
                            <textarea class="item_area" placeholder="要求01" ></textarea>
                        </div>
                    </div>
                </div>
            </div>    
                       
            <div class="dataBankEditBtn">
                <img src="../../images/editAll.png">
            </div>
            <div class="dataBankAddBtn">
                <img src="../../images/add_y.png">
            </div>
            <div class="dataBankDelBtn">
                <img src="../../images/rush-icon.png">
            </div>
        </div>
        <div class="dataBankComfirm disflex">
            <div class="btnItem"><button class="cancel">取消</button></div>
            <div class="btnItem"><button class="ensure">确定</button></div>
        </div>
        
    </div>
</template>

<script>
  	export default {
  		data() {
            return {
	        	phones:[],
	        	newPhone:{
	        		name:'',
	        		phone:'',
	        		area_code:'',
	        		travel_id:sessionStorage.actTravelId,
	        	},
	        	edPhone:{
	        		name:'',
	        		phone:'',
	        		area_code:'',
	        		id:'',
	        		index:'',
	        	},
	        	isNewRuleInfoShow:false,
	        	isEditRuleInfoShow:false,
            }
        },
        mounted:function(){
        	this.getPhones();
        },
        methods:{
            getPhones(){
                // 获取常用联系人
                this.$get('/api/travels/'+sessionStorage.actTravelId+'/telephones',
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    // console.log(res.data);
                    this.phones=res.data.data;
                }).catch(err => {
                    this.$toast('获取失败');
                    console.log(err);
                });

            },
            addNewPhoneShow(){
                this.isNewRuleInfoShow=true;
            },
            addNewPhone(){
                // 新增联系人
                this.$post('/api/telephones',this.newPhone,
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    // console.log(res.data);
                    this.$toast('添加成功');
                    this.getPhones();
                    this.isNewPhoneShow=false;
                    this.newPhone.name='';
                    this.newPhone.area_code='';
                    this.newPhone.phone='';
                }).catch(err => {
                    this.$toast('添加失败');
                    console.log(err)
                });
            },
            editPhoneShow(index){
                this.edPhone.id=this.phones[index].id;
                this.edPhone.name=this.phones[index].name;
                this.edPhone.area_code=this.phones[index].area_code;
                this.edPhone.phone=this.phones[index].phone;
                this.edPhone.index=index;
                this.isEditRuleInfoShow=true;
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
                        this.isEditRuleInfoShow=false;    
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