<style scoped>
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
	
    .editBox{width: 760px;min-height:240px;background-color: #fff;border-radius: 15px;}
    .editBoxContent{width:90%;margin-left: 5%;margin-top:20px;flex-flow:row wrap;justify-content: center;align-items: center;}
    .issure{width:100%;height:50px;margin-top: 20px;margin-bottom: 20px;}
    .issure>button{width:60%;height:50px;margin-left: 20%;background-color: #ffde01;font-size: 16px;border-radius: 8px;border: none;outline: none;}

    .editBtnGroup{width:97%;height:50px;line-height: 50px;}
    .editBtnGroup>img{width:40px;height: 40px;margin-right: 25px;float: right;}
    .areaSel{width:100%;height: 44px;border-width: 2px;border-style: solid;border-top-color: #999;border-left-color: #999;border-right-color: #eee;border-bottom-color: #eee;border-radius: 8px;}

    .van-dialog{width:50%;}

</style>

<template>
	<div class="dataBank_input_form disflex">
        <div class="pane_content_phone" v-for="(phone,index) in phones">
            <div class="form_content_phone disflex">
                <div class="form_item_phone">
                    <div class="item_title">{{$t('dataBankPhone.name')}}</div>
                    <div><input class="item_input_phone" :placeholder="$t('dataBankPhone.name')" type="text" disabled="disabled" :value="phone.name"></div>
                </div>
                <div class="form_item_phone">
                    <div class="item_title">{{$t('dataBankPhone.duty')}}</div>
                    <div><input class="item_input_phone" :placeholder="$t('dataBankPhone.duty')" type="text" disabled="disabled" :value="phone.duty"></div>
                </div>
                <div class="form_item_phone">
                    <div class="item_title">{{$t('dataBankPhone.area_code')}}</div>
                    <div><input class="item_input_phone" type="text" disabled="disabled" :value="phone.area_code"></div>
                </div>
                <div class="form_item_phone">
                    <div class="item_title">{{$t('dataBankPhone.phone')}}</div>
                    <div><input class="item_input_phone" type="text" disabled="disabled" :value="phone.phone"></div>
                </div>
            </div>
            <div class="editBtnGroup">
                <img @click="delPhone(phone.id);" src="/etravel/public/images/rush-icon.png">
                <img @click="editPhoneShow(index);" src="/etravel/public/images/edit-all.png">
            </div>
        </div>
        <div class="dataBankAddBtn" @click="addNewPhoneShow();">
            <img src="/etravel/public/images/add_y.png">
        </div> 
  		<van-popup v-model="isNewPhoneShow" :overlay="true">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item_phone">
		                <div class="item_title">{{$t('dataBankPhone.name')}}{{$t('filled')}}</div>
		                <div><input class="item_input_phone" :placeholder="$t('dataBankPhone.name')" type="text"  v-model="newPhone.name"></div>
		            </div>
                    <div class="form_item_phone">
                        <div class="item_title">{{$t('dataBankPhone.duty')}}</div>
                        <div><input class="item_input_phone" :placeholder="$t('dataBankPhone.duty')" type="text"  v-model="newPhone.duty"></div>
                    </div>
		            <div class="form_item_phone">
		                <div class="item_title">{{$t('dataBankPhone.area_code')}}{{$t('filled')}}</div>
		                <div>
                            <div class="areaSel">
                                <AreaCodeSelector @selectedAreaCode='selectedAreaCode' :areaCode='newPhone.area_code' v-model='newPhone.area_code'></AreaCodeSelector>
                            </div>      
                        </div>
		            </div>
		            <div class="form_item_phone">
		                <div class="item_title">{{$t('dataBankPhone.phone')}}{{$t('filled')}}</div>
		                <div><input class="item_input_phone" type="text" :placeholder="$t('dataBankPhone.phone')"  v-model="newPhone.phone"></div>
		            </div>
                    <div class="issure">
                        <button @click="addNewPhone()">{{$t('add')}}</button>
                    </div>
                </div>
            </div>
        </van-popup>
        <van-popup v-model="isEditPhoneShow" :overlay="true">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item_phone">
		                <div class="item_title">{{$t('dataBankPhone.name')}}{{$t('filled')}}</div>
		                <div><input class="item_input_phone" :placeholder="$t('dataBankPhone.name')" type="text"  v-model="edPhone.name"></div>
		            </div>
                    <div class="form_item_phone">
                        <div class="item_title">{{$t('dataBankPhone.duty')}}</div>
                        <div><input class="item_input_phone" :placeholder="$t('dataBankPhone.duty')" type="text"  v-model="edPhone.duty"></div>
                    </div>
		            <div class="form_item_phone">
		                <div class="item_title">{{$t('dataBankPhone.area_code')}}{{$t('filled')}}</div>
                        <!-- <div><input class="item_input_phone" type="text" placeholder="電話區號"  v-model="edPhone.area_code"></div> -->
		                <div>
                            <div class="areaSel">
                                <AreaCodeSelector @selectedAreaCode='selectedAreaCode' :areaCode='edPhone.area_code' v-model='edPhone.area_code'></AreaCodeSelector>
                            </div>
                        </div>
		            </div>

		            <div class="form_item_phone">
		                <div class="item_title">{{$t('dataBankPhone.phone')}}{{$t('filled')}}</div>
		                <div><input class="item_input_phone" type="text" :placeholder="$t('dataBankPhone.phone')"  v-model="edPhone.phone"></div>
		            </div>
                    <div class="issure">
                        <button @click="editPhone()">{{$t('edit')}}</button>
                    </div>
                </div>
            </div>
        </van-popup>
    </div>
</template>

<script>
    import AreaCodeSelector from '../components/AreaCodeSelector.vue';

  	export default {
        components: {
            AreaCodeSelector,
        },
  		data() {
            return {
	        	phones:[],
	        	newPhone:{
	        		name:'',
	        		phone:'',
                    duty:'',
	        		area_code:'',
	        		travel_id:sessionStorage.actTravelId,
	        	},
	        	edPhone:{
	        		name:'',
	        		phone:'',
                    duty:'',
	        		area_code:'',
	        		id:'',
	        		index:'',
	        	},
	        	isNewPhoneShow:false,
	        	isEditPhoneShow:false,
                isNew:true,
            }
        },
        mounted:function(){
        	this.getPhones();
        },
        methods:{
            getPhones(){
                // 获取常用聯繫人
                this.$get(this.$config+'/api/travels/'+sessionStorage.actTravelId+'/telephones',
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    // console.log(res.data);
                    this.phones=res.data.data;
                }).catch(err => {
                    this.$toast(this.$t('loginTimeout'));
                    console.log(err);
                });

            },
            addNewPhoneShow(){
                this.isNewPhoneShow=true;
                this.isNew=true;
            },
            addNewPhone(){
                // 新增聯繫人
                this.$post(this.$config+'/api/telephones',this.newPhone,
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    // console.log(res.data);
                    this.$toast(this.$t('addSuccess'));
                    this.getPhones();
                    this.isNewPhoneShow=false;
                    this.newPhone.name='';
                    this.newPhone.area_code='';
                    this.newPhone.phone='';
                    this.newPhone.duty='';
                }).catch(err => {
                    this.$toast(this.$t('addFail'));
                    if(err.response.data.errors){
                        for(var key in err.response.data.errors){
                            this.$toast(err.response.data.errors[key][0]);
                        }
                    }else{
                        this.$toast(err.response.data.message);
                    }
                    console.log(err);
                });
            },
            editPhoneShow(index){
                this.edPhone.id=this.phones[index].id;
                this.edPhone.name=this.phones[index].name;
                this.edPhone.area_code=this.phones[index].area_code;
                this.edPhone.phone=this.phones[index].phone;
                this.edPhone.duty=this.phones[index].duty;
                this.edPhone.index=index;
                this.isEditPhoneShow=true;
                this.isNew=false;
            },
            editPhone(){
                // 修改聯繫人信息
                this.$ajax({
                    method: 'PATCH',
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    },
                    data:{
                        name:this.edPhone.name,
                        area_code:this.edPhone.area_code,
                        phone:this.edPhone.phone,
                        duty:this.edPhone.duty,
                    },
                    url: this.$config+'/api/telephones/'+this.edPhone.id,
                }).then(res => {
                    if(res.status==200){
                        this.phones[this.edPhone.index].name=this.edPhone.name;
                        this.phones[this.edPhone.index].area_code=this.edPhone.area_code;
                        this.phones[this.edPhone.index].phone=this.edPhone.phone;
                        this.phones[this.edPhone.index].duty=this.edPhone.duty;
                        this.$toast(this.$t('editSuccess'));
                        this.isEditPhoneShow=false;    
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
            delPhone(phoneId){
                // 删除领队
                this.$dialog.confirm({
                    title: this.$t('dataBankPhone.delPhone'),
                    message: this.$t('dataBankPhone.confirmDelPhone'),
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
                        url: this.$config+'/api/telephones/'+phoneId,
                    }).then(res => {
                        // console.log(res);
                        if(res.status==204){
                            this.getPhones();
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
            },
            selectedAreaCode(value){
                if(this.isNew){
                    this.newPhone.area_code=value;
                }else{
                    this.edPhone.area_code=value;
                }
            },
        },
  	}
</script>