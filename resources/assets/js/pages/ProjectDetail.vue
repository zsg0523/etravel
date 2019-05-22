<style>
    .prodectDetail{width: 100%;min-height: 700px;justify-content: space-around;align-items:center;flex-direction: row;}
    .detail_btn{width: 240px;height: 280px;border-radius: 15px;}
    .detail_icon{width: 240px;height: 240px;background-color: #e7e7e7;border-top-left-radius: 15px;border-top-right-radius: 15px;justify-content: center;align-items:center;}
    .detail_icon>img{width: 180px;height: 180px;}
    .detail_info{width: 240px;height: 50px;background-color: #ffde01;line-height: 50px;font-size: 18px;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;text-indent: 5px;}
</style>

<template>
	<div class="prodectDetail disflex">
    	<div class="detail_btn" @click="$router.push('/linkSchool')">
            <div class="detail_icon disflex">
                <img src="/etravel/public/images/settings.png">
            </div>
            <div class="detail_info">基本資料</div>
        </div>
        <div class="detail_btn" @click="$router.push('/dataBankInfo')">
            <div class="detail_icon disflex">
                <img src="/etravel/public/images/base-icon.png">
            </div>
            <div class="detail_info">資料庫</div>
        </div>
        <div class="detail_btn" @click="$router.push('/students')">
            <div class="detail_icon disflex">
                <img src="/etravel/public/images/IDmage-icon.png">
            </div>
            <div class="detail_info">團員信息</div>
        </div>
        <div class="detail_btn" @click="$router.push('/photo')">
            <div class="detail_icon disflex">
                <img src="/etravel/public/images/poto-icon.png">
            </div>
            <div class="detail_info">圖庫</div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                
            }
        },
        mounted:function(){
            sessionStorage.setItem('actTravelId', this.$route.params.id);
            this.$store.state.links=[{link:'/home',linkName:'項目'}];
        },
        methods:{

        },
    }
</script>