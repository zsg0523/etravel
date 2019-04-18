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
    .form_item_info{width: 50%;min-height:100px;}
    .form_item_info>div{width: 96%;min-height: 45px;line-height: 45px;}
    .item_input{height:40px;padding-left:10px;outline: none;width: 90%;border-radius: 8px;}
    .input2{width:30%;height:40px;padding-left:10px;outline: none;border-radius: 8px;}
    .item_area{width:97%;min-height:75px;border-radius: 8px;resize:none;line-height:25px;font-size: 14px;outline: none;overflow: hidden;}
    .active{font-size: 18px;}        

    .dataBankAddBtn{width:50px;height: 50px;position: absolute;right: 5px;top: 5px;}
    .dataBankAddBtn:hover{cursor:pointer;}
    .dataBankAddBtn>img{width:50px;height: 50px;}

    .editBox{width: 760px;min-height:240px;background-color: #fff;border-radius: 15px;}
    .editBoxContent{width:90%;margin-left: 5%;min-height:200px;margin-top:20px;flex-flow:row wrap;justify-content: center;align-items: center;}
    .issure{width:100%;height:50px;margin-top: 20px;margin-bottom: 20px;}
    .issure>button{width:60%;height:50px;margin-left: 20%;background-color: #ffde01;font-size: 16px;border-radius: 8px;border: none;outline: none;}

    .editBtnGroup{width:97%;height:50px;line-height: 50px;}
    .editBtnGroup>img{width:40px;height: 40px;margin-right: 25px;float: right;}

    .simulateShade{width:90%;height: 44px;border-width: 2px;border-style: solid;border-top-color: #999;border-left-color: #999;border-right-color: #eee;border-bottom-color: #eee;border-radius: 8px;}
    
    .bigRadio{width:20px;height:20px;}
    .van-dialog{width:50%;}
    .imgIcon{
        width:100px;
        height: 40px;
        float: right;
    }
    .imgIcon img{
        height: 35px;
        float: right;
    }
    .imgs{
        width:95%;
        position: relative;
    }
    .travelImg{
        width:100%;
        border-radius: 15px;
    }
    .cancelImg{
        width:30px;
        height: 30px;
        top: 15px;
        right: 15px;
        position: absolute;
    }

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
                        <div class="pane_content_info">
                            <div class="gather_info">
                                <div class="gather_info_title"><span>集合</span><hr></div>
                            </div>    
                            <div class="form_content disflex">
                                <div class="form_item_info" style="width:100%;">
                                    <div class="item_title">日期及时间</div>
                                    <div><input class="item_input" placeholder="日期及时间" style="width:97%;" disabled="disabled" type="text" v-model="assemblePlaces.assembly_at"></div>
                                 </div>
                                <div class="form_item_info" style="width:100%;min-height:120px;">
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
                                <div class="form_item_info" style="width:100%;min-height:120px;">
                                    <div class="item_title">地址</div>
                                    <div>
                                        <textarea class="item_area" placeholder="详细地址" disabled="disabled" v-model="assemblePlaces.dissolution_station"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dataBankAddBtn" @click="assemblePlacePopupShow();">
                            <img src="/etravel/public/images/edit-all.png">
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
                                    <div class="item_title">出发城市</div>
                                    <div>
                                        <div><input class="item_input" type="text" disabled="disabled"  :value="flight.from"></div>
                                    </div>
                                </div>
                                <div class="form_item_info">
                                    <div class="item_title">到达城市</div>
                                    <div>
                                        <div><input class="item_input" type="text" disabled="disabled"  :value="flight.to"></div>
                                    </div>
                                </div>
                                <div class="form_item_info">
                                    <div class="item_title">出发站点</div>
                                    <div>
                                        <div><input class="item_input" type="text" disabled="disabled"  :value="flight.from_flight"></div>
                                    </div>
                                </div>
                                <div class="form_item_info">
                                    <div class="item_title">到达站点</div>
                                    <div>
                                        <div><input class="item_input" type="text" disabled="disabled"  :value="flight.to_flight"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="editBtnGroup">
                                <img @click="delFlight(flight.id);" src="/etravel/public/images/rush-icon.png">
                                <img @click="editFlightShow(index);" src="/etravel/public/images/edit-all.png">
                            </div>
                        </div>
                        <div class="dataBankAddBtn" @click="newFlightShow();">
                            <img src="/etravel/public/images/add_y.png">
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
                                    <div class="item_title">入住天数</div>
                                    <div><input class="item_input" type="text" disabled="disabled" :value="hotel.times" ></div>
                                </div>
                                <div class="form_item_info">
                                    <div class="item_title">联系电话</div>
                                    <div><input class="item_input" type="text" disabled="disabled" :value="hotel.hotel_phone" ></div>
                                </div>
                                <div class="form_item_info"  style="width:100%;">
                                    <div class="item_title">酒店地址</div>
                                    <div><input class="item_input" style="width:97%;" type="text" disabled="disabled" :value="hotel.hotel_address" ></div>
                                </div>
                                <div class="form_item_info"  style="width:100%;">
                                    <div class="item_title">酒店经纬度</div>
                                    <div><input class="item_input" style="width:97%;" type="text" disabled="disabled" :value="hotel.hotel_location" ></div>
                                </div>
                                <div class="form_item_info"  style="width:100%;">
                                    <div class="item_title">酒店图片</div>
                                    <div><img style="width:97%;" :src="hotel.image"></div>
                                </div>
                                <div class="editBtnGroup">
                                    <img @click="delHotel(hotel.id);" src="/etravel/public/images/rush-icon.png">
                                    <img @click="editHotelShow(index);" src="/etravel/public/images/edit-all.png">
                                </div>
                            </div>
                        </div>
                        <div class="dataBankAddBtn" @click="addNewHotelShow();">
                            <img src="/etravel/public/images/add_y.png">
                        </div>

                    </div>

                    <!-- 领队老师 -->
                    <div role="tabpanel" class="tab-pane" id="leaderTeacher">
                        <div class="pane_content_info" v-for="(leadTeacher,index) in leadTeachers">
                            <div class="form_content disflex">
                                <div class="form_item_info" style="width:100%;">
                                    <div class="item_title">老师姓名</div>
                                    <div><input class="item_input" type="text" style="width:97%;" disabled="disabled" :value="leadTeacher.leader" ></div>
                                </div>
                                <div class="form_item_info" style="width:100%;">
                                    <div class="item_title">老师电话</div>
                                    <div><input class="item_input" type="text" style="width:97%;" disabled="disabled" :value="leadTeacher.phone" ></div>
                                </div>
                                <div class="form_item_info" style="width:100%;">
                                    <div class="item_title">职责</div>
                                    <div><input class="item_input" style="width:97%;" type="text" disabled="disabled" :value="leadTeacher.duty"></div>
                                </div>
                                <div class="editBtnGroup">
                                    <img @click="delLeadTeacher(leadTeacher.id);" src="/etravel/public/images/rush-icon.png">
                                    <img @click="editLeadTeacherShow(index);" src="/etravel/public/images/edit-all.png">
                                </div>
                            </div>
                        </div>
                        <div class="dataBankAddBtn" @click="addNewLeadTeacherShow()">
                            <img src="/etravel/public/images/add_y.png">
                        </div>
                        
                    </div>

                    <!-- 恶劣天气安排 -->
                    <div role="tabpanel" class="tab-pane" id="heavyWeather">
                        <div class="pane_content_info">
                            <div class="form_content disflex">
                                <div class="form_item_info" style="width:100%;min-height:120px;">
                                    <div class="item_title">安排</div>
                                    <div style="border:1px solid #ccc;border-radius: 8px;width:97%;background-color:#eeeeee;line-height:25px;" v-html="badWeathers.urgency"></div>
                                    <!-- <div>
                                        <textarea class="item_area" placeholder="安排" disabled="disabled" :value="badWeathers.urgency"></textarea>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="dataBankAddBtn" @click="editBadWeatherShow()">
                            <img src="/etravel/public/images/edit-all.png">
                        </div>
                    </div>

                </div>
            </div>             
            
        </div>
        <van-popup v-model="isAssemblePlacePopupShow" :overlay="true" style="border-radius: 15px;">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="gather_info">
                        <div class="gather_info_title"><span>集合</span><hr></div>
                    </div>   
                    <div class="form_item_info" style="width:100%;">
                        <div class="item_title">日期及时间</div>
                        <div><input class="item_input" placeholder="填写日期及时间(yyyy-mm-dd hh:mm)" type="text" v-model="edAssemblePlaces.assembly_at"></div>
                    </div>
                    <div class="form_item_info" style="width:100%;">
                        <div class="item_title">地址</div>
                        <div><input class="item_input" placeholder="填写地址" type="text" v-model="edAssemblePlaces.assembly_station"></div>
                    </div>
                    <div class="gather_info">
                        <div class="gather_info_title"><span>解散</span><hr></div>
                    </div>   
                    <div class="form_item_info" style="width:100%;">
                        <div class="item_title">日期及时间</div>
                        <div><input class="item_input" placeholder="填写日期及时间(yyyy-mm-dd hh:mm)" type="text" v-model="edAssemblePlaces.dissolution_at"></div>
                    </div>
                    <div class="form_item_info" style="width:100%;">
                        <div class="item_title">地址</div>
                        <div><input class="item_input" placeholder="填写地址" type="text" v-model="edAssemblePlaces.dissolution_station"></div>
                    </div>
                    <div class="issure">
                        <button @click="editAssemblePlace()">确定</button>
                    </div>
                </div>
            </div>
        </van-popup>
        <van-popup v-model="isNewFlightShow" :overlay="true" style="border-radius: 15px;">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item_info">
                        <div class="item_title">航班信息</div>
                        <div><input class="item_input" type="text" placeholder="填写航班信息" v-model="newFlight.flight"></div>
                    </div> 
                    <div class="form_item_info">
                        <div class="item_title">日期</div>
                        <div><input class="item_input" type="text" placeholder="填写日期(yyyy-mm-dd)" v-model="newFlight.date"></div>
                    </div>
                    <div class="form_item_info">
                        <div class="item_title">出发时间</div>
                        <div><input class="item_input" type="text" placeholder="填写出发时间(hh:mm)" v-model="newFlight.takeoff_time"></div>
                    </div>
                    <div class="form_item_info">
                        <div class="item_title">到达时间</div>
                        <div><input class="item_input" type="text" placeholder="填写到达时间(hh:mm)" v-model="newFlight.arrival_time"></div>
                    </div>
                    <div class="form_item_info">
                        <div class="item_title">出发城市</div>
                        <div><input class="item_input" type="text" placeholder="填写出发城市" v-model="newFlight.from"></div>
                    </div>
                    <div class="form_item_info">
                        <div class="item_title">达到城市</div>
                        <div><input class="item_input" type="text" placeholder="填写达到城市" v-model="newFlight.to"></div>
                    </div>
                    <div class="form_item_info">
                        <div class="item_title">出发站点</div>
                        <div><input class="item_input" type="text" placeholder="填写出发站点" v-model="newFlight.from_flight"></div>
                    </div>
                    <div class="form_item_info">
                        <div class="item_title">达到站点</div>
                        <div><input class="item_input" type="text" placeholder="填写达到站点" v-model="newFlight.to_flight"></div>
                    </div>
                    <div style="width:100%;height:50px;">
                        <span style="width:70px;text-align: center;display: block;float:left;">出发</span><input style="float:left" type="radio" value="0" class="bigRadio" v-model="newFlight.is_return">
                        <span style="width:70px;text-align: center;display: block;float:left;">返回</span><input style="float:left" type="radio" value="1" class="bigRadio" v-model="newFlight.is_return">
                    </div>
                    <div class="issure">
                        <button @click="addNewFlight()">添加</button>
                    </div>
                    
                </div>
            </div>
        </van-popup>
        <van-popup v-model="isEditFlightShow" :overlay="true" style="border-radius: 15px;">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item_info">
                        <div class="item_title">航班信息</div>
                        <div><input class="item_input" type="text" placeholder="填写航班信息" v-model="edFlight.flight"></div>
                    </div> 
                    <div class="form_item_info">
                        <div class="item_title">日期</div>
                        <div><input class="item_input" type="text" placeholder="填写日期(yyyy-mm-dd)" v-model="edFlight.date"></div>
                    </div>
                    <div class="form_item_info">
                        <div class="item_title">出发时间</div>
                        <div><input class="item_input" type="text" placeholder="填写出发时间(hh:mm)" v-model="edFlight.takeoff_time"></div>
                    </div>
                    <div class="form_item_info">
                        <div class="item_title">到达时间</div>
                        <div><input class="item_input" type="text" placeholder="填写到达时间(hh:mm)" v-model="edFlight.arrival_time"></div>
                    </div>
                    <div class="form_item_info">
                        <div class="item_title">出发城市</div>
                        <div><input class="item_input" type="text" placeholder="填写出发城市" v-model="edFlight.from"></div>
                    </div>
                    <div class="form_item_info">
                        <div class="item_title">到达城市</div>
                        <div><input class="item_input" type="text" placeholder="填写到达城市" v-model="edFlight.to"></div>
                    </div>
                    <div class="form_item_info">
                        <div class="item_title">出发站点</div>
                        <div><input class="item_input" type="text" placeholder="填写出发站点" v-model="edFlight.from_flight"></div>
                    </div>
                    <div class="form_item_info">
                        <div class="item_title">到达站点</div>
                        <div><input class="item_input" type="text" placeholder="填写到达站点" v-model="edFlight.to_flight"></div>
                    </div>
                    <div style="width:100%;height:50px;">
                        <span style="width:70px;text-align: center;display: block;float:left;">出发</span><input style="float:left" type="radio" value="0" class="bigRadio" v-model="edFlight.is_return">
                        <span style="width:70px;text-align: center;display: block;float:left;">返回</span><input style="float:left" type="radio" value="1" class="bigRadio" v-model="edFlight.is_return">
                    </div>
                    <div class="issure">
                        <button @click="editFlight()">修改</button>
                    </div>
                    
                </div>
            </div>
        </van-popup>
        <van-popup v-model="isNewHotelShow" :overlay="true" style="border-radius: 15px;">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item_info" style="width:100%;">
                        <div class="item_title">酒店名称</div>
                        <div><input class="item_input" style="width:97%;" type="text" placeholder="酒店名称" v-model="newHotel.hotel_name" ></div>
                    </div>
                    <div class="form_item_info">
                        <div class="item_title">入住日期</div>
                        <div><input class="item_input" type="text" placeholder="入住日期(yyyy-mm-dd)" v-model="newHotel.check_at" ></div>
                    </div>
                    <div class="form_item_info">
                        <div class="item_title">离开日期</div>
                        <div><input class="item_input" type="text" placeholder="离开日期(yyyy-mm-dd)" v-model="newHotel.leave_at" ></div>
                    </div>
                    <div class="form_item_info">
                        <div class="item_title">入住天数</div>
                        <div><input class="item_input" type="text" placeholder="入住天数" v-model="newHotel.times" ></div>
                    </div>
                    <div class="form_item_info">
                        <div class="item_title">联系电话</div>
                        <div><input class="item_input" type="text" placeholder="联系电话" v-model="newHotel.hotel_phone" ></div>
                    </div>
                    <div class="form_item_info" style="width:100%;">
                        <div class="item_title">酒店地址</div>
                        <div><input class="item_input" style="width:97%;" type="text" placeholder="酒店地址" v-model="newHotel.hotel_address" ></div>
                    </div>
                    <div class="form_item_info" style="width:100%;">
                        <div class="item_title">酒店经纬度</div>
                        <div><input class="item_input" style="width:97%;" type="text" placeholder="酒店经纬度" v-model="newHotel.hotel_location" ></div>
                    </div>
                    <div class="form_item_info" style="width:100%;">
                        <div style="width:93%;">
                            酒店图片
                            <div class="imgIcon">
                                <van-uploader style="width:50px;height:40px;float:right;" :after-read="onRead" accept="image/*">
                                    <img src="/etravel/public/images/sm-insert.png">
                                </van-uploader>
                            </div>
                        </div>
                        <div style="width:93%;">
                            <div class="imgs" style="width:97%">    
                                <img class="travelImg" :src="edHotel.image">
                                <img class="cancelImg" src="/etravel/public/images/delete.png" @click="resetImg();" />
                            </div>
                        </div>
                    </div>
                    <div class="issure">
                        <button @click="addNewHotel()">添加</button>
                    </div>
                    
                </div>
            </div>
        </van-popup>
        <van-popup v-model="isEditHotelShow" :overlay="true" style="border-radius: 15px;">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item_info" style="width:100%;">
                        <div class="item_title">酒店名称</div>
                        <div><input class="item_input" style="width:97%;" type="text" placeholder="酒店名称" v-model="edHotel.hotel_name" ></div>
                    </div>
                    <div class="form_item_info">
                        <div class="item_title">入住日期</div>
                        <div><input class="item_input" type="text" placeholder="入住日期(yyyy-mm-dd)" v-model="edHotel.check_at" ></div>
                    </div>
                    <div class="form_item_info">
                        <div class="item_title">离开日期</div>
                        <div><input class="item_input" type="text" placeholder="离开日期(yyyy-mm-dd)" v-model="edHotel.leave_at" ></div>
                    </div>
                    <div class="form_item_info">
                        <div class="item_title">入住天数</div>
                        <div><input class="item_input" type="text" placeholder="入住天数" v-model="edHotel.times" ></div>
                    </div>
                    <div class="form_item_info">
                        <div class="item_title">联系电话</div>
                        <div><input class="item_input" type="text" placeholder="联系电话" v-model="edHotel.hotel_phone" ></div>
                    </div>
                    <div class="form_item_info" style="width:100%;">
                        <div class="item_title">酒店地址</div>
                        <div><input class="item_input" style="width:97%" type="text" placeholder="酒店地址" v-model="edHotel.hotel_address" ></div>
                    </div>
                    <div class="form_item_info" style="width:100%;">
                        <div class="item_title">酒店经纬度</div>
                        <div><input class="item_input" style="width:97%" type="text" placeholder="酒店经纬度(经度,纬度)" v-model="edHotel.hotel_location" ></div>
                    </div>
                    <div class="form_item_info" style="width:100%;">
                        <div style="width:93%;">
                            酒店图片
                            <div class="imgIcon">
                                <van-uploader style="width:50px;height:40px;float:right;" :after-read="onRead" accept="image/*">
                                    <img src="/etravel/public/images/sm-insert.png">
                                </van-uploader>
                            </div>
                        </div>
                        <div>
                            <div class="imgs" style="width:97%">    
                                <img class="travelImg" :src="edHotel.image">
                                <img class="cancelImg" src="/etravel/public/images/delete.png" @click="resetImg();" />
                            </div>
                        </div>
                    </div>
                    <div class="issure">
                        <button @click="editHotel()">修改</button>
                    </div>
                    
                </div>
            </div>
        </van-popup>
        <van-popup v-model="isNewLeadTeacherShow" :overlay="true" style="border-radius: 15px;">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item_info" style="width:100%;">
                        <div class="item_title">老师姓名</div>
                        <div><input class="item_input" type="text" placeholder="老师姓名" v-model="newLeadTeacher.leader" ></div>
                    </div>
                    <div class="form_item_info" style="width:100%;">
                        <div class="item_title">区号</div>
                        <div>
                            <div class="simulateShade">
                                <AreaCodeSelector @selectedAreaCode='selectedAreaCode' :areaCode='newLeadTeacher.area_code' v-model='newLeadTeacher.area_code'></AreaCodeSelector>
                            </div>
                        </div>
                    </div>
                    <div class="form_item_info" style="width:100%;">
                        <div class="item_title">老师电话</div>
                        <div><input class="item_input" type="text" placeholder="老师电话" v-model="newLeadTeacher.phone" ></div>
                    </div>
                    <div class="form_item_info" style="width:100%;">
                        <div class="item_title">职责</div>
                        <div><input class="item_input" type="text" placeholder="职责" v-model="newLeadTeacher.duty"></div>
                    </div>
                    <div class="issure">
                        <button @click="addNewLeadTeacher()">添加</button>
                    </div>
                </div>
            </div>
        </van-popup>
        <van-popup v-model="isEditLeadTeacherShow" :overlay="true" style="border-radius: 15px;">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item_info" style="width:100%;">
                        <div class="item_title">老师姓名</div>
                        <div><input class="item_input" type="text" placeholder="老师姓名" v-model="edLeadTeacher.leader" ></div>
                    </div>
                    <div class="form_item_info" style="width:100%;">
                        <div class="item_title">区号</div>
                        <div>
                            <div class="simulateShade">
                                <AreaCodeSelector @selectedAreaCode='selectedAreaCode' :areaCode='edLeadTeacher.area_code' v-model='edLeadTeacher.area_code'></AreaCodeSelector>
                            </div>
                        </div>
                    </div>
                    <div class="form_item_info" style="width:100%;">
                        <div class="item_title">老师电话</div>
                        <div><input class="item_input" type="text" placeholder="老师电话" v-model="edLeadTeacher.phone" ></div>
                    </div>
                    <div class="form_item_info" style="width:100%;">
                        <div class="item_title">职责</div>
                        <div><input class="item_input" type="text" placeholder="职责" v-model="edLeadTeacher.duty"></div>
                    </div>
                    <div class="issure">
                        <button @click="editLeadTeacher()">修改</button>
                    </div>
                </div>
            </div>
        </van-popup>
        <van-popup v-model="isEditBadWeatherShow" :overlay="true" style="border-radius: 15px;">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item_info" style="width:100%;">
                        <div class="item_title">安排</div>
                        <div>
                            <!-- <textarea class="item_area" placeholder="安排" v-model="edBadWeather.urgency"></textarea> -->
                            <div><Editor @catchData='catchData' :childData='edBadWeather.urgency'></Editor></div>
                        </div>
                    </div>
                    <div class="issure">
                        <button @click="editBadWeather()">修改</button>
                    </div>
                </div>
            </div>
        </van-popup>
    </div>
	
    
</template>
<script>
    import AreaCodeSelector from '../components/AreaCodeSelector.vue';
    import Editor from '../components/Editor.vue';
	export default {
        components: {
            AreaCodeSelector,
            Editor,
        },
        data() {
            return {
                assemblePlaces:[],
                edAssemblePlaces:{
                    assembly_at:"",
                    assembly_station:"",
                    dissolution_at:"",
                    dissolution_station:"",
                },
                flights:[],
                newFlight:{
                    travel_id:sessionStorage.actTravelId,
                    is_return:'',
                    flight:'',
                    date:'',
                    takeoff_time:'',
                    arrival_time:'',
                    from:'',
                    to:'',
                    from_flight:'',
                    to_flight:'',
                },
                edFlight:{
                    id:'',
                    is_return:'',
                    flight:'',
                    date:'',
                    takeoff_time:'',
                    arrival_time:'',
                    from:'',
                    to:'',
                    from_flight:'',
                    to_flight:'',
                    index:'',
                },
                hotels:[],
                newHotel:{
                    check_at:'',
                    leave_at:'',
                    times:'',
                    hotel_name:'',
                    hotel_address:'',
                    hotel_phone:'',
                    hotel_location:'',
                    image:'',
                    travel_id:sessionStorage.actTravelId,
                },
                edHotel:{
                    id:'',
                    check_at:'',
                    leave_at:'',
                    times:'',
                    hotel_name:'',
                    hotel_address:'',
                    hotel_phone:'',
                    hotel_location:'',
                    image:'',
                    index:'',
                },
                leadTeachers:[],
                newLeadTeacher:{
                    leader:'',
                    phone:'',
                    area_code:'',
                    duty:'',
                },
                edLeadTeacher:{
                    id:'',
                    leader:'',
                    phone:'',
                    area_code:'',
                    duty:'',
                    index:'',
                },
                badWeathers:[],
                edBadWeather:{
                    urgency:'',
                },
                isAssemblePlacePopupShow:false,
                isNewFlightShow:false,
                isEditFlightShow:false,
                isNewHotelShow:false,
                isEditHotelShow:false,
                isNewLeadTeacherShow:false,
                isEditLeadTeacherShow:false,
                isEditBadWeatherShow:false,
                isNew:true,
                isNewImg:true,
            }
        },
        mounted:function(){
            this.getAssemblePlaces();
            this.getFlights();
            this.getHotels();
            this.getLeadTeachers();
            this.getBadWeathers();
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
            assemblePlacePopupShow(){
                this.isAssemblePlacePopupShow=true;
            },
            editAssemblePlace(){
                // 修改集合基本信息
                this.$ajax({
                    method: 'PATCH',
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    },
                    data:{
                        assembly_at:this.edAssemblePlaces.assembly_at,
                        assembly_station:this.edAssemblePlaces.assembly_station,
                        dissolution_at:this.edAssemblePlaces.dissolution_at,
                        dissolution_station:this.edAssemblePlaces.dissolution_station,
                    },
                    url: this.$config+'/api/travels/'+sessionStorage.actTravelId,
                }).then(res => {
                    // console.log(res);
                    if(res.status==200){
                        this.$toast('修改成功');
                        this.assemblePlaces.assembly_at=this.edAssemblePlaces.assembly_at;
                        this.assemblePlaces.assembly_station=this.edAssemblePlaces.assembly_station;
                        this.assemblePlaces.dissolution_at=this.edAssemblePlaces.dissolution_at;
                        this.assemblePlaces.dissolution_station=this.edAssemblePlaces.dissolution_station;
                        this.isAssemblePlacePopupShow=false;
                    }else{
                        this.$toast('修改失败');
                    }
                }).catch(err => {
                    this.$toast('修改失败');
                    console.log(err)
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
            newFlightShow(){
                this.isNewFlightShow=true;
            },
            addNewFlight(){
                // 新增航班
                this.$post(this.$config+'/api/flights',this.newFlight,
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    // console.log(res.data);
                    this.$toast('添加成功');
                    this.getFlights();
                    this.isNewFlightShow=false;
                    this.newFlight.is_return='';
                    this.newFlight.flight='';
                    this.newFlight.date='';
                    this.newFlight.takeoff_time='';
                    this.newFlight.arrival_time='';
                    this.newFlight.from='';
                    this.newFlight.to='';
                    this.newFlight.from_flight='';
                    this.newFlight.to_flight='';
                }).catch(err => {
                    this.$toast('添加失败');
                    console.log(err)
                });
            },
            editFlightShow(index){
                this.edFlight.id=this.flights[index].id;
                this.edFlight.flight=this.flights[index].flight;
                this.edFlight.date=this.flights[index].date;
                this.edFlight.takeoff_time=this.flights[index].takeoff_time;
                this.edFlight.arrival_time=this.flights[index].arrival_time;
                this.edFlight.from=this.flights[index].from;
                this.edFlight.to=this.flights[index].to;
                this.edFlight.from_flight=this.flights[index].from_flight;
                this.edFlight.to_flight=this.flights[index].to_flight;
                this.edFlight.is_return=this.flights[index].is_return;
                this.edFlight.index=index;

                this.isEditFlightShow=true;
            },
            editFlight(){
                // 修改航班信息
                this.$ajax({
                    method: 'PATCH',
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    },
                    data:{
                        flight:this.edFlight.flight,
                        date:this.edFlight.date,
                        takeoff_time:this.edFlight.takeoff_time,
                        arrival_time:this.edFlight.arrival_time,
                        from:this.edFlight.from,
                        to:this.edFlight.to,
                        from_flight:this.edFlight.from_flight,
                        to_flight:this.edFlight.to_flight,
                        is_return:this.edFlight.is_return,
                    },
                    url: this.$config+'/api/flights/'+this.edFlight.id,
                }).then(res => {
                    if(res.status==200){
                        this.flights[this.edFlight.index].flight=this.edFlight.flight;
                        this.flights[this.edFlight.index].date=this.edFlight.date;
                        this.flights[this.edFlight.index].takeoff_time=this.edFlight.takeoff_time;
                        this.flights[this.edFlight.index].arrival_time=this.edFlight.arrival_time;
                        this.flights[this.edFlight.index].from=this.edFlight.from;
                        this.flights[this.edFlight.index].to=this.edFlight.to;
                        this.flights[this.edFlight.index].from_flight=this.edFlight.from_flight;
                        this.flights[this.edFlight.index].to_flight=this.edFlight.to_flight;
                        this.flights[this.edFlight.index].is_return=this.edFlight.is_return;
                        this.$toast('修改成功');
                        this.isEditFlightShow=false;    
                    }else{
                        this.$toast('修改失败');
                    }
                }).catch(err => {
                    this.$toast('修改失败');
                    console.log(err)
                });
            },
            delFlight(flightId){
                // 删除航班
                this.$dialog.confirm({
                    title: '删除航班',
                    message: '是否删除该航班'
                }).then(() => {
                    this.$ajax({
                        method: 'DELETE',
                        headers: {
                            "Authorization": 'Bearer '+sessionStorage.token,
                        },
                        url: this.$config+'/api/flights/'+flightId,
                    }).then(res => {
                        // console.log(res);
                        if(res.status==204){
                            this.getFlights();
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
            addNewHotelShow(){
                this.isNewHotelShow=true;
                this.isNewImg=true;
            },
            addNewHotel(){
                // 新增酒店
                this.$post(this.$config+'/api/hotels',this.newHotel,
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    // console.log(res.data);
                    this.$toast('添加成功');
                    this.getHotels();
                    this.isNewHotelShow=false;
                    this.newHotel.check_at='';
                    this.newHotel.leave_at='';
                    this.newHotel.times='';
                    this.newHotel.hotel_name='';
                    this.newHotel.hotel_address='';
                    this.newHotel.hotel_phone='';
                    this.newHotel.hotel_location='';
                    this.newHotel.image='';
                }).catch(err => {
                    this.$toast('添加失败');
                    console.log(err)
                });
            },
            editHotelShow(index){
                this.edHotel.id=this.hotels[index].id ;
                this.edHotel.check_at=this.hotels[index].check_at;
                this.edHotel.leave_at=this.hotels[index].leave_at;
                this.edHotel.times=this.hotels[index].times;
                this.edHotel.hotel_name=this.hotels[index].hotel_name;
                this.edHotel.hotel_address=this.hotels[index].hotel_address;
                this.edHotel.hotel_phone=this.hotels[index].hotel_phone;
                this.edHotel.hotel_location=this.hotels[index].hotel_location;
                this.edHotel.image=this.hotels[index].image;
                this.edHotel.index=index;
                this.isEditHotelShow=true;
                this.isNewImg=false;
            },
            editHotel(){
                // 修改酒店信息
                this.$ajax({
                    method: 'PATCH',
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    },
                    data:{
                        check_at:this.edHotel.check_at,
                        leave_at:this.edHotel.leave_at,
                        times:this.edHotel.times,
                        hotel_name:this.edHotel.hotel_name,
                        hotel_address:this.edHotel.hotel_address,
                        hotel_phone:this.edHotel.hotel_phone,
                        image:this.edHotel.image,
                        hotel_location:this.edHotel.hotel_location,
                    },
                    url: this.$config+'/api/hotels/'+this.edHotel.id,
                }).then(res => {
                    if(res.status==200){
                        this.hotels[this.edHotel.index].check_at=this.edHotel.check_at;
                        this.hotels[this.edHotel.index].leave_at=this.edHotel.leave_at;
                        this.hotels[this.edHotel.index].times=this.edHotel.times;
                        this.hotels[this.edHotel.index].hotel_name=this.edHotel.hotel_name;
                        this.hotels[this.edHotel.index].hotel_address=this.edHotel.hotel_address;
                        this.hotels[this.edHotel.index].hotel_phone=this.edHotel.hotel_phone;
                        this.hotels[this.edHotel.index].hotel_location=this.edHotel.hotel_location;
                        this.hotels[this.edHotel.index].image=this.edHotel.image;
                        this.$toast('修改成功');
                        this.isEditHotelShow=false;    
                    }else{
                        this.$toast('修改失败');
                    }
                }).catch(err => {
                    this.$toast('修改失败');
                    console.log(err)
                });
            },
            delHotel(hotelId){
                // 删除酒店
                this.$dialog.confirm({
                    title: '删除酒店',
                    message: '是否删除该酒店'
                }).then(() => {
                    this.$ajax({
                        method: 'DELETE',
                        headers: {
                            "Authorization": 'Bearer '+sessionStorage.token,
                        },
                        url: this.$config+'/api/hotels/'+hotelId,
                    }).then(res => {
                        // console.log(res);
                        if(res.status==204){
                            this.getHotels();
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
            getLeadTeachers(){
                // 获取领队老师信息
                // this.$get(this.$config+'/api/travels/'+sessionStorage.actTravelId+'/travels',
                this.$get(this.$config+'/api/travels/'+sessionStorage.actTravelId+'/leaders',
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    // console.log(res.data);
                    this.leadTeachers=res.data.data;
                }).catch(err => {
                    this.$toast('获取失败');
                    console.log(err);
                });

            },
            addNewLeadTeacherShow(){
                this.isNewLeadTeacherShow=true;
                this.isNew=true;
            },
            addNewLeadTeacher(){
                // 新增领队
                this.$post(this.$config+'/api/travels/'+sessionStorage.actTravelId+'/leaders',this.newLeadTeacher,
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    // console.log(res.data);
                    this.$toast('添加成功');
                    this.getLeadTeachers();
                    this.isNewLeadTeacherShow=false;
                    this.newLeadTeacher.leader='';
                    this.newLeadTeacher.duty='';
                    this.newLeadTeacher.area_code='';
                    this.newLeadTeacher.phone='';
                }).catch(err => {
                    this.$toast('添加失败');
                    console.log(err)
                });
            },
            editLeadTeacherShow(index){
                this.edLeadTeacher.id=this.leadTeachers[index].id;
                this.edLeadTeacher.leader=this.leadTeachers[index].leader;
                this.edLeadTeacher.duty=this.leadTeachers[index].duty;
                this.edLeadTeacher.area_code=this.leadTeachers[index].area_code;
                this.edLeadTeacher.phone=this.leadTeachers[index].phone;
                this.edLeadTeacher.index=index;
                this.isEditLeadTeacherShow=true;
                this.isNew=false;
            },
            editLeadTeacher(){
                // 修改领队信息
                this.$ajax({
                    method: 'PATCH',
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    },
                    data:{
                        leader:this.edLeadTeacher.leader,
                        duty:this.edLeadTeacher.duty,
                        area_code:this.edLeadTeacher.area_code,
                        phone:this.edLeadTeacher.phone,
                    },
                    url: this.$config+'/api/travels/'+sessionStorage.actTravelId+'/leaders/'+this.edLeadTeacher.id,
                }).then(res => {
                    if(res.status==200){
                        this.leadTeachers[this.edLeadTeacher.index].leader=this.edLeadTeacher.leader;
                        this.leadTeachers[this.edLeadTeacher.index].duty=this.edLeadTeacher.duty;
                        this.leadTeachers[this.edLeadTeacher.index].area_code=this.edLeadTeacher.area_code;
                        this.leadTeachers[this.edLeadTeacher.index].phone=this.edLeadTeacher.phone;
                        this.$toast('修改成功');
                        this.isEditLeadTeacherShow=false;    
                    }else{
                        this.$toast('修改失败');
                    }
                }).catch(err => {
                    this.$toast('修改失败');
                    console.log(err)
                });
            },
            delLeadTeacher(leadTeacherId){
                // 删除领队
                this.$dialog.confirm({
                    title: '删除领队',
                    message: '是否删除该领队'
                }).then(() => {
                    this.$ajax({
                        method: 'DELETE',
                        headers: {
                            "Authorization": 'Bearer '+sessionStorage.token,
                        },
                        url: this.$config+'/api/travels/'+sessionStorage.actTravelId+'/leaders/'+leadTeacherId,
                    }).then(res => {
                        // console.log(res);
                        if(res.status==204){
                            this.getLeadTeachers();
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
            getBadWeathers(){
                // 获取恶劣天气安排
                this.$get(this.$config+'/api/travels/'+sessionStorage.actTravelId,
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    // console.log(res.data);
                    this.badWeathers=res.data;
                    this.edBadWeather.urgency=res.data.urgency;
                }).catch(err => {
                    this.$toast('获取失败');
                    console.log(err);
                });

            },
            editBadWeatherShow(){
                this.isEditBadWeatherShow=true;
            },
            editBadWeather(){
                // 修改集合基本信息
                this.$ajax({
                    method: 'PATCH',
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    },
                    data:{
                        urgency:this.edBadWeather.urgency,
                    },
                    url: this.$config+'/api/travels/'+sessionStorage.actTravelId,
                }).then(res => {
                    // console.log(res);
                    if(res.status==200){
                        this.$toast('修改成功');
                        this.badWeathers.urgency=this.edBadWeather.urgency;
                        this.isEditBadWeatherShow=false;
                    }else{
                        this.$toast('修改失败');
                    }
                }).catch(err => {
                    this.$toast('修改失败');
                    console.log(err)
                });
            },
            selectedAreaCode(value){
                if(this.isNew){
                    this.newLeadTeacher.area_code=value;
                }else{
                    this.edLeadTeacher.area_code=value;
                }
                console.log(value);
            },
            catchData(value){
                this.edBadWeather.urgency=value;
            },
            onRead(file){
                this.$ajax({
                    method: 'post',
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    },
                    data:{
                        type:'travel',
                        image:file.content,
                    },
                    url: this.$config+'/api/images',
                }).then(res => {
                    console.log(res);
                    if(res.status==201){
                        this.$toast('上传成功');
                        if(this.isNewImg){
                            this.newHotel.image=res.data.data.path;
                        }else{
                            this.edHotel.image=res.data.data.path;
                        }
                    }else{
                        this.$toast('上传失败');
                    }
                }).catch(err => {
                    this.$toast('上传失败');
                    console.log(err)
                });
            },
            resetImg(){
                this.$dialog.confirm({
                    title: '重置图片',
                    message: '是否重置該图片'
                }).then(() => {
                    if(this.isNewImg){
                        this.newHotel.image="http://120.77.206.79/etravel/public/uploads/images/travels/201904/12/1_1555054305_j8Qwecy5fN.png";
                    }else{
                        this.edHotel.image="http://120.77.206.79/etravel/public/uploads/images/travels/201904/12/1_1555054305_j8Qwecy5fN.png";
                    }
                }).catch(err => {

                });
            }
        },
    }
</script>