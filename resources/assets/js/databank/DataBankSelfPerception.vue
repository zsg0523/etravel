<style>
    .dataBank_input_form{width: 100%;min-height:650px;justify-content: center;align-items:flex-start;font-size: 16px;position: relative;}
    .pane_content_feel{width:70%;height:auto;margin-bottom: 30px;font-size: 16px;margin-top:20px;}
    
    .right_title{width:100%;height:50px;line-height: 50px;text-align: center;font-size: 20px;border-bottom: 1px solid #d6d6d6;}
    .form_content{width: 94%;min-height: 150px;align-content:flex-start;flex-direction: row;flex-wrap: wrap;margin-left: 3%;}

    .form_item_feel{width: 100%;min-height:100px;}
    .form_item_feel>div{width: 96%;min-height: 45px;}

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
            自我感想
        </div>
        <div class="dataBank_input_form disflex">
            <div class="pane_content_feel">
                <div class="form_content disflex" v-for="(feel,index) in feels">
                    <div class="form_item_feel">
                        <div class="item_title">感想{{index+1}}</div>
                        <div>
                            <textarea class="item_area" placeholder="感想" disabled="disabled" :value="feel.title" ></textarea>
                        </div>
                    </div>
                    <div class="editBtnGroup">
                        <img @click="delFeel(feel.id);" src="/etravel/public/images/rush-icon.png">
                        <img @click="editFeelShow(index);" src="/etravel/public/images/edit-all.png">
                    </div>
                </div>
                <div class="dataBankAddBtn" @click="addFeelShow();">
                    <img src="/etravel/public/images/add_y.png">
                </div>
            </div>       
        </div>
        <van-popup v-model="isAddFeelShow" :overlay="true" style="border-radius: 15px;">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item_feel">
                        <div class="item_title">感想</div>
                        <div>
                            <textarea class="item_area" placeholder="感想" v-model="newFeel.title"></textarea>
                        </div>
                    </div>
                    <div class="issure">
                        <button @click="addFeel()">添加</button>
                    </div>
                </div>
            </div>
        </van-popup>
        <van-popup v-model="isEditFeelShow" :overlay="true" style="border-radius: 15px;">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item_feel">
                        <div class="item_title">感想</div>
                        <div>
                            <textarea class="item_area" placeholder="感想" v-model="edFeel.title"></textarea>
                        </div>
                    </div>
                    <div class="issure">
                        <button @click="editFeel()">修改</button>
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
            feels:[],
            newFeel:{
                title:'',
            },
            edFeel:{
                id:'',
                title:'',
                index:'',
            },
            isAddFeelShow:false,
            isEditFeelShow:false,
        }
    },
    mounted:function(){
        this.getFeels();
    },
    methods:{
        getFeels(){
            // 获取感想
            this.$ajax({
                method: 'GET',
                headers: {
                    "Authorization": 'Bearer '+sessionStorage.token,
                },
                params:{
                    type:20,
                },
                url: this.$config+'/api/titles/',
            }).then(res => {
                // console.log(res.data);
                this.feels=res.data.data;
            }).catch(err => {
                this.$toast('获取失败');
                console.log(err);
            });
        },
        addFeelShow(){
             this.isAddFeelShow=true;
        },
        addFeel(){
            // 新增感想
            this.$post(this.$config+'/api/titles/',this.newFeel,
            {
                headers: {
                    "Authorization": 'Bearer '+sessionStorage.token,
                }
            }).then(res => {
                // console.log(res.data);
                this.$toast('添加成功');
                this.getFeels();
                this.isAddFeelShow=false;
                this.newFeel.title='';
            }).catch(err => {
                this.$toast('添加失败');
                console.log(err)
            });
        },
        editFeelShow(index){
            this.edFeel.id=this.feels[index].id;
            this.edFeel.title=this.feels[index].title;
            this.edFeel.index=index;
            this.isEditFeelShow=true;
        },
        editFeel(){
            // 修改感想信息
            this.$ajax({
                method: 'PATCH',
                headers: {
                    "Authorization": 'Bearer '+sessionStorage.token,
                },
                data:{
                    title:this.edFeel.title,
                },
                url: this.$config+'/api/titles/'+this.edFeel.id,
            }).then(res => {
                if(res.status==200){
                    this.feels[this.edFeel.index].title=this.edFeel.title;
                    this.$toast('修改成功');
                    this.isEditFeelShow=false;    
                }else{
                    this.$toast('修改失败');
                }
            }).catch(err => {
                this.$toast('修改失败');
                console.log(err)
            });
        },
        delFeel(feelId){
             // 删除感想
            this.$dialog.confirm({
                title: '删除感想',
                message: '是否删除该感想'
            }).then(() => {
                this.$ajax({
                    method: 'DELETE',
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    },
                    url: this.$config+'/api/titles/'+feelId,
                }).then(res => {
                    // console.log(res);
                    if(res.status==204){
                        this.getFeels();
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
        }
    }
  }
</script>