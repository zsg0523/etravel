import router from './routes.js';
import Vue from 'vue';
import store from './store';
import ajax from './http';
import config from './config';
import VueI18n from 'vue-i18n';
import cn from './lang/cn';
import hk from './lang/hk';
import en from './lang/en';
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
  Vue.use(VueI18n);

const i18n = new VueI18n({
    locale: 'hk',    // 语言标识
    //this.$i18n.locale // 通过切换locale的值来实现语言切换
    messages: {
      'cn': cn,   // 中文简体
      'hk': hk,   // 中文繁体
      'en': en,    // 英文
    }
});

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
	i18n,
}).$mount('#app');