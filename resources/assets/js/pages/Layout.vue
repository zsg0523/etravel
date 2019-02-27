<style>
	.main{flex-direction: column;align-items: center;justify-content: flex-start;}
	.content{width: 90%;min-height: 700px;border-radius: 20px;box-shadow: 0 0 15px #ccc;background-color: #fff;}
</style>

<template>
  	<div class="main disflex" style="background-color: #e7e7e7;min-height: 100vh;color: #000;"id="app-home">
        <CommonHead></CommonHead>
        <HistoryLink></HistoryLink>
        <div class="content">
        	<router-view></router-view> 
        </div>
 	</div>
</template>

<script>
	import CommonHead from '../components/CommonHead.vue';
	import HistoryLink from '../components/HistoryLink.vue';
	
  	export default {
  		components: {
        CommonHead,
        HistoryLink,
      },
      mounted(){
        var obj=[{link:'/home',linkName:'项目'}];
        sessionStorage.setItem("links",JSON.stringify(obj));
      }
  	}
</script>