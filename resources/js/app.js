
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

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('welcome-component', require('./components/WelcomeComponent.vue').default);
Vue.component('sidenav-component', require('./components/SidenavComponent.vue').default);

Vue.component('appointment-component', require('./components/AppointmentComponent.vue').default);
Vue.component('single-appointment', require('./components/SingleAppointment.vue').default);
Vue.component('create-appointment', require('./components/CreateAppointment.vue').default);

Vue.component('pets-component', require('./components/PetsComponent.vue').default);


Vue.component('clients-component', require('./components/ClientsComponent.vue').default);
Vue.component('single-client', require('./components/SingleClient.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});
