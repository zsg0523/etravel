<style>
    .dataBank_input_form{width: 100%;min-height:650px;justify-content: center;align-items:flex-start;font-size: 16px;}
    .tablist{width:100%;}
    .nav-tabs>li>a{color: #000;}
    .active{font-size: 18px;}        
    .tab-pane{}
    .pane-answer{width:70%;margin-left: 15%;}
    .back_icon{width:45px;height:45px;line-height: 45px;}
    .back_icon>img{width:28px;height: 28px;}

    .sheetGroup{width:100%;height:auto;margin:20px 0;border:2px solid #eee;}
    .sheetGroup>div{width:100%;text-indent: 1em;}
    .sheetTitle{min-height:45px;line-height: 45px;font-size: 18px;font-weight: bold;text-align: center;}
    .sheetContent{min-height:50px;}
    .sheetQuestion{height:auto;}
    .questTitle{width:100%;min-height:45px;line-height: 45px;font-size: 16px;font-weight: bold;}
    .questContent{width:100%;font-size: 14px;min-height:50px;line-height: 25px;word-break: break-all;}

    .feelTitle{font-size: 16px;font-weight: bold;min-height:45px;line-height: 45px;}
    .feelImg{height:auto;text-align: center;}
    .feelImg>img{width:70%;border:5px solid #fff;}
    .feelContent{min-height:50px;font-size: 14px;line-height: 25px;word-break: break-all;}

    .evaluationGroup{width:100%;height:auto;margin:20px 0;border:2px solid #eee;border-radius-top-left:8px;border-top-right-radius: 8px;}
    .evaluationTitle{width:100%;height:45px;font-size: 18px;line-height: 45px;background-color: #ffde01;font-weight:bold;border-radius-top-left:8px;border-top-right-radius: 8px;}
    .evaluationQuestions{min-height: 90px;}
    .evaluationQuestionTitle{width:100%;min-height: 45px;line-height:45px;background-color: #eee;font-size: 16px;}
    .evaluationQuestionContent{width:100%;height:45px;line-height: 45px;}
    .menuIcon{width:80px;height:45px;float: left;line-height: 45px;margin-left: 10px;}
    .menuIcon>img{width:20px;height:20px;}
</style>

<template>
    <div style="width:100%;">
        <div class="dataBank_input_form disflex">
            <div class="tablist">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" style="width:50px;height:45px;">
                        <div class="back_icon" @click="$router.push('/answer/dataBankAnswerList')">
                            <img src="/etravel/public/images/back.png">
                        </div>
                    </li>
                    <li role="presentation" class="active"><a href="#gather" aria-controls="gather" role="tab" data-toggle="tab">學習工作紙</a></li>
                    <li role="presentation"><a href="#flight" aria-controls="flight" role="tab" data-toggle="tab">自我評估</a></li>
                    <li role="presentation"><a href="#accommodationInfo" aria-controls="accommodationInfo" role="tab" data-toggle="tab">自我感想</a></li>
                </ul>
                <div class="tab-content">
                    <!-- 學習工作紙 -->
                    <div role="tabpanel" class="tab-pane pane-answer active" id="gather">
                        <div class="sheetGroup" v-for="(sheetInfo,index) in sheetInfos">
                            <div class="sheetTitle" v-text="sheetInfo.title"></div>
                            <!-- <div class="sheetContent" v-html="sheetInfo.body"></div> -->
                            <template v-if="sheetInfo.questions.data">
                                <div class="sheetQuestion" v-for="(question,index) in sheetInfo.questions.data">
                                    <div class="questTitle">
                                        {{index+1}}.{{question.content}}
                                    </div> 
                                    <template v-if="question.answer">
                                        <div class="questContent">
                                            {{question.answer.content}}
                                        </div>
                                    </template>
                                    <template v-else>
                                        <div class="questContent" style="color: red;">
                                            暫無回答
                                        </div>  
                                    </template>
                                    
                                </div>
                            </template>
                            <template v-else>
                                <div class="sheetQuestion">
                                    未設定問題
                                </div>
                            </template>
                            
                        </div>
                    </div>

                    <!-- 自我评估 -->
                    <div role="tabpanel" class="tab-pane pane-answer" id="flight">
                        <div class="sheetGroup" v-for="(evaluation,index) in evaluations">
                            <div class="evaluationTitle">
                                {{evaluation.title}}
                            </div>
                            <template v-if="evaluation.evaluations.data[0]">
                                <div class="evaluationQuestions" v-for="(question,index) in evaluation.evaluations.data">
                                    <div class="evaluationQuestionTitle">
                                        {{index+1}}.{{question.content}}
                                    </div>
                                    <div class="evaluationQuestionContent" v-if="question.type==1">
                                        <div class="menuIcon">
                                            <template v-if="question.answer.option==1">
                                                <img src="/etravel/public/images/Options_sele.png">       
                                            </template>
                                            <template v-else>
                                                <img src="/etravel/public/images/Options.png">
                                            </template>
                                        </div>
                                    </div>
                                    <div class="evaluationQuestionContent" v-else-if="question.type==2">
                                        <div class="evaluationQuestionContent">
                                            <div class="menuIcon">
                                                <template v-if="question.answer.option==1">
                                                    <img src="/etravel/public/images/Options_sele.png">YES     
                                                </template>
                                                <template v-else>
                                                    <img src="/etravel/public/images/Options.png">YES
                                                </template>
                                            </div>
                                            <div class="menuIcon">
                                                <template v-if="question.answer.option==2">
                                                    <img src="/etravel/public/images/Options_sele.png">NO       
                                                </template>
                                                <template v-else>
                                                    <img src="/etravel/public/images/Options.png">NO
                                                </template>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="evaluationQuestionContent" v-else-if="question.type==3">
                                        <div class="menuIcon" v-for="(typeLink,index) in type3">
                                            <template v-if="question.answer.option==(index+1)">
                                                <img src="/etravel/public/images/Options_sele.png">       
                                            </template>
                                            <template v-else>
                                                <img :src="typeLink">
                                            </template>
                                        </div>
                                    </div>
                                </div>
                            </template>
                            <template v-else>
                                <div class="evaluationQuestions">
                                    <h4>暫無題目</h4>
                                </div>
                            </template>
                        </div>
                    </div>

                    <!-- 自我感想 -->
                    <div role="tabpanel" class="tab-pane pane-answer" id="accommodationInfo">
                        <div class="sheetGroup" v-for="(perception,index) in perceptions">
                            <div class="feelTitle">
                                {{index+1}}.{{perception.title}}
                            </div>
                            <template v-if="perception.writes.data[0]">
                                <div class="feelImg" v-if="perception.writes.data[0].image">
                                    <img :src="perception.writes.data[0].image">
                                </div>
                                <div class="feelImg" v-else>
                                    <h4>未上傳圖片</h4>
                                </div> 
                                <div class="feelContent" v-if="perception.writes.data[0].content">
                                    {{perception.writes.data[0].content}}
                                </div>
                                <div class="feelContent" v-else style="color: red;">
                                    暫無回答
                                </div>  
                            </template>
                            <template v-else>
                                <div class="feelImg">
                                    <h4>未上傳圖片</h4>
                                </div> 
                                <div class="feelContent" style="color: red;">
                                    暫無回答
                                </div>  
                            </template>
                        </div>
                    </div>


                </div>
            </div>             
            
        </div>
    </div>
	
    
</template>
<script>
	export default {
        data() {
            return {
                sheetInfos:[],
                evaluations:[],
                perceptions:[],
                type3:[
                    "/etravel/public/images/1.png",
                    "/etravel/public/images/2.png",
                    "/etravel/public/images/3.png",
                    "/etravel/public/images/4.png",
                    "/etravel/public/images/5.png"],
            }
        },
        mounted:function(){
            this.getSheetInfos();
            this.getEvaluations();
            this.getPerceptions();
        },
        methods:{
            getSheetInfos(){
                // 获取旅游下用户的学习工作纸/api/travels/:travel/users/:user/studies?include=questions
                this.$get(this.$config+'/api/travels/'+sessionStorage.actTravelId+'/users/'+this.$route.params.id+'/studies?include=questions',
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    // console.log(res.data);
                    this.sheetInfos=res.data.data;
                }).catch(err => {
                    if(err.response.data.errors){
                        for(var key in err.response.data.errors){
                            this.$toast(err.response.data.errors[key][0]);
                        }
                    }
                    this.$toast('獲取失敗');
                    console.log(err);
                });
            },
            getEvaluations(){
                // 获取旅游下用户的自我评估/api/travels/:travels/users/:user/evaluationCategories?include=evaluations
                this.$get(this.$config+'/api/travels/'+sessionStorage.actTravelId+'/users/'+this.$route.params.id+'/evaluationCategories?include=evaluations',
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    // console.log(res.data);
                    this.evaluations=res.data.data;
                    
                }).catch(err => {
                    if(err.response.data.errors){
                        for(var key in err.response.data.errors){
                            this.$toast(err.response.data.errors[key][0]);
                        }
                    }
                    this.$toast('獲取失敗');
                    console.log(err);
                });

            },
            getPerceptions(){
                // 获取旅游下用户的自我感想/api/travels/:travel/users/:user/titles?include=writes
                this.$get(this.$config+'/api/travels/'+sessionStorage.actTravelId+'/users/'+this.$route.params.id+'/titles?include=writes',
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    // console.log(res.data);
                    this.perceptions=res.data.data;
                    
                }).catch(err => {
                    if(err.response.data.errors){
                        for(var key in err.response.data.errors){
                            this.$toast(err.response.data.errors[key][0]);
                        }
                    }
                    this.$toast('獲取失敗');
                    console.log(err);
                });

            },
        },
    }
</script>