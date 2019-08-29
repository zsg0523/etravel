
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
            <router-link tag='li' to='/dataBankInfo'><div >{{$t('commonLeft.dataBankInfo')}}<!-- <input type="checkbox" class="checke"> --></div></router-link>
            <router-link tag='li' to='/dataBankPhone'><div >{{$t('commonLeft.dataBankPhone')}}<!-- <input type="checkbox" class="checke"> --></div></router-link>
            <router-link tag='li' to='/rule'><div >{{$t('commonLeft.rule')}}<!-- <input type="checkbox" class="checke"> --></div></router-link>
            <router-link tag='li' to='/promise'><div >{{$t('commonLeft.promise')}}<!-- <input type="checkbox" class="checke"> --></div></router-link>
            <!-- <router-link tag='li' to='/dataBankGroup'><div >師生名單分組<input type="checkbox" class="checke"></div></router-link> -->
            <router-link tag='li' to='/dataBankLocalCulture'><div >{{$t('commonLeft.dataBankLocalCulture')}}<!-- <input type="checkbox" class="checke"> --></div></router-link>
            <router-link tag='li' to='/dataBankHouseTable'><div >{{$t('commonLeft.dataBankHouseTable')}}<!-- <input type="checkbox" class="checke"> --></div></router-link>
            <router-link tag='li' to='/luggage'><div >{{$t('commonLeft.luggage')}}<!-- <input type="checkbox" class="checke"> --></div></router-link>
            <router-link tag='li' to='/journey'><div >{{$t('commonLeft.journey')}}<!-- <input type="checkbox" class="checke"> --></div></router-link>
            <router-link tag='li' to='/study'><div >{{$t('commonLeft.study')}}<!-- <input type="checkbox" class="checke"> --></div></router-link>
            <!-- <router-link tag='li' to='/'><div >每日记事<input type="checkbox" class="checke"></div></router-link> -->
            <router-link tag='li' to='/topic'><div >{{$t('commonLeft.topic')}}<!-- <input type="checkbox" class="checke"> --></div></router-link>
            <router-link tag='li' to='/dataBankSelfPerception'><div >{{$t('commonLeft.dataBankSelfPerception')}}<!-- <input type="checkbox" class="checke"> --></div></router-link>
            <router-link tag='li' to='/answer'><div >{{$t('commonLeft.answer')}}<!-- <input type="checkbox" class="checke"> --></div></router-link>

        </ul>
    </div>
</template>
<script type="text/javascript" src="/etravel/public/bootstrap/js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="/etravel/public/bootstrap/js/bootstrap.min.js"></script>
<script>
	export default{
        

	}
</script>