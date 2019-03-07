<style>
    .dataBank_input_form{width: 100%;min-height:650px;justify-content: center;align-items:flex-start;font-size: 16px;}
    .tablist{width:100%;}
    .nav-tabs>li>a{color: #000;}
    .active{font-size: 18px;}        
    .tab-pane{width:70%;margin-left: 15%;}
    .back_icon{width:45px;height:45px;line-height: 45px;}
    .back_icon>img{width:28px;height: 28px;}

    .sheetGroup{width:100%;height:auto;}
    .sheetTitle{width:100%;height:45px;line-height: 45px;font-size: 16px;font-weight: bold;}
    .sheetContent{width:100%;min-height:50px;}
    .sheetQuestion{width:100%;height:auto;}
    .questTitle{width:100%;height:45px;line-height: 45px;font-size: 16px;}
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
                        <div class="sheetGroup">
                            <div class="sheetTitle"></div>
                            <div class="sheetContent"></div>
                            <div class="sheetQuestion">
                                <div class="questTitle">
    
                                </div> 
                                <div class="questContent">
                                
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <!-- 航班往返 -->
                    <div role="tabpanel" class="tab-pane" id="flight">
                        <div class="sheetGroup">
                            <div class="answerTitle" v-text=''>
                                
                            </div> 
                            <div class="answerContent" v-html=''>
                                
                            </div>
                        </div>
                    </div>

                    <!-- 住宿资料 -->
                    <div role="tabpanel" class="tab-pane" id="accommodationInfo">
                        <div class="pane_content_info" v-for="(hotel,index) in hotels">    
                            
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
                flights:[],
                hotels:[],
            }
        },
        mounted:function(){
            // this.getAssemblePlaces();
            // this.getFlights();
            // this.getHotels();
          
        },
        methods:{
            getAssemblePlaces(){
                // 获取旅游的集合信息
                this.$get(this.$config+'/api/travels/'+sessionStorage.actTravelId,
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    // console.log(res.data);
                    this.assemblePlaces=res.data;
                    this.edAssemblePlaces.assembly_at=this.assemblePlaces.assembly_at;
                    this.edAssemblePlaces.assembly_station=this.assemblePlaces.assembly_station;
                    this.edAssemblePlaces.dissolution_at=this.assemblePlaces.dissolution_at;
                    this.edAssemblePlaces.dissolution_station=this.assemblePlaces.dissolution_station;

                }).catch(err => {
                    this.$toast('获取失败');
                    console.log(err);
                });
            },
            getFlights(){
                // 获取旅游的航班信息
                this.$get(this.$config+'/api/travels/'+sessionStorage.actTravelId+'/flights',
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    // console.log(res.data);
                    this.flights=res.data.data;
                    
                }).catch(err => {
                    this.$toast('获取失败');
                    console.log(err);
                });

            },
            getHotels(){
                // 获取旅游的住宿酒店
                this.$get(this.$config+'/api/travels/'+sessionStorage.actTravelId+'/hotels',
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    // console.log(res.data);
                    this.hotels=res.data.data;
                    
                }).catch(err => {
                    this.$toast('获取失败');
                    console.log(err);
                });

            },
        },
    }
</script>