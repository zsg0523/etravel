<style>
    .linkSchool{width: 100%;min-height: 700px;justify-content: space-around;align-items:center;flex-direction: row;}
    .schoolInput{width: 450px;height: 200px;border-radius: 15px;}
    .link_input_icon{width: 450px;height: 50px;background-color: #e7e7e7;border-top-left-radius: 15px;border-top-right-radius: 15px;justify-content: flex-start;align-items:center;}
    .link_input_icon>img{width: 30px;height: 30px;margin-left: 20px;}
    .link_input_icon>span{font-size: 16px;}
    .linkDetail_info{width: 450px;height: 60px;background-color: #ffde01;line-height: 50px;font-size: 18px;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;text-indent: 5px;}
    .linkDetail_info>div{width: 90%;height:60px;margin-left: 5%;justify-content: flex-start;align-items:center;}
    .linkDetail_info>div>input{width: 65%;height: 40px;outline: none;border: none;background-color: #fff;border-top-left-radius: 8px;border-bottom-left-radius: 8px;}
    .linkDetail_info>div>button{width: 35%;height: 40px;outline: none;border: none;background-color: #ccc;border-top-right-radius: 8px;border-bottom-right-radius: 8px;font-size: 16px;line-height: 40px;}
</style>

<template>
	<div class="linkSchool disflex">
        <div class="schoolInput">
            <div class="link_input_icon disflex">
                <img src="/etravel/public/images/write-icon.png">
                <span>(请填写学校)</span>
            </div>
            <div class="linkDetail_info">
                <div class="disflex">
                    <input type="text" name="" value="">
                    <button>确定</button>    
                </div>
            </div>
        </div>
    </div>
</template>

<script>
	export default{


	}
</script>