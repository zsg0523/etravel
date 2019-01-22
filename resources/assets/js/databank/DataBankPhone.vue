<style>
	.commonHead{width: 100%;height: 116px;background-color: #ffde01;color: 000;}     
    .left{width: 160px;height: 116px;align-items: center;justify-content: center;float:left;}
    .right{width: 360px;height: 116px;float: right;align-items: center;justify-content:center;}
    .right>div{height: 116px;}
    .letter{width: 60px;align-items: center;justify-content: center;}
    .letter>img{width: 40px;height: 40px;}
    .person_icon{width: 100px;align-items: center;justify-content: center;}
    .person_icon>img{width: 70px;height: 70px;border-radius: 50%;}
    .info{width: 80px;align-items: center;justify-content: center;flex-direction: column;}
    .info>div{width: 100%;height: 30px;line-height: 30px;text-align:center;overflow: hidden;}
    .exit{width: 60px;align-items: center;justify-content: center;}
    .exit>img{width: 50px;}
</style>

<template>
	<div class="commonHead">
	    <div class="left disflex">
	        <img src="../../images/logo.png">
	    </div>
	    <div class="right disflex">
	        <div class="letter disflex"><img src="../../images/letter.png"></div>
	        <div class="person_icon disflex"><img src="../../images/photo.png"></div>
	        <div class="info disflex">
	            <div>qully</div>
	            <div>积分：0</div>
	        </div>
	        <div class="exit disflex">
	            <img src="../../images/Vector-icon.png">
	        </div>
	    </div>
	</div>
</template>

<script>
  export default {

  }
</script>