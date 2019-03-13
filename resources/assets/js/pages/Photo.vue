<style type="text/css">
    .photos{width: 100%;min-height: 700px;justify-content: center;align-items:center;flex-direction: row;position: relative;}
    .photo_list{width: 90%;min-height:600px;align-content: flex-start;}
    .photo_img{width: 100px;height:100px;border-radius: 10px;margin: 10px;border:1px solid #ccc;}
    .photo_img>img{width: 100%;height: 100%;border-radius: 10px;}
    .del_icon{width: 60px;height: 60px;position: absolute;right: 50px;top:50px;z-index: 5;}
    .del_icon>img{width: 60px;height: 60px;}
</style>

<template>
    <div class="photos disflex">
        <div class="del_icon">
            <img src="/etravel/public/images/rush-icon.png">
        </div>
        <div class="photo_list disflex">
            <div class="photo_img">
                <img src="/etravel/public/images/school.png" alt="">
            </div>
            <div class="photo_img">
                <img src="/etravel/public/images/school.png" alt="">
            </div>
            <div class="photo_img">
                <img src="/etravel/public/images/school.png" alt="">
            </div>
            <div class="photo_img">
                <img src="/etravel/public/images/school.png" alt="">
            </div>
            <div class="photo_img">
                <img src="/etravel/public/images/school.png" alt="">
            </div>
            <div class="photo_img">
                <img src="/etravel/public/images/school.png" alt="">
            </div>
        </div>
    </div>
</template>
<script>
	export default{

	}
</script>