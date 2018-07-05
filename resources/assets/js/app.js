
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('historial', require('./components/historial'));
Vue.component('perfil', require('./components/perfil'));

Vue.component('pasos', require('./components/pasos'));

Vue.component('paso1', require('./components/paso1'));
Vue.component('paso2', require('./components/paso2'));
Vue.component('paso3', require('./components/paso3'));
Vue.component('v-r', require('./components/vr'));




export let Bus = new Vue();

const app = new Vue({
    el: '#app'
});
