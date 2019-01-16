import router from './routes.js';
import Vue from 'vue';
import {
  Popup,
  Toast,
  Dialog
} from 'vant';

Vue
	.use(Popup)
	.use(Toast)
	.use(Dialog);

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

require('./bootstrap');

new Vue({
	router
}).$mount('#app');