/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import 'vue-search-select/dist/VueSearchSelect.css';
require('./bootstrap');

window.Vue = require('vue');


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
import locationComponent from './components/LocationComponent.vue';
import FlashComponent from './components/Flash.vue';
import AjaxSelect2Component from './components/AjaxSelect2.vue';
import Select2Component from './components/Select2.vue';

Vue.component('location-component', locationComponent);

Vue.component('flash', FlashComponent);

Vue.component('ajax-select2', AjaxSelect2Component);

Vue.component('select2', Select2Component);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


const app = new Vue({
    el: '#app',
});


