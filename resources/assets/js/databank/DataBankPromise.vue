<style>
    .dataBank_input_form{width: 100%;min-height:650px;justify-content: center;align-items:flex-start;font-size: 16px;position: relative;}
    .pane_content_promise{width:70%;height:auto;margin-bottom: 30px;font-size: 16px;margin-top:20px;}
    
    .right_title{width:100%;height:50px;line-height: 50px;text-align: center;font-size: 20px;border-bottom: 1px solid #d6d6d6;}
    .form_content{width: 94%;min-height: 150px;align-content:flex-start;flex-direction: row;flex-wrap: wrap;margin-left: 3%;}

    .form_item_promise{width: 100%;min-height:100px;}
    .form_item_promise>div{width: 96%;min-height: 45px;}

    .item_area{width:97%;height:80px;border-radius: 8px;resize:none;line-height:25px;font-size: 14px;outline: none;overflow: hidden;background-color: #eee;}

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
            承諾書
        </div>
        <div class="dataBank_input_form disflex">
            <div class="pane_content_promise">
                <div class="form_content disflex" v-for="(promise,index) in promises">
                    <div class="form_item_promise">
                        <div class="item_title">承諾{{index+1}}</div>
                        <div>
                            <textarea class="item_area" placeholder="承諾" disabled="disabled" :value="promise.rule_category_name" ></textarea>
                        </div>
                    </div>
                    <div class="editBtnGroup">
		                <img @click="delPromise(promise.id);" src="/etravel/public/images/rush-icon.png">
		                <img @click="editPromiseShow(index);" src="/etravel/public/images/edit-all.png">
		            </div>
                </div>
                <div class="dataBankAddBtn" @click="addNewPromiseShow();">
		            <img src="/etravel/public/images/add_y.png">
		        </div>
            </div>       
        </div>
		<van-popup v-model="isNewPromiseShow" :overlay="true">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item_promise">
                        <div class="item_title">承諾</div>
                        <div>
                            <textarea class="item_area" placeholder="承諾" v-model="newPromise.rule_category_name"></textarea>
                        </div>
                    </div>
                    <div class="issure">
                        <button @click="addNewPromise()">添加</button>
                    </div>
                </div>
            </div>
        </van-popup>
        <van-popup v-model="isEditPromiseShow" :overlay="true">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item_promise">
                        <div class="item_title">承諾</div>
                        <div>
                            <textarea class="item_area" placeholder="承諾" v-model="edPromise.rule_category_name"></textarea>
                        </div>
                    </div>
                    <div class="issure">
                        <button @click="editPromise()">修改</button>
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
	        	promises:[],
	        	newPromise:{
	        		rule_category_name:'',
	        		type:20,
	        	},
	        	edPromise:{
	        		id:'',
	        		rule_category_name:'',
	        		index:'',
	        	},
	        	isNewPromiseShow:false,
	        	isEditPromiseShow:false,
            }
        },
        mounted:function(){
        	this.getPromises();
        },
        methods:{
            getPromises(){
                // 获取承諾
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
                    this.promises=res.data.data;
                }).catch(err => {
                    this.$toast('獲取失敗');
                    console.log(err);
                });
            },
            addNewPromiseShow(){
                this.isNewPromiseShow=true;
            },
            addNewPromise(){
                // 新增承諾
                this.$post(this.$config+'/api/travels/'+sessionStorage.actTravelId+'/categories',this.newPromise,
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    // console.log(res.data);
                    this.$toast('添加成功');
                    this.getPromises();
                    this.isNewPromiseShow=false;
                    this.newPromise.rule_category_name='';
                }).catch(err => {
                    this.$toast('添加失敗');
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
            editPromiseShow(index){
                this.edPromise.id=this.promises[index].id;
               	this.edPromise.rule_category_name=this.promises[index].rule_category_name;
                this.edPromise.index=index;
                this.isEditPromiseShow=true;
            },
            editPromise(){
                // 修改承諾信息
                this.$ajax({
                    method: 'PATCH',
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    },
                    data:{
                        rule_category_name:this.edPromise.rule_category_name,
                    },
                    url: this.$config+'/api/travels/'+sessionStorage.actTravelId+'/categories/'+this.edPromise.id,
                }).then(res => {
                    if(res.status==200){
                        this.promises[this.edPromise.index].rule_category_name=this.edPromise.rule_category_name;
                        this.$toast('修改成功');
                        this.isEditPromiseShow=false;    
                    }else{
                        this.$toast('修改失敗');
                    }
                }).catch(err => {
                    this.$toast('修改失敗');
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
            delPromise(promiseId){
                // 删除承諾
                this.$dialog.confirm({
                    title: '删除承諾',
                    message: '是否删除该承諾',
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
                        url: this.$config+'/api/travels/'+sessionStorage.actTravelId+'/categories/'+promiseId,
                    }).then(res => {
                        // console.log(res);
                        if(res.status==204){
                            this.getPromises();
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