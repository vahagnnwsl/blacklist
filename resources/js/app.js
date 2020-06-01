/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import VeeValidate, { Validator } from "vee-validate";
import ru from 'vee-validate/dist/locale/ru';


require('./bootstrap');

window.Vue = require('vue');
Vue.use(VeeValidate);
Validator.localize('ru', ru);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('profile-content', require('./components/profile/Content').default);
// Vue.component('account-content', require('./components/account/Content').default);
Vue.component('profile-page', require('./pages/ProfilePage').default);

Vue.component('arendator-page', require('./pages/ArendatorPage').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
// window.Event = new Vue();
const app = new Vue({
    el: '#app',
});
