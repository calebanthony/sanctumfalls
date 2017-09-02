/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Pull in separate JS files for various functionality across the app
 */
if (document.querySelector('#lmb-toggle')) {
    require('./skillBuilder');
}

// Only initialize this on the tierlist page.
if (document.querySelector('#select1')) {
    require('./tierlist');
}

require('./tooltips');
require('./navbar');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
 // window.Vue = require('vue');

// Vue.component('SkillBuilder', require('./components/SkillBuilder.vue'));
//
// const app = new Vue({
//     el: '#app'
// });
