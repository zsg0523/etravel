<style>
	.dataBank_input_form{width: 100%;min-height:650px;flex-flow:row wrap;justify-content: center;align-items:flex-start;font-size: 16px;position: relative;}
    .tablist{width:100%;}
    .nav-tabs>li>a{color: #000;}
    .pane_content_phone{width:70%;height:auto;margin-bottom: 30px;font-size: 16px;border:1px solid #ccc;border-radius: 15px;margin-top:20px;}

    .form_content_phone{width: 94%;min-height: 210px;align-content:flex-start;flex-direction: row;flex-wrap: wrap;margin-left: 3%;}

    .form_item_phone{width: 100%;min-height:100px;}
    .form_item_phone>div{width: 96%;min-height: 45px;line-height: 45px;}
    .item_input_phone{height:40px;padding-left:10px;outline: none;width: 100%;border-radius: 8px;}
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
	<div class="dataBank_input_form disflex">
        <div class="pane_content_phone" v-for="(phone,index) in phones">
            <div class="form_content_phone disflex">
                <div class="form_item_phone">
                    <div class="item_title">联系人姓名</div>
                    <div><input class="item_input_phone" placeholder="联系人姓名" type="text" disabled="disabled" :value="phone.name"></div>
                </div>
                <div class="form_item_phone">
                    <div class="item_title">电话区号</div>
                    <div><input class="item_input_phone" type="text" disabled="disabled" :value="phone.area_code"></div>
                </div>
                <div class="form_item_phone">
                    <div class="item_title">联系电话</div>
                    <div><input class="item_input_phone" type="text" disabled="disabled" :value="phone.phone"></div>
                </div>
            </div>
            <div class="editBtnGroup">
                <img @click="delPhone(phone.id);" src="../../images/rush-icon.png">
                <img @click="editPhoneShow(index);" src="../../images/edit-all.png">
            </div>
        </div>
        <div class="dataBankAddBtn" @click="addNewPhoneShow();">
            <img src="../../images/add_y.png">
        </div> 
  		<van-popup v-model="isNewPhoneShow" :overlay="true" style="border-radius: 15px;">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item_phone">
		                <div class="item_title">联系人姓名</div>
		                <div><input class="item_input_phone" placeholder="联系人姓名" type="text"  v-model="newPhone.name"></div>
		            </div>
		            <div class="form_item_phone">
		                <div class="item_title">电话区号</div>
		                <div><input class="item_input_phone" type="text"  v-model="newPhone.area_code"></div>
		            </div>
		            <div class="form_item_phone">
		                <div class="item_title">联系电话</div>
		                <div><input class="item_input_phone" type="text"  v-model="newPhone.phone"></div>
		            </div>
                    <div class="issure">
                        <button @click="addNewPhone()">添加</button>
                    </div>
                </div>
            </div>
        </van-popup>
        <van-popup v-model="isEditPhoneShow" :overlay="true" style="border-radius: 15px;">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item_phone">
		                <div class="item_title">联系人姓名</div>
		                <div><input class="item_input_phone" placeholder="联系人姓名" type="text"  v-model="edPhone.name"></div>
		            </div>
		            <div class="form_item_phone">
		                <div class="item_title">电话区号</div>
		                <div><input class="item_input_phone" type="text"  v-model="edPhone.area_code"></div>
		            </div>
		            <div class="form_item_phone">
		                <div class="item_title">联系电话</div>
		                <div><input class="item_input_phone" type="text"  v-model="edPhone.phone"></div>
		            </div>
                    <div class="issure">
                        <button @click="editPhone()">修改</button>
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
	        	isNewPhoneShow:false,
	        	isEditPhoneShow:false,
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
                this.isNewPhoneShow=true;
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
                this.isEditPhoneShow=true;
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