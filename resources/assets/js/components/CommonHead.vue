<style>
	.commonHead{width: 100%;height: 116px;background-color: #ffde01;color: 000;}     
    .left{width: 160px;height: 116px;align-items: center;justify-content: center;float:left;}
    .left:hover{cursor: pointer;}
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
	    <div class="left disflex" @click="$router.push('/home')">
	        <img src="/etravel/public/images/logo.png">
	    </div>
	    <div class="right disflex">
	        <div class="letter disflex"><img src="/etravel/public/images/letter.png"></div>

	        <div class="person_icon disflex" v-if="userInfo.avatar">
	        	<img :src="userInfo.avatar" @click="$router.push('/personalInfo')">
	        </div>
	        <div class="person_icon disflex" v-else>
				<img src="/etravel/public/images/poto-icon.png" @click="$router.push('/personalInfo')">
	        </div>
	        	
	        <div class="info disflex">
	            <div>{{userInfo.name}}</div>
	            <div>金幣：{{userInfo.tokens}}</div>
	            <!-- <div v-if="userInfo.manage_contents" onclick="window.location.assign('/admin')">管理系统</div> -->
	        </div>
	        <div class="exit disflex" @click="logout();">
	            <img src="/etravel/public/images/logout.png">
	        </div>
	    </div>
	</div>
</template>

<script>
	import { mapGetters } from 'vuex';
	import { mapActions } from 'vuex'
 	
 	export default {
 		data() {
	    	return {
	    	}
	  	},
	  	mounted:function(){
	  		this.getUserInfo();
	  	},
		methods:{
	 		...mapActions(['setUserInfo']),
	 		...mapActions(['setTravels']),
	  		...mapActions(['setToken']),
	  		getUserInfo(){
	  			// 获取用户基本信息
            	this.$get(this.$config+'/api/user?include=student.school',
            	{
	      			headers: {
			        	"Authorization": 'Bearer '+sessionStorage.token,
			    	}
			    }).then(res => {
		        	// console.log(res.data);
		        	this.setUserInfo(res.data);
		        }).catch(err => {
		          	console.log(err);
		          	this.$toast('登入失效');
		          	sessionStorage.clear();
					this.setUserInfo('');
					this.setTravels('');
					this.setToken('');
					this.$router.push("/");
		        });
	  		},
			logout(){
				this.$dialog.confirm({
                    title: '登出',
                    message: '是否登出'
                }).then(() => {
					sessionStorage.clear();
					this.setUserInfo('');
					this.setTravels('');
					this.setToken('');
					this.$router.push("/");
                }).catch(err => {

                });
			},
	  	},
	  	computed: {
	    	...mapGetters(['userInfo'])
	  	},
  	}
</script>