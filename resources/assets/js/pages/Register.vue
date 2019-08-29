<style scoped>
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
    .login>div{width:70%;height: 60px;color: #000;}
    .title{font-size: 25px;font-weight: bold;line-height: 60px;}
    .login>div input{width: 100%;height:50px;border:none;outline: none;background: #fff;border-radius: 8px;padding-left: 8px;font-size: 16px;}
    .login>div a{color: #000;font-size: 14px;}
    .login>div button{width: 100%;height: 50px;line-height: 50px;border: none;outline: none;background-color: #fff;border-radius: 8px;font-weight: bold;font-size: 16px;}
    .sel{width: 100%;height:50px;border:none;outline: none;background: #fff;border-radius: 8px;padding-left: 3px;font-size: 16px;}
    .sel>option{width:100%;height: 50px;line-height: 50px;}
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
                <div class="title tc">Study2go</div>
                <div><input type="text" :placeholder="$t('register.username')" v-model="username"></div>
                <div><input type="text" :placeholder="$t('register.en_name')" v-model="en_name"></div>
                <div>
                    <div class="areaSel">
                        <AreaCodeSelector @selectedAreaCode='selectedAreaCode' :areaCode='idd_code' v-model='idd_code'></AreaCodeSelector>
                    </div>
                </div>
                <div><input type="text" :placeholder="$t('register.phoneNumber')" v-model="phoneNumber"></div>
                <div class="disflex" style="justify-content: space-between;">
                    <input type="text" :placeholder="$t('register.smscode')" v-model="smscode" style="width: 56%;">
                    <button class="tc" id="sendCode" @click='getCode()' :disabled="disabled || time > 0">{{text}}</button>
                </div>
                <div><input type="password" :placeholder="$t('register.password')" v-model="password"></div>
                <div><input type="password" :placeholder="$t('register.repassword')" v-model="repassword"></div>  
                <div style="height: 40px;"><a href="javascript:void(0);" @click="$router.push('/');" class="fl">{{$t('register.toLogin')}}</a></div>
                <div><button type="button" @click="register();">{{$t('register.register')}}</button></div>
            </div>
        </div>
    </div>
</template>
<!--  <select class="tel_input selectBox" id="areaCode" name="interest" lay-filter="aihao">
				 <option value="673" selected="">Brunei+673</option>
				 <option value="49">Germany+49</option>
				 <option value="39">Italy+39</option>
				 <option value="81">Japan+81</option>
				 <option value="82">South Korea+82</option>
				 <option value="1473">United Kingdom+1473</option>
				 <option value="86" selected="">中国大陆+86</option>
				 <option value="852">中国香港+852</option>
				 <option value="886">中国台湾+886</option>
				 <option value="853">中国澳门+853</option>
			 </select> -->
<script>
    import AreaCodeSelector from '../components/AreaCodeSelector.vue';

	export default {
	  	components: {
            AreaCodeSelector,
        },
	  	data() {
	    	return {
	    		username:'',
	    		en_name:'',
	    		idd_code:'',
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
		      	if (this.password && this.username && this.en_name && this.repassword && this.smscode) {
		      		if(this.password == this.repassword){
		      			this.$post(this.$config+'/api/users', {
				          	name: this.username,
				          	en_name: this.en_name,
				          	idd_code: this.idd_code,
				          	phoneNumber: this.phoneNumber,
				          	password: this.password,
				          	verification_code: this.smscode,
				          	verification_key: this.key,
				        }).then(res => {
				        	console.log(res.data);
				        	// this.$toast('数据');
				          	if (res.data.meta.access_token) {
				            	// this.setUserInfo(res)
				            	this.$toast(this.$t('register.regSuccess'));
				            	this.$router.push('/');
				          	} else {
				              	this.$toast(res.data.message);
				          	}
				        }).catch(err => {
				          	console.log(err);
				          	if(err.response.data.errors){
				          		for(var key in err.response.data.errors){
									this.$toast(err.response.data.errors[key][0]);
								}
			          		}
				        });
		      		}else{
		      			this.$toast(this.$t('register.passwordErr'));
		      			this.repassword='';
		      		}
		      	} else {
		        	this.$toast(this.$t('register.contentErr'));
		      	}
		    },
		    getCode() {
		    	if (this.phoneNumber&&this.idd_code) {
		        	axios.post(this.$config+'/api/verificationCodes', {
			          	phone: this.phoneNumber,
			          	idd_code:this.idd_code,
			        }).then(res => {
			        	console.log(res.data);
			          	if (res.data.key) {
			            	// this.setUserInfo(res)
		    				this.run();
			            	this.key=res.data.key;
			            	this.$toast(this.$t('register.codeMsg'));
			          	} else {
			              	this.$toast(res.data.message);
			          	}
			        }).catch(err => {
			          	console.log(err);
			          	if(err.response.data.errors){
			          		for(var key in err.response.data.errors){
								this.$toast(err.response.data.errors[key][0]);
							}
			          	}
			          	
			        });
		      	} else {
		        	this.$toast(this.$t('register.phoneErr'));
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
			selectedAreaCode(value){
               	this.idd_code=value;
            },
	  	},
	  	computed: {
	        text() {
	            return this.time > 0 ? this.time + 's'+this.$t('register.laveTime') : this.$t('register.getCode');
	        }
	    }
	}
</script>