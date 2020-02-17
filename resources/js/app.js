/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

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
import Vue from "vue";
import * as VueGoogleMaps from "vue2-google-maps";
import axios from 'axios'
import VueAxios from 'vue-axios'

Vue.use(VueAxios, axios);
Vue.use(VueGoogleMaps, {
    load: {
        key: "AIzaSyAbUQ8c9GCYUCSLi5DC71tDpJrXMet1fak",
        libraries: "places" // necessary for places input
    }
});
Vue.component('call-to-action', require('./components/CallToAction.vue').default);
Vue.component('footer-vue', require('./components/FooterVue.vue').default);
Vue.component('home-map', require('./components/HomeMap.vue').default);
Vue.component('google-map', require('./components/GoogleMap.vue').default);
Vue.component('detail-panel', require('./components/DetailsPanel.vue').default);
Vue.component('search-bar', require('./components/SearchBar.vue').default);
Vue.component('new-product-form', require('./components/NewProductForm.vue').default);
Vue.component('google-map-form', require('./components/GoogleMapForm.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});
