
<style>
    .main{flex-direction: column;align-items: center;justify-content: flex-start;}
    .content{width: 90%;min-height: 700px;border-radius: 20px;box-shadow: 0 0 15px #ccc;background-color: #fff;}
    .dataBank{width: 100%;min-height: 700px;justify-content: flex-start;align-items:center;flex-direction: column;background-color: #fff;}
    .dataBankList{width: 100%;height: 100%;align-content: flex-start;flex-direction: row;}
    .dataBank_left{width: 18%;min-height:100%;border-right: 3px solid #d6d6d6;}
    .dataBank_left>ul{width: 100%;height: auto;}
    .dataBank_left>ul>li{width: 100%;height:50px;line-height: 50px;font-size: 16px;}
    .dataBank_left>ul>li>div{width: 90%;height:50px;line-height: 50px;margin-left: 5%;}
    .dataBank_right{width: 82%;min-height:100%;justify-content: flex-start;align-items:center;flex-direction: column;}
</style>

<template>
    <div class="main disflex" style="background-color: #e7e7e7;min-height: 100vh;color: #000;"id="app-home">
        <CommonHead></CommonHead>
        <HistoryLink></HistoryLink>
        <div class="content">
            <div class="dataBank disflex">
                <div class="dataBankList disflex">
                    <CommonLeft></CommonLeft>
                    <div class="dataBank_right disflex">
                        <router-view></router-view>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import CommonHead from '../components/CommonHead.vue';
    import HistoryLink from '../components/HistoryLink.vue';
    import CommonLeft from '../components/CommonLeft.vue';
    
    export default {
        components: {
            CommonHead,
            HistoryLink,
            CommonLeft,
        },
        mounted(){
            var obj=[{link:'/home',linkName:'项目'},{link:'/projectDetail/'+sessionStorage.actTravelId,linkName:'项目详情'}];
            sessionStorage.setItem("links",JSON.stringify(obj));
        }
    }
</script> 