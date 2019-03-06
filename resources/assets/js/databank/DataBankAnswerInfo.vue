<style>
    .dataBank_input_form{width: 100%;min-height:650px;justify-content: center;align-items:flex-start;font-size: 16px;}
    .tablist{width:100%;}
    .nav-tabs>li>a{color: #000;}
    .tab-pane{position: relative;}
    .pane_content_info{width:70%;margin-left: 15%;height:auto;margin: 0 auto;margin-bottom: 30px;font-size: 16px;}
    .gather_info{width:100%;height: auto;}
    .gather_info_title{width:100%;height:50px;position: relative;}
    .gather_info_title>span{width:60px;height:50px;display: block;line-height: 50px;left: 0;position: absolute; background-color:#fff;z-index: 2}
    .gather_info_title>hr{width:94%;height:2px;background-color:#ffde01;z-index: 1;left: 0;position: absolute;} 
    .form_content{width: 100%;min-height: 100px;align-content:flex-start;flex-direction: row;flex-wrap: wrap;}
    .form_item_info{width: 50%;height:100px;}
    .form_item_info>div{width: 96%;height: 45px;line-height: 45px;}
    .item_input{height:40px;padding-left:10px;outline: none;width: 90%;border-radius: 8px;}
    .input2{width:30%;height:40px;padding-left:10px;outline: none;border-radius: 8px;}
    .item_area{width:97%;height:75px;border-radius: 8px;resize:none;line-height:25px;font-size: 14px;outline: none;overflow: hidden;background-color: #eee;}
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
    
    .bigRadio{width:20px;height:20px;}
    .van-dialog{width:50%;}

</style>

<template>
    <div style="width:100%;">
        <div class="dataBank_input_form disflex">
            <div class="tablist">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#gather" aria-controls="gather" role="tab" data-toggle="tab">集合解散</a></li>
                    <li role="presentation"><a href="#flight" aria-controls="flight" role="tab" data-toggle="tab">航班往返</a></li>
                    <li role="presentation"><a href="#accommodationInfo" aria-controls="accommodationInfo" role="tab" data-toggle="tab">住宿资料</a></li>
                </ul>
                <div class="tab-content">
                    <!-- 集合解散 -->
                    <div role="tabpanel" class="tab-pane active" id="gather">
                        <div class="pane_content_info">
                            <div class="gather_info">
                                <div class="gather_info_title"><span>集合</span><hr></div>
                            </div>    
                            <div class="form_content disflex">
                                <div class="form_item_info" style="width:100%;">
                                    <div class="item_title">日期及时间</div>
                                    <div><input class="item_input" placeholder="日期及时间" style="width:97%;" disabled="disabled" type="text" v-model="assemblePlaces.assembly_at"></div>
                                 </div>
                                <div class="form_item_info" style="width:100%;height:120px;">
                                    <div class="item_title">详细地址</div>
                                    <div>
                                        <textarea class="item_area" placeholder="详细地址" disabled="disabled" v-model="assemblePlaces.assembly_station"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pane_content_info">
                            <div class="gather_info">
                                <div class="gather_info_title"><span>解散</span><hr></div>
                            </div>    
                            <div class="form_content disflex">
                                <div class="form_item_info" style="width:100%;">
                                    <div class="item_title">日期及时间</div>
                                    <div><input class="item_input"  placeholder="日期及时间" style="width:97%;" type="text" disabled="disabled" v-model="assemblePlaces.dissolution_at"></div>
                                </div>
                                <div class="form_item_info" style="width:100%;height:120px;">
                                    <div class="item_title">地址</div>
                                    <div>
                                        <textarea class="item_area" placeholder="详细地址" disabled="disabled" v-model="assemblePlaces.dissolution_station"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 航班往返 -->
                    <div role="tabpanel" class="tab-pane" id="flight">
                        <div class="pane_content_info" v-for="(flight,index) in flights">
                            <div class="gather_info">
                                <div class="gather_info_title"><span v-if="flight.is_return">返回</span><span v-else>出发</span><hr></div>
                            </div>    
                            <div class="form_content disflex">
                                <div class="form_item_info">
                                    <div class="item_title">航班信息</div>
                                    <div><input class="item_input" type="text" disabled="disabled"  :value="flight.flight"></div>
                                </div> 
                                <div class="form_item_info">
                                    <div class="item_title">日期</div>
                                    <div><input class="item_input" type="text" disabled="disabled"  :value="flight.date"></div>
                                </div>
                                <div class="form_item_info">
                                    <div class="item_title">出发时间</div>
                                    <div><input class="item_input" type="text" disabled="disabled"  :value="flight.takeoff_time"></div>
                                </div>
                                <div class="form_item_info">
                                    <div class="item_title">到达时间</div>
                                    <div><input class="item_input" type="text" disabled="disabled"  :value="flight.arrival_time"></div>
                                </div>
                                <div class="form_item_info">
                                    <div class="item_title">出发站点</div>
                                    <div>
                                        <div><input class="item_input" type="text" disabled="disabled"  :value="flight.from"></div>
                                    </div>
                                </div>
                                <div class="form_item_info">
                                    <div class="item_title">达到站点</div>
                                    <div>
                                        <div><input class="item_input" type="text" disabled="disabled"  :value="flight.to"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- 住宿资料 -->
                    <div role="tabpanel" class="tab-pane" id="accommodationInfo">
                        <div class="pane_content_info" v-for="(hotel,index) in hotels">    
                            <div class="form_content disflex">
                                <div class="form_item_info" style="width:100%;">
                                    <div class="item_title">酒店名称</div>
                                    <div><input class="item_input" style="width:97%;" type="text" disabled="disabled" :value="hotel.hotel_name" ></div>
                                </div>
                                <div class="form_item_info">
                                    <div class="item_title">入住时间</div>
                                    <div><input class="item_input" type="text" disabled="disabled" :value="hotel.check_at" ></div>
                                </div>
                                <div class="form_item_info">
                                    <div class="item_title">离开时间</div>
                                    <div><input class="item_input" type="text" disabled="disabled" :value="hotel.leave_at" ></div>
                                </div>
                                <div class="form_item_info">
                                    <div class="item_title">几晚</div>
                                    <div><input class="item_input" type="text" disabled="disabled" :value="hotel.times" ></div>
                                </div>
                                <div class="form_item_info">
                                    <div class="item_title">联系电话</div>
                                    <div><input class="item_input" type="text" disabled="disabled" :value="hotel.hotel_phone" ></div>
                                </div>
                                <div class="form_item_info" style="width:100%;height:120px;">
                                    <div class="item_title">酒店地址</div>
                                    <div>
                                        <textarea class="item_area" placeholder="酒店地址" disabled="disabled" :value="hotel.hotel_address"></textarea>
                                    </div>
                                </div>
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
                assemblePlaces:[],
                flights:[],
                hotels:[],
            }
        },
        mounted:function(){
            this.getAssemblePlaces();
            this.getFlights();
            this.getHotels();
          
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