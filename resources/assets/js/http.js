import axios from 'axios';
import store from './store';

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}
let instance = axios.create({
  	responseType: 'json',
  	timeout: 30000,
  	headers: {
    	Accept: 'application/json'
  	},
});
export default instance