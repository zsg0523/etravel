<style>
    .dataBank{width: 100%;min-height: 700px;justify-content: flex-start;align-items:center;flex-direction: column;background-color: #fff;}
    .dataBankList{width: 100%;height: 100%;align-content: flex-start;flex-direction: row;}
    .dataBank_left{width: 18%;min-height:100%;border-right: 3px solid #d6d6d6;}
    .dataBank_left>ul{width: 100%;height: auto;}
    .dataBank_left>ul>li{width: 100%;height:50px;line-height: 50px;font-size: 16px;position: relative;z-index: 1;}
    .dataBank_left>ul>li:hover{cursor:pointer;}
    .dataBank_left>ul>li>div{width: 90%;height:50px;line-height: 50px;position: absolute;top:0;left: 5%;z-index: 2;}
    .dataBank_right{width: 82%;min-height:100%;justify-content: flex-start;align-items:center;flex-direction: column;}
    .act{background-color: #ffde01}
    .router-link-exact-active{background-color: #ffde01;}
    .router-link-active{background-color: #ffde01;}
</style>

<template>
    <div class="dataBank_left">
        <ul style="padding: 0;margin:0;">
            <router-link tag='li' to='/personalInfo'><div >个人资料<input type="checkbox" class="checke"></div></router-link>
            <router-link tag='li' to='/personalSetting'><div >账户设置<input type="checkbox" class="checke"></div></router-link>
            <router-link tag='li' to='/personalCoin'><div >金币管理<input type="checkbox" class="checke"></div></router-link>
            <router-link tag='li' to='/personalInformation'><div >信息中心<input type="checkbox" class="checke"></div></router-link>
        </ul>
    </div>
</template>
<script type="text/javascript" src="../../bootstrap/js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
<script>
	export default{
        

	}
</script>