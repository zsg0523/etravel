<style>
    .dataBank_input_form{width: 100%;min-height:650px;justify-content: center;align-items:flex-start;font-size: 16px;position: relative;}
    .pane_content_evaluation{width:70%;height:auto;margin-bottom: 30px;font-size: 16px;margin-top:20px;}

    .form_content_evaluations{width: 94%;min-height: 110px;align-content:flex-start;flex-direction: row;flex-wrap: wrap;margin-left: 3%;}

    .form_item_evaluations{width: 100%;min-height:100px;}
    .form_item_evaluations>div{height: 45px;line-height: 45px;}
    .item_input{height:40px;padding-left:10px;outline: none;width: 90%;border-radius: 8px;}

    .input_icon{width: 100%;height: 50px;justify-content: flex-start;align-items:center;font-size: 18px;}
    .input_icon>input{width: 80%;height: 40px;border-radius: 8px;outline: none;padding-left:10px;}
    .input_icon>div{width: 80px;height: 45px;}
    .input_icon>div>img{width:40px;height: 40px;float: right;}
    .input_icon>div>img:hover{cursor: pointer;}
    .active{font-size: 18px;}   

    .dataBankAddBtn{width:50px;height: 50px;position: absolute;right: 5px;top: 5px;}
    .dataBankAddBtn:hover{cursor:pointer;}
    .dataBankAddBtn>img{width:50px;height: 50px;}
    
    .editBox{width: 760px;min-height:240px;background-color: #fff;border-radius: 15px;}
    .editBoxContent{width:90%;margin-left: 5%;margin-top:20px;flex-flow:row wrap;justify-content: center;align-items: center;}
    .issure{width:100%;height:50px;margin-top: 20px;margin-bottom: 20px;}
    .issure>button{width:60%;height:50px;margin-left: 20%;background-color: #ffde01;font-size: 16px;border-radius: 8px;border: none;outline: none;}

    .editBtnGroup_evaluations{width:80%;height:50px;line-height: 50px;}
    .editBtnGroup_evaluations>img{width:40px;height: 40px;margin-left: 25px;float: right;}

    .van-dialog{width:50%;}
</style>

<template>
    <div class="dataBank_input_form disflex" style="position:relative;">
        <div class="pane_content_evaluation" >
            <div class="form_content_evaluations disflex">
                <div class="form_item_evaluations" v-for="(evaluation,index) in evaluations">
                    <div class="item_title">題目標題</div>
                    <div class="input_icon disflex">
                        <input placeholder="請填寫題目標題" type="text" disabled="disabled"  :value="evaluation.title">
                        <div @click="$router.push('/topic/dataBankEvaluationInfo/'+evaluation.id)">
                            <img src="/etravel/public/images/See-next.png" alt="">
                        </div>
                    </div>
                    <div class="editBtnGroup_evaluations">
                        <img @click="delEvaluation(evaluation.id);" src="/etravel/public/images/rush-icon.png">
                        <img @click="editEvaluationShow(index);" src="/etravel/public/images/edit-all.png">
                    </div>
                </div>

            </div>
        </div>    
        <div class="dataBankAddBtn" @click="addNewEvaluationShow();">
            <img src="/etravel/public/images/add_y.png">
        </div>
        <van-popup v-model="isNewEvaluationShow" :overlay="true">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item_evaluations">
                        <div class="item_title">題目標題(必填)</div>
                        <div><input class="item_input" placeholder="請填寫題目標題" type="text" v-model="newEvaluation.title"></div>
                    </div>
                    <div class="issure">
                        <button @click="addNewEvaluation()">添加</button>
                    </div>
                </div>
            </div>
        </van-popup>
        <van-popup v-model="isEditevaluationShow" :overlay="true">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item_evaluations">
                        <div class="item_title">題目標題(必填)</div>
                        <div><input class="item_input" placeholder="請填寫題目標題" type="text" v-model="edEvaluation.title"></div>
                    </div>
                    <div class="issure">
                        <button @click="editEvaluation()">修改</button>
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
                evaluations:[],
                newEvaluation:{
                    title:'',
                },
                edEvaluation:{
                    title:'',
                    id:'',
                    index:'',
                },
                isNewEvaluationShow:false,
                isEditevaluationShow:false,
            }
        },
        mounted:function(){
            this.getEvaluations();
        },
        methods:{
            getEvaluations(){
                // 获取题目类型
                this.$ajax({
                    method: 'GET',
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    },
                    // url: this.$config+'/api/travels/'+sessionStorage.actTravelId+'/evaluations',api/travels/1/evaluationCategories?include=evaluations
                    url: this.$config+'/api/travels/'+sessionStorage.actTravelId+'/evaluationCategories?include=evaluations',
                }).then(res => {
                    // console.log(res.data);
                    this.evaluations=res.data.data;
                }).catch(err => {
                    this.$toast('獲取失敗');
                    console.log(err);
                });
            },
            addNewEvaluationShow(){
                this.isNewEvaluationShow=true;
            },
            addNewEvaluation(){
                // 新增题目类型
                this.$post(this.$config+'/api/travels/'+sessionStorage.actTravelId+'/evaluationCategories',
                this.newEvaluation,
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    // console.log(res.data);
                    this.$toast('添加成功');
                    this.isNewEvaluationShow=false;
                    this.getEvaluations();  
                    this.newEvaluation.title='';
                }).catch(err => {
                    if(err.response.data.errors){
                        for(var key in err.response.data.errors){
                            this.$toast(err.response.data.errors[key][0]);
                        }
                    }else{
                        this.$toast(err.response.data.message);
                    }
                    // this.$toast('添加失败');
                    console.log(err)
                });
            },
            editEvaluationShow(index){
                this.edEvaluation.id=this.evaluations[index].id;
                this.edEvaluation.title=this.evaluations[index].title;
                this.edEvaluation.index=index;
                this.isEditevaluationShow=true;
            },
            editEvaluation(){
                // 修改题目类型
                this.$ajax({
                    method: 'PATCH',
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    },
                    data:{
                        title:this.edEvaluation.title,
                    },
                    url: this.$config+'/api/travels/'+sessionStorage.actTravelId+'/evaluationCategories/'+this.edEvaluation.id,
                }).then(res => {
                    if(res.status==200){
                        this.evaluations[this.edEvaluation.index].title=this.edEvaluation.title;
                        this.$toast('修改成功');
                        this.isEditevaluationShow=false;    
                    }else{
                        this.$toast('修改失败');
                    }
                }).catch(err => {
                    if(err.response.data.errors){
                        for(var key in err.response.data.errors){
                            this.$toast(err.response.data.errors[key][0]);
                        }
                    }else{
                        this.$toast(err.response.data.message);
                    }
                    // this.$toast('修改失败');
                    console.log(err)
                });
            },
            delEvaluation(evaluationId){
                // 删除题目类型
                this.$dialog.confirm({
                    title: '删除题目类型',
                    message: '是否删除该题目类型',
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
                        url: this.$config+'/api/travels/'+sessionStorage.actTravelId+'/evaluationCategories/'+evaluationId,
                    }).then(res => {
                        // console.log(res);
                        if(res.status==204){
                            this.getEvaluations();
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