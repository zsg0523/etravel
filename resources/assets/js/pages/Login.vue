<style>
	.main{width: 100%;height: 100vh;align-items: center;justify-content: center;}
    .content{width: 900px;height:500px;border-radius:10px;box-shadow: 0 0 10px #ccc;background-color: #ffde01;}
    .icon{width: 50%;height:500px;border-right: 1px solid #fff;align-items: center;justify-content: center;}
    .icon>img{width: 300px;}
    .login{width: 50%;height:500px;flex-flow:column nowrap;align-items: center;justify-content: center;}
    .login>div{width:70%;height: 70px;color: #000;}
    .title{font-size: 25px;font-weight: bold;}
    .login>div input{width: 100%;height:50px;border:none;outline: none;background: #fff;border-radius: 8px;padding-left: 8px;font-size: 16px;}
    .login>div a{color: #000;font-size: 16px;}
    .login>div button{width: 100%;height: 50px;border: none;outline: none;background-color: #fff;border-radius: 8px;font-weight: bold;font-size: 16px;}
</style>

<template>
	<div class="disflex main">
        <div class="disflex content">
            <div class="disflex icon">
                <img src="../../images/logo_big.png">
            </div>
            <div class="disflex login">
                <div class="title tc">后台系统</div>
                <div><input type="text" v-model="loginName" placeholder="用户名或手机号" ></div>
                <div><input type="password" v-model="password" placeholder="密码" ></div>
                <div style="height: 40px;">
                	<a href="javascript:void(0);" @click="$router.push('/register')" class="fl">立即注册</a>
                	<a href="javascript:void(0);" @click="$router.push('/forgotPsd')" class="fr">忘记密码</a>
                </div>
                <div><button type="button" @click="login();">登录</button></div>
            </div>
        </div>
    </div>
</template>

<script>
	  export default {
	  	data() {
	    	return {
	      	loginName: '',
	      	password: ''
	    	}
	  	},
	  	methods: {
	    login() {
	      	if (this.password && this.loginName) {
	        	axios.post('/api/authorizations', {
		          	username: this.loginName,
		          	password: this.password
		        }).then(res => {
		        	console.log(res.data);
		        	// this.$toast('数据');
		          	if (res.data.access_token) {
		            	// this.setUserInfo(res)
		            	this.$toast('密码正确');
		            	this.$router.push('/home');
		          	} else {
			            // if (res.message) {
			            //   	this.$toast(res.message)
			            // } else {
			              	this.$toast('账号或密码错误')
			              	this.password = ''
			            // }
		          	}
		        }).catch(err => {
		          	console.log(err)
		        });
	      	} else {
	        	this.$toast('请填写账号密码');
	        	// alert('请填写账号密码');
	      	}
	    }
	  }
	}
</script>