import Vue from 'vue'
import App from './App.vue'
import router from './router'
import bootstrapCss from '../node_modules/bootstrap/dist/css/bootstrap.min.css'
import Jquery from 'jquery'
window.$ = window.jQuery =Jquery
import popper from 'popper.js'
import bootstrapjs from '../node_modules/bootstrap/dist/js/bootstrap.min.js'
import iziTostCss from '../node_modules/izitoast/dist/css/iziToast.min.css'
import iziTostJs from '../node_modules/izitoast/dist/js/iziToast'

window.iziToast = iziTostJs;


import axios from 'axios';
window.axios = axios;
window.token = localStorage.getItem('AToken');
axios.defaults.baseURL = 'http://localhost/api-restfull/public/api';
axios.defaults.headers.common['Authorization'] = 'Bearer '+token;
axios.defaults.headers.post['Content-Type'] = 'application/json';
import { Form, HasError, AlertError } from 'vform'
window.Form = Form,
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

Vue.component('pagination', require('laravel-vue-pagination'));

Vue.config.productionTip = false

new Vue({
  router,
  render: h => h(App)
}).$mount('#app')
