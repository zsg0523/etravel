<style>
    .dataBank_input_form{width: 100%;min-height:650px;justify-content: center;align-items:flex-start;font-size: 16px;}
    .tablist{width:100%;}
    .nav-tabs>li>a{color: #000;}
    .tab-pane{position: relative;}
    .pane_content{width:70%;margin-left: 15%;height:auto;margin-bottom: 30px;font-size: 16px;}
    .gather_info{width:100%;height: auto;}
    .gather_info_title{width:100%;height:50px;position: relative;}
    .gather_info_title>span{width:60px;height:50px;display: block;line-height: 50px;left: 0;position: absolute; background-color:#fff;z-index: 2}
    .gather_info_title>hr{width:94%;height:2px;background-color:#ffde01;z-index: 1;left: 0;position: absolute;} 
    .form_content{width: 100%;min-height: 100px;align-content:flex-start;flex-direction: row;flex-wrap: wrap;}
    .form_item{width: 50%;height:100px;}
    .form_item>div{width: 96%;height: 45px;line-height: 45px;}
    .item_input{height:40px;padding-left:10px;outline: none;width: 90%;border-radius: 8px;}
    .input2{width:30%;height:40px;padding-left:10px;outline: none;border-radius: 8px;}
    .item_area{width:97%;height:80px;border-radius: 8px;resize:none;line-height:25px;font-size: 14px;outline: none;overflow: hidden;background-color: #eee;}
    .active{font-size: 18px;}        
    .dataBankAddBtn{width:50px;height: 50px;position: absolute;right: 50px;top: 50px;}
    .dataBankAddBtn:hover{cursor:pointer;}
    .dataBankAddBtn>img{width:50px;height: 50px;}

</style>

<template>
    <div style="width:100%;">
        <div class="dataBank_input_form disflex">
            <div class="tablist">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#gather" aria-controls="gather" role="tab" data-toggle="tab">集合解散</a></li>
                    <li role="presentation"><a href="#flight" aria-controls="flight" role="tab" data-toggle="tab">航班往返</a></li>
                    <li role="presentation"><a href="#accommodationInfo" aria-controls="accommodationInfo" role="tab" data-toggle="tab">住宿资料</a></li>
                    <li role="presentation"><a href="#leaderTeacher" aria-controls="leaderTeacher" role="tab" data-toggle="tab">领队老师</a></li>
                    <li role="presentation"><a href="#heavyWeather" aria-controls="heavyWeather" role="tab" data-toggle="tab">恶劣天气安排</a></li>
                </ul>
                <div class="tab-content">
                    <!-- 集合解散 -->
                    <div role="tabpanel" class="tab-pane active" id="gather">
                        <div class="pane_content">
                            <div class="gather_info">
                                <div class="gather_info_title"><span>集合</span><hr></div>
                            </div>    
                            <div class="form_content disflex">
                                <!-- <div class="form_item">
                                    <div class="item_title">第几天</div>
                                    <div><input class="item_input" placeholder="第几天" type="text" name=""></div>
                                </div> -->
                                <div class="form_item">
                                    <div class="item_title">日期</div>
                                    <div><input class="item_input" placeholder="日期" type="text" v-model="assemblePlaces.assembly_at"></div>
                                </div>
                                <!-- <div class="form_item">
                                    <div class="item_title">时间点</div>
                                    <div>
                                        <input type="text" class="input2 fl" name="">
                                        <div class="fl" style="width:20%;text-align:center;">至</div>
                                        <input type="text" class="input2 fl" name="">
                                    </div>
                                </div> -->
                                <div class="form_item" style="width:100%;height:120px;">
                                    <div class="item_title">详细地址</div>
                                    <div>
                                        <textarea class="item_area" placeholder="详细地址" v-model="assemblePlaces.assembly_station"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pane_content">
                            <div class="gather_info">
                                <div class="gather_info_title"><span>解散</span><hr></div>
                            </div>    
                            <div class="form_content disflex">
                                <!-- <div class="form_item">
                                    <div class="item_title">第几天</div>
                                    <div><input class="item_input"  placeholder="第几天" type="text" name=""></div>
                                </div> -->
                                <div class="form_item">
                                    <div class="item_title">日期</div>
                                    <div><input class="item_input"  placeholder="日期" type="text" v-model="assemblePlaces.dissolution_at"></div>
                                </div>
                                <!-- <div class="form_item">
                                    <div class="item_title">时间点</div>
                                    <div>
                                        <input type="text" class="input2 fl" name="">
                                        <div class="fl" style="width:20%;text-align:center;">至</div>
                                        <input type="text" class="input2 fl" name="">
                                    </div>
                                </div> -->
                                <div class="form_item" style="width:100%;height:120px;">
                                    <div class="item_title">地址</div>
                                    <div>
                                        <textarea class="item_area" placeholder="详细地址" v-model="assemblePlaces.dissolution_station"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- 航班往返 -->
                    <div role="tabpanel" class="tab-pane" id="flight">
                        <div class="pane_content">
                            <div class="gather_info">
                                <div class="gather_info_title"><span>出发</span><hr></div>
                            </div>    
                            <div class="form_content disflex">
                                <div class="form_item">
                                    <div class="item_title">出行工具信息(飞机/高铁/汽车/轮船)</div>
                                    <div><input class="item_input" type="text" name=""></div>
                                </div> 
                                <div class="form_item">
                                    <div class="item_title">日期</div>
                                    <div><input class="item_input" type="text" name=""></div>
                                </div>
                                <div class="form_item">
                                    <div class="item_title">出发时间</div>
                                    <div>
                                        <input type="text" class="input2 fl" name="">
                                        <div class="fl" style="width:20%;text-align:center;">区域</div>
                                        <input type="text" class="input2 fl" name="">
                                    </div>
                                </div>
                                <div class="form_item">
                                    <div class="item_title">到达时间</div>
                                    <div>
                                        <input type="text" class="input2 fl" name="">
                                        <div class="fl" style="width:20%;text-align:center;">区域</div>
                                        <input type="text" class="input2 fl" name="">
                                    </div>
                                </div>
                                <div class="form_item">
                                    <div class="item_title">出发站点</div>
                                    <div>
                                        <div><input class="item_input" type="text" name=""></div>
                                    </div>
                                </div>
                                <div class="form_item">
                                    <div class="item_title">达到站点</div>
                                    <div>
                                        <div><input class="item_input" type="text" name=""></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pane_content">
                            <div class="gather_info">
                                <div class="gather_info_title"><span>返回</span><hr></div>
                            </div>    
                            <div class="form_content disflex">
                                <div class="form_item">
                                    <div class="item_title">出行工具信息(飞机/高铁/汽车/轮船)</div>
                                    <div><input class="item_input" type="text" name=""></div>
                                </div>
                                <div class="form_item">
                                    <div class="item_title">日期</div>
                                    <div><input class="item_input" type="text" name=""></div>
                                </div>
                                <div class="form_item">
                                    <div class="item_title">出发时间</div>
                                    <div>
                                        <input type="text" class="input2 fl" name="">
                                        <div class="fl" style="width:20%;text-align:center;">区域</div>
                                        <input type="text" class="input2 fl" name="">
                                    </div>
                                </div>
                                <div class="form_item">
                                    <div class="item_title">到达时间</div>
                                    <div>
                                        <input type="text" class="input2 fl" name="">
                                        <div class="fl" style="width:20%;text-align:center;">区域</div>
                                        <input type="text" class="input2 fl" name="">
                                    </div>
                                </div>
                                <div class="form_item">
                                    <div class="item_title">出发站点</div>
                                    <div>
                                        <div><input class="item_input" type="text" name=""></div>
                                    </div>
                                </div>
                                <div class="form_item">
                                    <div class="item_title">达到站点</div>
                                    <div>
                                        <div><input class="item_input" type="text" name=""></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dataBankAddBtn">
                            <img src="../../images/add_y.png">
                        </div>

                    </div>

                    <!-- 住宿资料 -->
                    <div role="tabpanel" class="tab-pane" id="accommodationInfo">
                        <div class="pane_content">    
                            <div class="form_content disflex">
                                <div class="form_item" style="width:100%;">
                                    <div class="item_title">酒店名称</div>
                                    <div><input class="item_input" style="width:97%;" type="text" name=""></div>
                                </div>
                                <div class="form_item">
                                    <div class="item_title">入住时间</div>
                                    <div><input class="item_input" type="text" name=""></div>
                                </div>
                                <div class="form_item">
                                    <div class="item_title">离开时间</div>
                                    <div><input class="item_input" type="text" name=""></div>
                                </div>
                                <div class="form_item">
                                    <div class="item_title">几晚</div>
                                    <div><input class="item_input" type="text" name=""></div>
                                </div>
                                <div class="form_item" style="width:100%;height:120px;">
                                    <div class="item_title">酒店地址</div>
                                    <div>
                                        <textarea class="item_area" placeholder="酒店地址"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dataBankAddBtn">
                            <img src="../../images/add_y.png">
                        </div>

                    </div>

                    <!-- 领队老师 -->
                    <div role="tabpanel" class="tab-pane" id="leaderTeacher">
                        <div class="pane_content">
                            
                            <div class="form_content disflex">

                                <div class="form_item">
                                    <div class="item_title">老师姓名</div>
                                    <div><input class="item_input" type="text" name=""></div>
                                </div>
                                <div class="form_item">
                                    <div class="item_title">老师电话</div>
                                    <div><input class="item_input" type="text" name=""></div>
                                </div>
                            </div>
                            <div class="form_content disflex">
                                <div class="form_item">
                                    <div class="item_title">老师姓名</div>
                                    <div><input class="item_input" type="text" name=""></div>
                                </div>
                                <div class="form_item">
                                    <div class="item_title">老师电话</div>
                                    <div><input class="item_input" type="text" name=""></div>
                                </div>
                               
                            </div>
                            <div class="dataBankAddBtn">
                                <img src="../../images/add_y.png">
                            </div>
                        </div>
                        
                    </div>

                    <!-- 恶劣天气安排 -->
                    <div role="tabpanel" class="tab-pane" id="heavyWeather">
                        <div class="pane_content">
                            
                            <div class="form_content disflex">
                                <div class="form_item" style="width:100%;">
                                    <div class="item_title">标题</div>
                                    <div><input class="item_input" style="width:97%;" type="text" name=""></div>
                                </div>
                                <div class="form_item" style="width:100%;height:120px;">
                                    <div class="item_title">安排</div>
                                    <div>
                                        <textarea class="item_area" placeholder="安排"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form_content disflex">
                                <div class="form_item" style="width:100%;">
                                    <div class="item_title">标题</div>
                                    <div><input class="item_input" style="width:97%;" type="text" name=""></div>
                                </div>
                                <div class="form_item" style="width:100%;height:120px;">
                                    <div class="item_title">安排</div>
                                    <div>
                                        <textarea class="item_area" placeholder="安排"></textarea>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="dataBankAddBtn">
                            <img src="../../images/add_y.png">
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
                assemblePlaces:[],
                flights:[],
                hotels:[],
                leadTeachers:[],
                badWeathers:[]
            }
        },
        mounted:function(){
            this.getAssemblePlaces();
            // this.getFlights();
            // this.getHotels();
            // this.getLeadTeachers();
            // this.getBadWeathers();
        },
        methods:{
            getAssemblePlaces(){
                // 获取旅游的集合信息
                this.$get('/api/travels/'+sessionStorage.actTravelId,
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    console.log(res.data);
                    this.assemblePlaces=res.data;
                    

                }).catch(err => {
                    this.$toast('获取失败');
                    console.log(err);
                });
            },
            addNewAssemblePlace(){

            },
            editAssemblePlace(){

            },
            delAssemblePlace(){

            },
            getFlights(){
                // 获取旅游的航班信息
                this.$get('/api/travels/'+sessionStorage.actTravelId+'/flights',
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    console.log(res.data);
                    this.flights=res.data;
                    
                }).catch(err => {
                    this.$toast('获取失败');
                    console.log(err);
                });

            },
            addNewFlight(){

            },
            editFlight(){

            },
            delFlight(){

            },
            getHotels(){
                // 获取旅游的住宿酒店
                this.$get('/api/travels/'+sessionStorage.actTravelId+'/hotels',
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    console.log(res.data);
                    this.hotels=res.data;
                    
                   
                }).catch(err => {
                    this.$toast('获取失败');
                    console.log(err);
                });

            },
            addNewHotel(){

            },
            editHotel(){

            },
            delHotel(){

            },
            getLeadTeachers(){
                // 获取领队老师信息
                // this.$get('/api/travels/'+sessionStorage.actTravelId+'/travels',
                this.$get('/api/leaders',
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    console.log(res.data);
                    this.leadTeachers=res.data;
                    
                   
                }).catch(err => {
                    this.$toast('获取失败');
                    console.log(err);
                });

            },
            addNewLeadTeacher(){

            },
            editLeadTeacher(){

            },
            delLeadTeacher(){

            },
            getBadWeathers(){
                // 获取恶劣天气安排
                this.$get('/api/travels/'+sessionStorage.actTravelId+'/travels',
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    console.log(res.data);
                    this.badWeathers=res.data;
                    
                   
                }).catch(err => {
                    this.$toast('获取失败');
                    console.log(err);
                });

            },
            addNewBadWeather(){

            },
            editBadWeather(){

            },
            delBadWeather(){

            },
        },
    }
</script>