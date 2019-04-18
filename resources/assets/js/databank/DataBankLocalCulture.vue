<style>
    .dataBank_input_form{width: 100%;min-height:650px;justify-content: center;align-items:flex-start;font-size: 16px;position: relative;}
    .pane_content_localculture{width:70%;height:auto;margin-bottom: 30px;font-size: 16px;margin-top:20px;}
    
    .right_title{width:100%;height:50px;line-height: 50px;position: relative;text-align: center;font-size: 20px;border-bottom: 1px solid #d6d6d6;}
    .title_icon{width:35px;height:35px;position: absolute;left: 8px;top:8px;line-height: 35px;}
    .title_icon>img{width:28px;height: 28px;}

    .form_content{width: 94%;min-height: 210px;align-content:flex-start;flex-direction: row;flex-wrap: wrap;margin-left: 3%;margin-top: 10px;}

    .form_item_journeyInfo{width: 100%;min-height:80px;}
    .form_item_journeyInfo>div{width: 100%;min-height: 45px;line-height: 45px;}
    .item_input_journeyInfo{height:40px;padding-left:10px;outline: none;width: 97%;border-radius: 8px;}
    .item_area{width:97%;min-height:80px;border-radius: 8px;resize:none;line-height:25px;font-size: 14px;outline: none;overflow: hidden;}

    .active{font-size: 18px;}     

    .dataBankAddBtn_journeyInfo{width:50px;height: 50px;position: absolute;right: 5px;top: 5px;}
    .dataBankAddBtn_journeyInfo:hover{cursor:pointer;}
    .dataBankAddBtn_journeyInfo>img{width:50px;height: 50px;}
    
    .editBox{width: 760px;min-height:240px;background-color: #fff;border-radius: 15px;}
    .editBoxContent{width:90%;margin-left: 5%;margin-top:20px;flex-flow:row wrap;justify-content: center;align-items: center;}
    .issure{width:100%;height:50px;margin-top: 20px;margin-bottom: 20px;}
    .issure>button{width:60%;height:50px;margin-left: 20%;background-color: #ffde01;font-size: 16px;border-radius: 8px;border: none;outline: none;}

    .editBtnGroup_journeyInfo{width:94%;height:50px;line-height: 50px;}
    .editBtnGroup_journeyInfo>img{width:40px;height: 40px;margin-left: 25px;float: right;}

    .van-dialog{width:50%;}
</style>

<template>
    <div style="width:100%;">
        <div class="dataBank_input_form disflex">
            <div class="pane_content_localculture">
                <div class="form_content disflex" v-for="(local,index) in locals">
                    <div class="form_item_journeyInfo">
                        <div class="item_title">标题</div>
                        <div><input class="item_input_journeyInfo" placeholder="标题" type="text" disabled="disabled"  :value="local.title"></div>
                    </div>
                    <!-- <div class="form_item_journeyInfo">
                        <div class="item_title">地点</div>
                        <div>
                            <input class="item_input_journeyInfo" placeholder="地点" type="text" disabled="disabled"  :value="local.sites">
                        </div>
                    </div> -->
                    <!-- <div class="form_item_journeyInfo">
                        <div class="item_title">内容</div>
                        <div><textarea class="item_area" disabled="disabled" placeholder="内容" :value="local.content"></textarea></div>
                    </div> -->
                    <div class="form_item_journeyInfo">
                        <div class="item_title">内容</div>
                        <div style="border:1px solid #ccc;border-radius: 8px;width:97%;background-color:#eeeeee;line-height:25px;" v-html="local.content"></div>
                    </div>
                    <div class="editBtnGroup_journeyInfo">
                        <img @click="delLocal(local.id)" src="/etravel/public/images/rush-icon.png">
                        <img @click="editLocalShow(index)" src="/etravel/public/images/edit-all.png">
                    </div>
                </div>
            </div> 
            <div class="dataBankAddBtn_journeyInfo" @click="addNewLocalShow()">
                <img src="/etravel/public/images/add_y.png">
            </div>   
        </div>
        <van-popup v-model="isNewLocalShow" :overlay="true" style="border-radius: 15px;">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item_journeyInfo">
                        <div class="item_title">标题</div>
                        <div><input class="item_input_journeyInfo" placeholder="标题" type="text" v-model="newLocal.title"></div>
                    </div>
                    <!-- <div class="form_item_journeyInfo">
                        <div class="item_title">地点</div>
                        <div>
                            <input class="item_input_journeyInfo" placeholder="地点" type="text" v-model="newLocal.sites">
                        </div>
                    </div> -->
                    <!-- <div class="form_item_journeyInfo">
                        <div class="item_title">内容</div>
                        <div><textarea class="item_area" placeholder="内容" v-model="newLocal.content"></textarea></div>
                    </div> -->
                    <div class="form_item_journeyInfo">
                        <div class="item_title">内容</div>
                        <div><Editor @catchData='catchData' :childData='newLocal.content' v-model='newLocal.content'></Editor></div>
                    </div>
                    <div class="issure">
                        <button @click="addNewLocal()">添加</button>
                    </div>
                </div>
            </div>
        </van-popup>
        <van-popup v-model="isEditLocalShow" :overlay="true" style="border-radius: 15px;">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item_journeyInfo">
                        <div class="item_title">标题</div>
                        <div><input class="item_input_journeyInfo" placeholder="标题" type="text"  v-model="edLocal.title"></div>
                    </div>
                    <!-- <div class="form_item_journeyInfo">
                        <div class="item_title">地点</div>
                        <div>
                            <input class="item_input_journeyInfo" placeholder="地点" type="text" v-model="edLocal.sites">
                        </div>
                    </div> -->
                    <!-- <div class="form_item_journeyInfo">
                        <div class="item_title">内容</div>
                        <div><textarea class="item_area" placeholder="内容" v-model="edLocal.content"></textarea></div>
                    </div> -->
                    <div class="form_item_journeyInfo">
                        <div class="item_title">内容</div>
                        <div><Editor @catchData='catchData' :childData='edLocal.content'></Editor></div>
                    </div>
                    <div class="issure">
                        <button @click="editLocal()">修改</button>
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
                locals:[],
                newLocal:{
                    title:'',
                    content:'',
                    // sites:'',
                },
                edLocal:{
                    id:'',
                    title:'',
                    content:'',
                    // sites:'',
                    index:'',
                },
                isNewLocalShow:false,
                isEditLocalShow:false,
                status:'',
            }
        },
        mounted:function(){
            this.getLocals();
        },
        methods:{
            getLocals(){
                // 获取当地文化/api/travels/1/locals
                this.$ajax({
                    method: 'GET',
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    },
                    url: this.$config+'/api/travels/'+sessionStorage.actTravelId+'/locals',
                }).then(res => {
                    this.locals=res.data.data;
                }).catch(err => {
                    this.$toast('获取失败');
                    console.log(err);
                });
            },
            addNewLocalShow(){
                this.isNewLocalShow=true;
                this.status='newLocal';
            },
            addNewLocal(){
                // 新增当地文化/api/route/21/food
                this.$post(this.$config+'/api/travels/'+sessionStorage.actTravelId+'/locals',this.newLocal,
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    // console.log(res.data);
                    this.$toast('添加成功');
                    this.getLocals();
                    this.isNewLocalShow=false;
                    this.newLocal.title='';
                    this.newLocal.content='';
                    // this.newLocal.sites='';
                }).catch(err => {
                    this.$toast('添加失败');
                    console.log(err)
                });
            },
            editLocalShow(index){
                this.edLocal.id=this.locals[index].id;
                this.edLocal.title=this.locals[index].title;
                this.edLocal.content=this.locals[index].content;
                // this.edLocal.sites=this.locals[index].sites;
                this.edLocal.index=index;
                this.isEditLocalShow=true;
                this.status='edLocal';
            },
            editLocal(){
                // 修改当地文化信息/api/travels/1/locals/22
                this.$ajax({
                    method: 'PATCH',
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    },
                    data:{
                        title:this.edLocal.title,
                        content:this.edLocal.content,
                        // sites:this.edLocal.sites,
                    },
                    url: this.$config+'/api/travels/'+sessionStorage.actTravelId+'/locals/'+this.edLocal.id,
                }).then(res => {
                    if(res.status==200){
                        this.locals[this.edLocal.index].title=this.edLocal.title;
                        this.locals[this.edLocal.index].content=this.edLocal.content;
                        // this.locals[this.edLocal.index].sites=this.edLocal.sites;
                        this.$toast('修改成功');
                        this.isEditLocalShow=false;    
                    }else{
                        this.$toast('修改失败');
                    }
                }).catch(err => {
                    this.$toast('修改失败');
                    console.log(err)
                });
            },
            delLocal(localId){
                // 删除当地文化
                this.$dialog.confirm({
                    title: '删除当地文化',
                    message: '是否删除该当地文化'
                }).then(() => {
                    this.$ajax({
                        method: 'DELETE',
                        headers: {
                            "Authorization": 'Bearer '+sessionStorage.token,
                        },
                        url: this.$config+'/api/travels/'+sessionStorage.actTravelId+'/locals/'+localId,
                    }).then(res => {
                        // console.log(res);
                        if(res.status==204){
                            this.getLocals();
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
            catchData(value){
                if(this.status=='newLocal'){
                    this.newLocal.content=value;
                }else if(this.status=='edLocal'){
                    this.edLocal.content=value;
                }
            },
        },
    }
</script>