<style>
    .dataBank_input_form{width: 100%;min-height:650px;justify-content: center;align-items:flex-start;font-size: 16px;}
    .tablist{width:100%;}
    .nav-tabs>li>a{color: #000;}
    .active{font-size: 18px;}        
    .tab-pane{width:70%;margin-left: 15%;}
    .back_icon{width:45px;height:45px;line-height: 45px;}
    .back_icon>img{width:28px;height: 28px;}

    .sheetGroup{width:100%;height:auto;margin:20px 0;border:2px solid #eee;}
    .sheetGroup>div{width:96%;margin-left: 3%;}
    .sheetTitle{height:45px;line-height: 45px;font-size: 18px;font-weight: bold;text-align: center;}
    .sheetContent{min-height:50px;}
    .sheetQuestion{height:auto;}
    .questTitle{width:100%;height:45px;line-height: 45px;font-size: 16px;font-weight: bold;}
    .questContent{width:100%;font-size: 14px;min-height:50px;line-height: 25px;word-break: break-all;}

    .sheetGroup{width:100%;height:auto;margin:20px 0;border:2px solid #eee;}
    .sheetGroup>div{width:96%;margin-left: 3%;}
    .feelTitle{font-size: 16px;font-weight: bold;height:45px;line-height: 45px;}
    .feelImg{height:auto;text-align: center;}
    .feelImg>img{width:70%;border:5px solid #fff;}
    .feelContent{min-height:50px;line-height: 25px;word-break: break-all;}
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
                    <div role="tabpanel" class="tab-pane active" id="gather">
                        <div class="sheetGroup" v-for="(sheetInfo,index) in sheetInfos">
                            <div class="sheetTitle" v-text="sheetInfo.title"></div>
                            <div class="sheetContent" v-html="sheetInfo.body"></div>
                            <template v-if="sheetInfo.questions.data">
                                <div class="sheetQuestion" v-for="(question,index) in sheetInfo.questions.data">
                                    <div class="questTitle">
                                        {{index+1}}.{{question.content}}
                                    </div> 
                                    <template v-if="question.answer">
                                        <div class="questContent">
                                            {{question.answer}}
                                        </div>
                                    </template>
                                    <template v-else>
                                        <div class="questContent" style="color: red;">
                                            暂无回答
                                        </div>  
                                    </template>
                                    
                                </div>
                            </template>
                            <template v-else>
                                <div class="sheetQuestion">
                                    未设置问题
                                </div>
                            </template>
                            
                        </div>
                    </div>

                    <!-- 自我评估 -->
                    <div role="tabpanel" class="tab-pane" id="flight">
                        <div class="sheetGroup">
                            <div class="answerTitle" v-text=''>
                                
                            </div> 
                            <div class="answerContent" v-html=''>
                                
                            </div>
                        </div>
                    </div>

                    <!-- 自我感想 -->
                    <div role="tabpanel" class="tab-pane" id="accommodationInfo">
                        <div class="sheetGroup">
                            <div class="feelTitle">
                                
                            </div>
                            <div class="feelImg">
                                <img src="/etravel/public/images/logo.png">
                            </div>
                            <div class="feelContent">
                                    
                            </div>    
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
            }
        },
        mounted:function(){
            this.getSheetInfos();
            // this.getEvaluations();
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
                    this.$toast('获取失败');
                    console.log(err);
                });
            },
            getEvaluations(){
                // 获取旅游下用户的自我评估
                this.$get(this.$config+'/api/travels/'+sessionStorage.actTravelId+'/flights',
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    // console.log(res.data);
                    this.evaluations=res.data.data;
                    
                }).catch(err => {
                    this.$toast('获取失败');
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
                    this.$toast('获取失败');
                    console.log(err);
                });

            },
        },
    }
</script>