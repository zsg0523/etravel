import router from './routes.js';
import Vue from 'vue';
import store from './store';
import ajax from './http';
import config from './config'
import {
  Popup,
  Button,
  Toast,
  Dialog,
  Uploader,
  DatetimePicker,
  Loading,
} from 'vant';

Vue
	.use(Popup)
	.use(Button)
	.use(Toast)
	.use(Dialog)
	.use(Uploader)
	.use(Loading)
	.use(DatetimePicker);

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