<style>
	.main{width: 100%;height: 100vh;align-items: center;justify-content: center;}
    .disflex{display: -webkit-flex;display: flex;}
    .tc{text-align: center;}
    .fl{float: left;}
    .fr{float: right;}
    a:hover{text-decoration: none;}
    .contentReg{width: 900px;height:570px;border-radius:10px;box-shadow: 0 0 10px #ccc;background-color: #ffde01;}
    .icon{width: 50%;height:570px;border-right: 1px solid #fff;align-items: center;justify-content: center;}
    .icon>img{width: 300px;}
    .login{width: 50%;height:570px;flex-flow:column nowrap;align-items: center;justify-content: center;}
    .login>div{width:70%;height: 70px;color: #000;}
    .title{font-size: 25px;font-weight: bold;}
    .login>div input{width: 100%;height:50px;border:none;outline: none;background: #fff;border-radius: 8px;padding-left: 8px;font-size: 16px;}
    .login>div a{color: #000;font-size: 14px;}
    .login>div button{width: 100%;height: 50px;border: none;outline: none;background-color: #fff;border-radius: 8px;font-weight: bold;font-size: 16px;}
    #sendCode{width:40%;height: 50px;line-height: 50px;font-size: 16px;background-color: #fff;border-radius: 8px;outline: none;border: none;}
    #sendCode:hover{cursor: pointer;}
</style>

<template>
	<div class="disflex main">
        <div class="disflex contentReg">
            <div class="disflex icon">
                <img src="/etravel/public/images/logo_big.png">
            </div>
            <div class="disflex login">
                <div class="title tc">A-Team-Travel</div>
                <div><input type="text" placeholder="用户名" v-model="username"></div>
                <div><input type="text" placeholder="区号" v-model="areaCode"></div>
                <div><input type="text" placeholder="手机号" v-model="phoneNumber"></div>
                <div class="disflex" style="justify-content: space-between;">
                    <input type="text" placeholder="验证码" v-model="smscode" style="width: 56%;">
                    <button class="tc" id="sendCode" @click='getCode()' :disabled="disabled || time > 0">{{text}}</button>
                </div>
                <div><input type="password" placeholder="密码" v-model="password"></div>
                <div><input type="password" placeholder="确认密码" v-model="repassword"></div>  
                <div style="height: 40px;"><a href="javascript:void(0);" @click="$router.push('/');" class="fl">已有账号？立即登录</a></div>
                <div><button type="button" @click="register();">注册</button></div>
            </div>
        </div>
    </div>
</template>

<script>
	  export default {
	  	data() {
	    	return {
	    		username:'',
	    		areaCode:'',
		      	phoneNumber: '',
		      	smscode:'',
		      	password: '',
		      	repassword:'',
		      	key:'',
		      	time: 0,
       		 	disabled:false,
	    	}
	  	},
	  	methods: {
		    register() {
		      	if (this.password && this.username && this.repassword && this.smscode) {
		      		if(this.password == this.repassword){
		      			this.$post(this.$config+'/api/users', {
				          	name: this.username,
				          	password: this.password,
				          	verification_code: this.smscode,
				          	verification_key: this.key,
				        }).then(res => {
				        	console.log(res.data);
				        	// this.$toast('数据');
				          	if (res.data.meta.access_token) {
				            	// this.setUserInfo(res)
				            	this.$toast('注册成功');
				            	this.$router.push('/');
				          	} else {
				              	this.$toast(res.data.message);
				          	}
				        }).catch(err => {
				          	console.log(err)
				        });
		      		}else{
		      			this.$toast('两次密码不一致！');
		      			this.repassword='';
		      		}
		      	} else {
		        	this.$toast('请填写完整信息');
		      	}
		    },
		    getCode() {
		    	if (this.phoneNumber&&this.areaCode) {
		    		this.run();
		        	axios.post(this.$config+'/api/verificationCodes', {
			          	phone: this.phoneNumber,
			          	idd_code:this.areaCode,
			        }).then(res => {
			        	console.log(res.data);
			          	if (res.data.key) {
			            	// this.setUserInfo(res)
			            	this.key=res.data.key;
			            	this.$toast('验证码已成功发送，请注意查收。');
			          	} else {
			              	this.$toast(res.data.message);
			          	}
			        }).catch(err => {
			          	console.log(err)
			        });
		      	} else {
		        	this.$toast('请填写手机区号和号码');
		      	}
		    },
		    run() {
		    	this.time=60;
		    	this.timer();
        	},
        	setDisabled: function(val){
         		this.disabled = val;
        	},
        	timer() {
            	if (this.time > 0) {
                	this.time--;
					this.disabled = true;
                	setTimeout(this.timer, 1000);
            	}else{
             		this.disabled = false;
					this.time=0;
            	}
        	},
	  	},
	  	computed: {
	        text() {
	            return this.time > 0 ? this.time + 's 后重获取' : '获取验证码';
	        }
	    }
	}
</script>