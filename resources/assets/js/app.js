import router from './routes.js';
import Vue from 'vue';
import store from './store';
import ajax from './http';
import config from './config'
import {
  Popup,
  Toast,
  Dialog,
  Uploader,
} from 'vant';

Vue
	.use(Popup)
	.use(Toast)
	.use(Dialog)
	.use(Uploader);

require('./bootstrap');

Vue.prototype.$config = config;
Vue.prototype.sessionStorage = sessionStorage;
Vue.prototype.localStorage = localStorage; 
Vue.prototype.$ajax = ajax;
Vue.prototype.$get = ajax.get;
Vue.prototype.$post = ajax.post;
new Vue({
	router,
	store,
}).$mount('#app');