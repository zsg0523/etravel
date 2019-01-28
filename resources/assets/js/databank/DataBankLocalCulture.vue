<style>
	.dataBank_input_form{width: 100%;min-height:650px;justify-content: center;align-items:flex-start;font-size: 16px;position: relative;}
    .tablist{width:100%;}
    .nav-tabs>li>a{color: #000;}
    .pane_content_culture{width:70%;margin-left: 15%;height:auto;margin-bottom: 30px;font-size: 16px;}
    .form_content_culture{width: 100%;min-height: 300px;align-content:flex-start;flex-direction: row;flex-wrap: wrap;}
    .form_item_culture{width:100%;height:100px;}
    .form_item_culture>div{width: 100%;height: 45px;line-height: 45px;word-break: break-all;}
    .item_input{height:40px;padding-left:10px;outline: none;width: 97%;border-radius: 8px;}
    .item_area{width:97%;height:80px;border-radius: 8px;resize:none;line-height:25px;font-size: 14px;outline: none;overflow: hidden;background-color: #eee;}
    .active{font-size: 18px;}        
</style>

<template>
	<div class="dataBank_input_form disflex">
        <div class="tablist">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#gather" aria-controls="gather" role="tab" data-toggle="tab">景点资讯</a></li>
                <li role="presentation"><a href="#flight" aria-controls="flight" role="tab" data-toggle="tab">地图</a></li>
            </ul>
            <div class="tab-content">
                <!-- 景点资讯 -->
                <div role="tabpanel" class="tab-pane active" id="gather">
                    <div class="pane_content_culture">   
                        <div class="form_content_culture disflex">
                            <div class="form_item_culture">
                                <div class="item_title">小标题(多少字符以内)</div>
                                <div><input class="item_input" placeholder="小标题" type="text" name=""></div>
                            </div>
                            <div class="form_item_culture">
                                <div class="item_title">图片</div>
                                <div><input class="item_input" type="text" name=""></div>
                            </div>
                            <div class="form_item_culture" style="width:100%;height:120px;">
                                <div class="item_title">内容</div>
                                <div>
                                    <textarea class="item_area" placeholder="内容"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- 地图 -->
                <div role="tabpanel" class="tab-pane" id="flight">
                    <div class="pane_content_culture"> 
                        <div class="form_content disflex">
                            <div class="form_item_culture">
                                <div class="item_title">城市地址</div>
                                <div><input class="item_input" type="text" name=""></div>
                            </div>
                            <div class="form_item_culture">
                                <div class="item_title">酒店详细地址</div>
                                <div>
                                    <div><input class="item_input" type="text" name=""></div>
                                </div>
                            </div>
                            <div class="form_item_culture">
                                <div class="item_title">图片</div>
                                <div> 
                                    <div><input class="item_input" type="text" name=""></div>
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

  	}
</script>