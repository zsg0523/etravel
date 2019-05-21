<style>
    .dataBank_input_form{width: 100%;min-height:650px;justify-content: center;align-items:flex-start;font-size: 16px;position: relative;}
    .pane_content_sheetInfo{width:70%;height:auto;margin-bottom: 30px;font-size: 16px;margin-top:20px;}
    
    .right_title{width:100%;height:50px;line-height: 50px;position: relative;text-align: center;font-size: 20px;border-bottom: 1px solid #d6d6d6;}
    .title_icon{width:35px;height:35px;position: absolute;left: 8px;top:8px;line-height: 35px;}
    .title_icon>img{width:28px;height: 28px;}

    .form_content_sheetInfo{width: 94%;min-height: 210px;align-content:flex-start;flex-direction: row;flex-wrap: wrap;margin-left: 3%;margin-top: 10px;}

    .form_item_sheetInfo{width: 100%;min-height:90px;}
    .form_item_sheetInfo>div{min-height:45px;line-height: 45px;outline: none;width: 97%;border-radius: 8px;}
    .item_input_sheetInfo{height:45px;padding-left:10px;outline: none;width: 100%;border-radius: 8px;}
    .item_area_sheetInfo{width:100%;min-height:80px;border-radius: 8px;resize:none;line-height:25px;font-size: 14px;outline: none;overflow: hidden;}
    .item_title_icon>img{height:25px;margin-left:5px;}
    .item_title_icon>img:hover{cursor: pointer;}

    .active{font-size: 18px;}    

    .dataBankAddBtn_journeyInfo{width:50px;height: 50px;position: absolute;right: 5px;top: 5px;}
    .dataBankAddBtn_journeyInfo:hover{cursor:pointer;}
    .dataBankAddBtn_journeyInfo>img{width:50px;height: 50px;}
	
    .editBox_sheetInfo{width: 760px;min-height:160px;background-color: #fff;border-radius: 15px;}
    .editBoxContent{width:90%;margin-left: 5%;margin-top:20px;flex-flow:row wrap;justify-content: center;align-items: center;}
    .issure{width:100%;height:50px;margin-top: 20px;margin-bottom: 20px;}
    .issure>button{width:60%;height:50px;margin-left: 20%;background-color: #ffde01;font-size: 16px;border-radius: 8px;border: none;outline: none;}

    .editBtnGroup{width:85%;height:50px;line-height: 50px;}
    .editBtnGroup>img{width:40px;height: 40px;margin-left: 25px;float: right;}

    .van-dialog{width:50%;}
</style>

<template>
	<div style="width:100%">
	    <div class="right_title">
		    <div class="title_icon" @click="$router.push('/study/dataBankStudySheet/'+sessionStorage.routeId)">
		        <img src="/etravel/public/images/back.png">
		    </div>
		    {{sheet.title}}
		</div>
		<div class="dataBank_input_form disflex">
		    <div class="pane_content_sheetInfo">
		        <div class="form_content_sheetInfo disflex" v-if="sheetInfos[0]" >
		        	<!-- <div class="form_item_sheetInfo">
		                <div class="item_title">标题</div>
		                <div><input class="item_input_sheetInfo" placeholder="标题" type="text" disabled="disabled" :value="sheet.title"></div>
		            </div>
                    <div class="form_item_sheetInfo">
                        <div class="item_title">内容</div>
                        <div style="border:1px solid #ccc;border-radius: 8px;background-color:#eeeeee" v-html="sheet.body"></div>
                    </div> -->
		            <div class="form_item_sheetInfo" v-for="(sheetInfo,index) in sheetInfos">
		                <div class="item_title">
		                    問題{{index+1}}
		                    <div class="fr item_title_icon">
		                    	<!-- <img @click="addNewSheetInfoShow()" src="/etravel/public/images/appointAdd.png"> -->
		                        <img @click="editSheetInfoShow(index)" src="/etravel/public/images/edit.png">
		                        <img @click="delSheetInfo(sheetInfo.id)" src="/etravel/public/images/dele.png">
		                    </div>
		                </div>
                        <div>
                            <textarea class="item_area_sheetInfo"  placeholder="内容" disabled="disabled" :value="sheetInfo.content"></textarea>
                        </div>
		            </div>
		        </div>
                <div class="form_content_sheetInfo" v-else>
                        暂未添加任何問題，请添加。
                    <div style="text-align:center;" >
                    </div>
                </div>
		    </div>
            <div class="dataBankAddBtn_journeyInfo" @click="addNewSheetInfoShow()">
                <img src="/etravel/public/images/add_y.png">
            </div>      
		</div>
		<van-popup v-model="isNewSheetInfoShow" :overlay="true">
            <div class="editBox_sheetInfo" >
                <div class="editBoxContent disflex">
                    <div class="form_item_sheetInfo">
		                <div class="item_title">問題</div>
                        <div>
                            <textarea class="item_area_sheetInfo"  placeholder="問題" v-model="newSheetInfo.content"></textarea>
                        </div>
		            </div>
                    <div class="issure">
                        <button @click="addNewSheetInfo()">添加</button>
                    </div>
                </div>
            </div>
        </van-popup>
        <van-popup v-model="isEditSheetInfoShow" :overlay="true">
            <div class="editBox_sheetInfo" >
                <div class="editBoxContent disflex">
                    <div class="form_item_sheetInfo">
		                <div class="item_title">問題</div>
                        <div>
                            <textarea class="item_area_sheetInfo"  placeholder="問題" v-model="edSheetInfo.content"></textarea>
                        </div>
		            </div>
                    <div class="issure">
                        <button @click="editSheetInfo()">修改</button>
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
            	sheet:'',
	        	sheetInfos:[],
	        	newSheetInfo:{
	        		content:'',
	        	},
	        	edSheetInfo:{
	        		id:'',
	        		content:'',
	        		index:'',
	        	},
	        	isNewSheetInfoShow:false,
	        	isEditSheetInfoShow:false,
            }
        },
        mounted:function(){
        	this.getSheetInfos();
        },
        methods:{
            getSheetInfos(){
                // 获取問題
                this.$ajax({
                    method: 'GET',
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    },
                    url: this.$config+'/api/routes/'+sessionStorage.routeId+'/studies/'+this.$route.params.id+'?include=questions',
                }).then(res => {
                    this.sheet=res.data;
                    this.sheetInfos=res.data.questions.data;
                    console.log(this.sheetInfos.length);
                }).catch(err => {
                    this.$toast('獲取失敗');
                    console.log(err);
                });
            },
            addNewSheetInfoShow(){
                this.isNewSheetInfoShow=true;
            },
            addNewSheetInfo(){
                // 新增問題
                this.$post(this.$config+'/api/studies/'+this.$route.params.id+'/questions',this.newSheetInfo,
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    // console.log(res.data);
                    this.$toast('添加成功');
                    this.getSheetInfos();
                    this.isNewSheetInfoShow=false;
                    this.newSheetInfo.content='';
                }).catch(err => {
                    if(err.response.data.errors){
                        for(var key in err.response.data.errors){
                            this.$toast(err.response.data.errors[key][0]);
                        }
                    }
                    this.$toast('添加失敗');
                    console.log(err)
                });
            },
            editSheetInfoShow(index){
                this.edSheetInfo.id=this.sheetInfos[index].id;
                this.edSheetInfo.content=this.sheetInfos[index].content;
                this.edSheetInfo.index=index;
                this.isEditSheetInfoShow=true;
            },
            editSheetInfo(){
                // 修改問題信息/api/route/2/questions/101
                this.$ajax({
                    method: 'PATCH',
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    },
                    data:{
                        content:this.edSheetInfo.content,
                    },
                    url: this.$config+'/api/studies/'+this.$route.params.id+'/questions/'+this.edSheetInfo.id,
                }).then(res => {
                    if(res.status==200){
                        this.sheetInfos[this.edSheetInfo.index].content=this.edSheetInfo.content;
                        this.$toast('修改成功');
                        this.isEditSheetInfoShow=false;    
                    }else{
                        this.$toast('修改失敗');
                    }
                }).catch(err => {
                    if(err.response.data.errors){
                        for(var key in err.response.data.errors){
                            this.$toast(err.response.data.errors[key][0]);
                        }
                    }
                    this.$toast('修改失敗');
                    console.log(err)
                });
            },
            delSheetInfo(sheetInfoId){
                // 删除問題
                this.$dialog.confirm({
                    title: '删除問題',
                    message: '是否删除该問題'
                }).then(() => {
                    this.$ajax({
                        method: 'DELETE',
                        headers: {
                            "Authorization": 'Bearer '+sessionStorage.token,
                        },
                        url: this.$config+'/api/studies/'+this.$route.params.id+'/questions/'+sheetInfoId,
                    }).then(res => {
                        // console.log(res);
                        if(res.status==204){
                            this.getSheetInfos();
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