
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
            <router-link tag='li' to='/dataBankInfo'><div >重要资料<input type="checkbox" class="checke"></div></router-link>
            <router-link tag='li' to='/dataBankPhone'><div >常用电话<input type="checkbox" class="checke"></div></router-link>
            <router-link tag='li' to='/rule'><div >团队守则<input type="checkbox" class="checke"></div></router-link>
            <router-link tag='li' to='/dataBankPromise'><div >我的承诺<input type="checkbox" class="checke"></div></router-link>
            <!-- <router-link tag='li' to='/dataBankGroup'><div >师生名单分组<input type="checkbox" class="checke"></div></router-link> -->
            <!-- <router-link tag='li' to='/dataBankLocalCulture'><div >当地文化<input type="checkbox" class="checke"></div></router-link> -->
            <router-link tag='li' to='/dataBankHouseTable'><div >分房表<input type="checkbox" class="checke"></div></router-link>
            <!-- <router-link tag='li' to='/dataBankLuggageList'><div >行李清单<input type="checkbox" class="checke"></div></router-link> -->
            <router-link tag='li' to='/journey'><div >行程<input type="checkbox" class="checke"></div></router-link>
            <router-link tag='li' to='/study'><div >学习工作纸<input type="checkbox" class="checke"></div></router-link>
            <!-- <router-link tag='li' to='/'><div >每日记事<input type="checkbox" class="checke"></div></router-link> -->
            <router-link tag='li' to='/topic'><div >自我评估<input type="checkbox" class="checke"></div></router-link>
            <router-link tag='li' to='/dataBankSelfPerception'><div >自我感想<input type="checkbox" class="checke"></div></router-link>
        </ul>
    </div>
</template>
<script type="text/javascript" src="./../../bootstrap/js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="./../../bootstrap/js/bootstrap.min.js"></script>
<script>
	export default{
        

	}
</script>