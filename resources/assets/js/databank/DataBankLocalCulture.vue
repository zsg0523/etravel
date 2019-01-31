<style>
	.dataBank_input_form{width: 100%;min-height:650px;justify-content: center;align-items:flex-start;font-size: 16px;position: relative;}
    .tablist{width:100%;}
    .nav-tabs>li>a{color: #000;}
    .pane_content_culture{width:70%;margin-left: 15%;height:auto;margin-bottom: 30px;font-size: 16px;}
    .form_content_culture{width: 100%;min-height: 300px;align-content:flex-start;flex-direction: row;flex-wrap: wrap;}
    .form_item_culture{width:100%;height:100px;}
    .form_item_culture>div{width: 100%;height: 45px;line-height: 45px;word-break: break-all;}
    .item_input{height:40px;padding-left:10px;outline: none;width: 97%;border-radius: 8px;}
    .item_area{width:97%;height:80px;border-radius: 8px;resize:none;line-height:25px;font-size: 14px;outline: none;overflow: hidden;background-color: #eee;}
    .active{font-size: 18px;}  

	.dataBankAddBtn_culture{width:50px;height: 50px;position: absolute;right: 5px;top: 50px;}
    .dataBankAddBtn_culture:hover{cursor:pointer;}
    .dataBankAddBtn_culture>img{width:50px;height: 50px;}

    .dataBankEditBtn_culture{width:50px;height: 50px;position: absolute;right: 5px;top: 130px;}
    .dataBankEditBtn_culture:hover{cursor:pointer;}
    .dataBankEditBtn_culture>img{width:50px;height: 50px;}
	
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
        <div class="tablist">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#gather" aria-controls="gather" role="tab" data-toggle="tab">景点资讯</a></li>
                <li role="presentation"><a href="#flight" aria-controls="flight" role="tab" data-toggle="tab">地图</a></li>
            </ul>
            <div class="tab-content">
                <!-- 景点资讯 -->
                <div role="tabpanel" class="tab-pane active" id="gather">
                    <div class="pane_content_culture">   
                        <div class="form_content_culture disflex">
                            <div class="form_item_culture">
                                <div class="item_title">小标题(多少字符以内)</div>
                                <div><input class="item_input" placeholder="小标题" type="text" name=""></div>
                            </div>
                            <div class="form_item_culture">
                                <div class="item_title">图片</div>
                                <div> 
                                    <div><input class="item_input" type="text" name=""></div>
                                </div>
                            </div>
                            <div class="form_item_culture" style="width:100%;height:120px;">
                                <div class="item_title">内容</div>
                                <div>
                                    <textarea class="item_area" placeholder="内容"></textarea>
                                </div>
                            </div>
                        </div>
						<div class="dataBankAddBtn_culture" @click="addNewRuleInfoShow();">
				            <img src="/etravel/public/images/add_y.png">
				        </div>
				        <div class="dataBankEditBtn_culture" @click="addNewRuleInfoShow();">
				            <img src="/etravel/public/images/edit-all.png">
				        </div>
                    </div>

                </div>

                <!-- 地图 -->
                <div role="tabpanel" class="tab-pane" id="flight">
                    <div class="pane_content_culture"> 
                        <div class="form_content_culture disflex">
                            <div class="form_item_culture">
                                <div class="item_title">城市地址</div>
                                <div><input class="item_input" type="text" name=""></div>
                            </div>
                            <div class="form_item_culture">
                                <div class="item_title">酒店详细地址</div>
                                <div>
                                    <div><input class="item_input" type="text" name=""></div>
                                </div>
                            </div>
                            <div class="form_item_culture">
                                <div class="item_title">图片</div>
                                <div> 
                                    <div><input class="item_input" type="text" name=""></div>
                                </div>
                            </div>
                        </div>
                        <div class="dataBankAddBtn_culture" @click="addNewRuleInfoShow();">
				            <img src="/etravel/public/images/add_y.png">
				        </div>
				        <div class="dataBankEditBtn_culture" @click="addNewRuleInfoShow();">
				            <img src="/etravel/public/images/edit-all.png">
				        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- 图片上传 -->
        <!-- <van-uploader :after-read="onRead" accept="image/*" multiple>
	      	<img class="" src="/etravel/public/images/logo.png" ref="goodsImg"/>
	  	</van-uploader> -->
       <!--  <van-popup v-model="isNewLocalCultureShow" :overlay="true" style="border-radius: 15px;">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item_LocalCulture">
                        <div class="item_title">承诺</div>
                        <div>
                            <textarea class="item_area" placeholder="承诺" v-model="newLocalCulture.rule_category_name"></textarea>
                        </div>
                    </div>
                    <div class="issure">
                        <button @click="addNewLocalCulture()">添加</button>
                    </div>
                </div>
            </div>
        </van-popup>
        <van-popup v-model="isEditLocalCultureShow" :overlay="true" style="border-radius: 15px;">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item_LocalCulture">
                        <div class="item_title">承诺</div>
                        <div>
                            <textarea class="item_area" placeholder="承诺" v-model="edLocalCulture.rule_category_name"></textarea>
                        </div>
                    </div>
                    <div class="issure">
                        <button @click="editLocalCulture()">修改</button>
                    </div>
                </div>
            </div>
        </van-popup>               -->
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
	        	isNewLocalCultureShow:false,
	        	isEditLocalCultureShow:false,
            }
        },
        mounted:function(){
        	this.getPromises();
        },
        methods:{
            getPromises(){
                // 获取承诺
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
                    this.$toast('获取失败');
                    console.log(err);
                });
            },
            addNewPromiseShow(){
                this.isNewPromiseShow=true;
            },
            addNewPromise(){
                // 新增承诺
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
                    this.$toast('添加失败');
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
                // 修改承诺信息
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
                        this.$toast('修改失败');
                    }
                }).catch(err => {
                    this.$toast('修改失败');
                    console.log(err)
                });
            },
            delPromise(promiseId){
                // 删除承诺
                this.$dialog.confirm({
                    title: '删除承诺',
                    message: '是否删除该承诺'
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
                            this.$toast('删除失败');
                        }
                    }).catch(err => {
                        this.$toast('删除失败');
                        console.log(err)
                    });
                }).catch(err => {

                });
            },
            //选择图片后执行
		  	onRead(file){
		       	console.log(file);
		       	//将原图片显示为选择的图片
		       	this.$refs.goodsImg.src = file.content;
		   	}

        },
  	}
</script>