<style scoped>
	.mainLogin{width: 100%;height: 100vh;align-items: center;justify-content: center;}
    .contentLogin{width: 900px;height:570px;border-radius:10px;box-shadow: 0 0 10px #ccc;background-color: #ffde01;}
    .icon{width: 50%;height:570px;border-right: 1px solid #fff;align-items: center;justify-content: center;}
    .icon>img{width: 300px;}
    .login{width: 50%;height:500px;flex-flow:column nowrap;align-items: center;justify-content: center;}
    .login>div{width:70%;height: 70px;color: #000;}
    .title{font-size: 25px;font-weight: bold;}
    .login>div input{width: 100%;height:50px;border:none;outline: none;background: #fff;border-radius: 8px;padding-left: 8px;font-size: 16px;}
    .login>div a{color: #000;font-size: 16px;}
    .login>div button{width: 100%;height: 50px;border: none;outline: none;background-color: #fff;border-radius: 8px;font-weight: bold;font-size: 16px;}
</style>

<template>
	<div class="disflex mainLogin">
        <div class="disflex contentLogin">
            <div class="disflex icon">

                <img src="/etravel/public/images/logo_big.png">

            </div>
            <div class="disflex login">
                <div class="title tc">Study2go</div>
                <div><input type="text" v-model="loginName" :placeholder="$t('login.loginNameP')" ></div>
                <div><input type="password" v-model="password" :placeholder="$t('login.loginpasswordP')" ></div>
                <div style="height: 40px;">
                	<a href="javascript:void(0);" @click="$router.push('/register')" class="fl">{{$t('login.register')}}</a>
                	<!-- <a href="javascript:void(0);" @click="$router.push('/forgotPsd')" class="fr">忘记密码</a> -->
                </div>
                <div><button type="button" @click="login();">{{$t('login.login')}}</button></div>
            </div>
        </div>
        <van-loading 
	        class="loading"
	        type="spinner"
	        :style="{display:isLoading,position:'fixed',top: '50%',left: '50%',zIndex: '20000'}"
	        size="50px"
	        text-size="25px"
	        color="#333">
		</van-loading>
    </div>
</template>

<script>
	import { mapActions } from 'vuex';

  	export default {
	  	data() {
	    	return {
	      		loginName: '',
	      		password: '',
	      		isLoading:'none',
	    	}
	  	},
	  	methods: {
	  		...mapActions(['setUserInfo']),
	  		...mapActions(['setToken']),
		    login() {
		      	if (this.password && this.loginName) {
		      		this.isLoading='block';
		        	this.$post(this.$config+'/api/authorizations', {
			          	username: this.loginName,
			          	password: this.password
			        }).then(res => {
			        	// console.log(res.data);
			          	if (res.data.access_token) {
			          		this.setToken(res.data.access_token);
			          		// console.log(res.data.access_token);
			          		// 获取用户基本信息
			            	this.$get(this.$config+'/api/user?include=student.school',
			            	{
				      			headers: {
						        	"Authorization": 'Bearer '+sessionStorage.token,
						    	}
						    }).then(res => {
						    	this.isLoading='none';
					        	// console.log(res.data);
					        	this.setUserInfo(res.data);
					        	sessionStorage.setItem('userId', res.data.id);
				            	// this.$toast('密码正确');
				            	setTimeout(() => {
					                this.$router.push("/home");      
					            },1000);
			            		
					        }).catch(err => {
					        	this.isLoading='none';
					        	this.$toast(this.$t('login.loginErr'));
					          	console.log(err);
					        });
			            	
			          	} else {
			          		this.isLoading='none';
			              	this.$toast(this.$t('login.loginErr'))
			              	this.password = ''
			          	}
			        }).catch(err => {
			        	this.isLoading='none';
			        	this.$toast(err.response.data.message);
			          	console.log(err);
			        });
		      	} else {
		        	this.$toast(this.$t('login.formErr'));
		      	}
		    },
	  	}
	}
</script>