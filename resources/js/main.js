import Vue from 'vue'

window.Vue = require('vue');

Vue.component('twill-devtools', require('./TwillDevtools.vue').default)

const app = new Vue({
  el: '#twill-devtools',
});