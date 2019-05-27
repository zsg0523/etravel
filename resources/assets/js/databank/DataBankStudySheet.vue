<style>
    .dataBank_input_form{width: 100%;min-height:650px;justify-content: center;align-items:flex-start;font-size: 16px;position: relative;}
    .pane_content_sheet{width:70%;height:auto;margin-bottom: 30px;font-size: 16px;margin-top:20px;}
    
    .right_title{width:100%;height:50px;line-height: 50px;position: relative;text-align: center;font-size: 20px;border-bottom: 1px solid #d6d6d6;}
    .title_icon{width:35px;height:35px;position: absolute;left: 8px;top:8px;line-height: 35px;}
    .title_icon>img{width:28px;height: 28px;}

    .form_content_sheet{width: 94%;min-height: 210px;align-content:flex-start;flex-direction: row;flex-wrap: wrap;margin-left: 3%;}

    .form_item_journeyInfo{width: 100%;min-height:80px;}
    .form_item_journeyInfo>div{width: 96%;min-height: 45px;line-height: 45px;}
    .item_input_journeyInfo{height:40px;padding-left:10px;outline: none;width: 97%;border-radius: 8px;}
    .item_area{width:97%;min-height:80px;border-radius: 8px;resize:none;line-height:25px;font-size: 14px;outline: none;overflow: hidden;}
    .toNext{width:30px;height: 30px;text-align: center;line-height: 30px;float: right;margin-right: 15px;margin-top: 13px;}
		
    .active{font-size: 18px;}     

	.dataBankAddBtn_journeyInfo{width:50px;height: 50px;position: absolute;right: 5px;top: 5px;}
    .dataBankAddBtn_journeyInfo:hover{cursor:pointer;}
    .dataBankAddBtn_journeyInfo>img{width:50px;height: 50px;}
	
    .editBox{width:760px;min-height:240px;background-color: #fff;border-radius: 15px;}
    .editBoxContent{width:90%;margin-left: 5%;margin-top:20px;flex-flow:row wrap;justify-content: center;align-items: center;}
    .issure{width:100%;height:50px;margin-top: 20px;margin-bottom: 20px;}
    .issure>button{width:60%;height:50px;margin-left:20%;background-color:#ffde01;font-size:16px;border-radius: 8px;border:none;outline:none;}

    .editBtnGroup_journeyInfo{width:94%;height:50px;line-height:50px;}
    .editBtnGroup_journeyInfo>img{width:40px;height:40px;margin-left:25px;float:right;}
	
    .van-dialog{width:50%;}
</style>

<template>
	<div style="width:100%;">
		<div class="right_title">
            <div class="title_icon" @click="$router.push('/study/dataBankStudy')">
                <img src="/etravel/public/images/back.png">
            </div>
			學習工作紙
        </div>
        <div class="dataBank_input_form disflex">
            <div class="pane_content_sheet">
                <div class="form_content_sheet disflex" v-for="(sheet,index) in sheets">
                    <div class="form_item_journeyInfo">
		                <div class="item_title">標題 <img class="toNext" @click="$router.push('/study/dataBankStudySheetInfo/'+sheet.id)" src="/etravel/public/images/See-next.png"></div>
		                <div><input class="item_input_journeyInfo" placeholder="標題" type="text" disabled="disabled"  :value="sheet.title"></div>
		            </div>
                    <div class="form_item_journeyInfo">
                        <div class="item_title">内容</div>
                        <div style="border:1px solid #ccc;border-radius: 8px;width:93%;background-color:#eeeeee;line-height:25px;" v-html="sheet.body"></div>
                        <!-- <div>
                            <textarea class="item_area" disabled="disabled" placeholder="内容" :value="sheet.body"></textarea>
                        </div> -->
                    </div>
                    <div class="editBtnGroup_journeyInfo">
		                <img @click="delSheet(sheet.id)" src="/etravel/public/images/rush-icon.png">
		                <img @click="editSheetShow(index)" src="/etravel/public/images/edit-all.png">
		            </div>
                </div>
            </div> 
            <div class="dataBankAddBtn_journeyInfo" @click="addNewSheetShow()">
	            <img src="/etravel/public/images/add_y.png">
	        </div>   
        </div>
        <van-popup v-model="isNewSheetShow" :overlay="true">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item_journeyInfo">
		                <div class="item_title">標題</div>
		                <div><input class="item_input_journeyInfo" placeholder="標題" type="text" v-model="newSheet.title"></div>
		            </div>
                    <div class="form_item_journeyInfo">
                        <div class="item_title">内容</div>
                        <div><Editor @catchData='catchData' :childData='newSheet.body'></Editor></div>
                    </div>
                    <div class="issure">
                        <button @click="addNewSheet()">添加</button>
                    </div>
                </div>
            </div>
        </van-popup>
        <van-popup v-model="isEditSheetShow" :overlay="true">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item_journeyInfo">
		                <div class="item_title">標題</div>
		                <div><input class="item_input_journeyInfo" placeholder="標題" type="text"  v-model="edSheet.title"></div>
		            </div>
                    <div class="form_item_journeyInfo">
                        <div class="item_title">内容</div>
                        <!-- <div>
                            <textarea class="item_area"  placeholder="内容" v-model="edSheet.body"></textarea>
                        </div> -->
                        <div><Editor @catchData='catchData' :childData='edSheet.body'></Editor></div>
                    </div>
                    <div class="issure">
                        <button @click="editSheet()">修改</button>
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
	        	sheets:[],
	        	newSheet:{
	        		title:'',
	        		body:'',
	        	},
	        	edSheet:{
	        		id:'',
	        		title:'',
	        		body:'',
	        		index:'',
	        	},
	        	isNewSheetShow:false,
	        	isEditSheetShow:false,
                status:'',
            }
        },
        mounted:function(){
        	this.getSheets();
        	sessionStorage.setItem('routeId', this.$route.params.id);
        },
        methods:{
            getSheets(){
                // 获取學習工作紙
                this.$ajax({
                    method: 'GET',
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    },
                    url: this.$config+'/api/routes/'+this.$route.params.id+'/studies',
                }).then(res => {
                    this.sheets=res.data.data;
                }).catch(err => {
                    this.$toast('獲取失敗');
                    console.log(err);
                });
            },
            addNewSheetShow(){
                this.isNewSheetShow=true;
                this.status='newSheet';
            },
            addNewSheet(){
                // 新增學習工作紙
                this.$post(this.$config+'/api/routes/'+this.$route.params.id+'/studies',this.newSheet,
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    // console.log(res.data);
                    this.$toast('添加成功');
                    this.getSheets();
                    this.isNewSheetShow=false;
                    this.newSheet.title='';
                    this.newSheet.body='';
                }).catch(err => {
                    this.$toast('添加失敗');
                    if(err.response.data.errors){
                        for(var key in err.response.data.errors){
                            this.$toast(err.response.data.errors[key][0]);
                        }
                    }
                    console.log(err)
                });
            },
            editSheetShow(index){
                this.edSheet.id=this.sheets[index].id;
                this.edSheet.title=this.sheets[index].title;
                this.edSheet.body=this.sheets[index].body;
                this.edSheet.index=index;
                this.isEditSheetShow=true;
                this.status='edSheet';
            },
            editSheet(){
                // 修改學習工作紙信息
                this.$ajax({
                    method: 'PATCH',
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    },
                    data:{
                        title:this.edSheet.title,
                        body:this.edSheet.body,
                    },
                    url: this.$config+'/api/routes/'+this.$route.params.id+'/studies/'+this.edSheet.id,
                }).then(res => {
                    if(res.status==200){
                        this.sheets[this.edSheet.index].title=this.edSheet.title;
                        this.sheets[this.edSheet.index].body=this.edSheet.body;
                        this.$toast('修改成功');
                        this.isEditSheetShow=false;    
                    }else{
                        this.$toast('修改失敗');
                    }
                }).catch(err => {
                    this.$toast('修改失敗');
                    if(err.response.data.errors){
                        for(var key in err.response.data.errors){
                            this.$toast(err.response.data.errors[key][0]);
                        }
                    }
                    console.log(err)
                });
            },
            delSheet(sheetId){
                // 删除學習工作紙
                this.$dialog.confirm({
                    title: '删除學習工作紙',
                    message: '是否删除该學習工作紙',
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
                        url: this.$config+'/api/routes/'+this.$route.params.id+'/studies/'+sheetId,
                    }).then(res => {
                        // console.log(res);
                        if(res.status==204){
                            this.getSheets();
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
            catchData(value){
                if(this.status=='newSheet'){
                    this.newSheet.body=value;
                }else if(this.status=='edSheet'){
                    this.edSheet.body=value;
                }
            },

        },
  	}
</script>