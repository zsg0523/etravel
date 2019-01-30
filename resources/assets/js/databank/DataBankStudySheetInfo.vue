<style>
    .dataBank_input_form{width: 100%;min-height:650px;justify-content: center;align-items:flex-start;font-size: 16px;position: relative;}
    .pane_content_sheetInfo{width:70%;height:auto;margin-bottom: 30px;font-size: 16px;margin-top:20px;}
    
    .right_title{width:100%;height:50px;line-height: 50px;position: relative;text-align: center;font-size: 20px;border-bottom: 1px solid #d6d6d6;}
    .title_icon{width:35px;height:35px;position: absolute;left: 8px;top:8px;line-height: 35px;}
    .title_icon>img{width:28px;height: 28px;}

    .form_content_sheetInfo{width: 94%;min-height: 210px;align-content:flex-start;flex-direction: row;flex-wrap: wrap;margin-left: 3%;margin-top: 10px;}

    .form_item_sheetInfo{width: 100%;min-height:90px;}
    .form_item_sheetInfo>div{min-height:45px;line-height: 45px;padding-left:10px;outline: none;width: 97%;border-radius: 8px;}
    .item_input_sheetInfo{height:45px;padding-left:10px;outline: none;width: 100%;border-radius: 8px;}
    .item_area_sheetInfo{width:100%;min-height:80px;border-radius: 8px;resize:none;line-height:25px;font-size: 14px;outline: none;overflow: hidden;}
    .item_title_icon>img{height:25px;margin-left:5px;}
    .item_title_icon>img:hover{cursor: pointer;}

    .active{font-size: 18px;}    

	.dataBankAddBtn{width:50px;height: 50px;position: absolute;right: 5px;top: 50px;}
    .dataBankAddBtn:hover{cursor:pointer;}
    .dataBankAddBtn>img{width:50px;height: 50px;}
	
    .editBox_sheetInfo{width: 600px;min-height:160px;background-color: #fff;border-radius: 15px;}
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
		        <img src="../../images/back.png">
		    </div>
		    工作纸
		</div>
		<div class="dataBank_input_form disflex">
		    <div class="pane_content_sheetInfo">
		        <div class="form_content_sheetInfo disflex">
		        	<div class="form_item_sheetInfo">
		                <div class="item_title">标题</div>
		                <div><input class="item_input_sheetInfo" placeholder="标题" type="text" disabled="disabled" :value="sheet.title"></div>
		            </div>
                    <div class="form_item_sheetInfo">
                        <div class="item_title">内容</div>
                        <div>
                            <textarea class="item_area_sheetInfo"  placeholder="内容" disabled="disabled" :value="sheet.body"></textarea>
                        </div>
                    </div>
		            <div class="form_item_sheetInfo" v-for="(sheetInfo,index) in sheetInfos">
		                <div class="item_title">
		                    设置问题{{index+1}}
		                    <div class="fr item_title_icon">
		                    	<img @click="addNewSheetInfoShow()" src="../../images/appointAdd.png">
		                        <img @click="editSheetInfoShow(index)" src="../../images/edit.png">
		                        <img @click="delSheetInfo(sheetInfo.id)" src="../../images/dele.png">
		                    </div>
		                </div>
		                <div><input class="item_input_sheetInfo" type="text" disabled="disabled" :value="sheetInfo.content"></div>
		            </div>
		        </div>
		    </div>      
		</div>
		<van-popup v-model="isNewSheetInfoShow" :overlay="true" style="border-radius: 15px;">
            <div class="editBox_sheetInfo" >
                <div class="editBoxContent disflex">
                    <div class="form_item_sheetInfo">
		                <div class="item_title">问题</div>
		                <div><input class="item_input_sheetInfo" placeholder="问题" type="text" v-model="newSheetInfo.content"></div>
		            </div>
                    <div class="issure">
                        <button @click="addNewSheetInfo()">添加</button>
                    </div>
                </div>
            </div>
        </van-popup>
        <van-popup v-model="isEditSheetInfoShow" :overlay="true" style="border-radius: 15px;">
            <div class="editBox_sheetInfo" >
                <div class="editBoxContent disflex">
                    <div class="form_item_sheetInfo">
		                <div class="item_title">问题</div>
		                <div><input class="item_input_sheetInfo" placeholder="问题" type="text"  v-model="edSheetInfo.content"></div>
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
                // 获取问题
                this.$ajax({
                    method: 'GET',
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    },
                    url: '/api/routes/'+sessionStorage.routeId+'/studies/'+this.$route.params.id+'?include=questions',
                }).then(res => {
                    // console.log(res.data.questions.data);
                    this.sheet=res.data;
                    this.sheetInfos=res.data.questions.data;
                }).catch(err => {
                    this.$toast('获取失败');
                    console.log(err);
                });
            },
            addNewSheetInfoShow(){
                this.isNewSheetInfoShow=true;
            },
            addNewSheetInfo(){
                // 新增问题
                this.$post('/api/studies/'+this.$route.params.id+'/questions',this.newSheetInfo,
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
                    this.$toast('添加失败');
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
                // 修改问题信息/api/route/2/questions/101
                this.$ajax({
                    method: 'PATCH',
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    },
                    data:{
                        content:this.edSheetInfo.content,
                    },
                    url: '/api/studies/'+this.$route.params.id+'/questions/'+this.edSheetInfo.id,
                }).then(res => {
                    if(res.status==200){
                        this.sheetInfos[this.edSheetInfo.index].content=this.edSheetInfo.content;
                        this.$toast('修改成功');
                        this.isEditSheetInfoShow=false;    
                    }else{
                        this.$toast('修改失败');
                    }
                }).catch(err => {
                    this.$toast('修改失败');
                    console.log(err)
                });
            },
            delSheetInfo(sheetInfoId){
                // 删除问题
                this.$dialog.confirm({
                    title: '删除问题',
                    message: '是否删除该问题'
                }).then(() => {
                    this.$ajax({
                        method: 'DELETE',
                        headers: {
                            "Authorization": 'Bearer '+sessionStorage.token,
                        },
                        url: '/api/studies/'+this.$route.params.id+'/questions/'+sheetInfoId,
                    }).then(res => {
                        // console.log(res);
                        if(res.status==204){
                            this.getSheetInfos();
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