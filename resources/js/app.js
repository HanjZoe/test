// /**
//  * First we will load all of this project's JavaScript dependencies which
//  * includes Vue and other libraries. It is a great starting point when
//  * building robust, powerful web applications using Vue and Laravel.
//  */
// require('./bootstrap');
//
// window.Vue = require('vue').default;
//
// require('./components/UI/index');
// /**
//  * The following block of code may be used to automatically register your
//  * Vue components. It will recursively scan this directory for the Vue
//  * components and automatically register them with their "basename".
//  *
//  * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
//  */
//
// // const files = require.context('./', true, /\.vue$/i)
// // files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
//
// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('adminuserindex', require('./components/Pages/AdminUserIndex.vue').default);
//
//
// /**
//  * Next, we will create a fresh Vue application instance and attach it to
//  * the page. Then, you may begin adding components to this application
//  * or customize the JavaScript scaffolding to fit your unique needs.
//  */
//
// const app = new Vue({
//     el: '#app',
// });
//require('./bootstrap');
import { createApp } from 'vue'
import AdminUserIndex from "./components/Pages/Admin/Users/AdminUserIndex"
import ShowUser from "./components/Pages/Admin/Users/ShowUser"
import components from './components/UI/index'
import IndexComponent from "./components/IndexComponent";
import './bootstrap'
import router from "./router/router";
import {createRouter, createWebHistory} from "vue-router";
//Vue.component('adminuserindex', require('./components/Pages/AdminUserIndex.vue').default)

const app = createApp(app);

components.forEach(component => {
    app.component(component.name, component)
})
app.component('adminuserindex', AdminUserIndex).component('showuser', ShowUser).component('index-component', 'IndexComponent');

app
    .use(router)
    .mount('#app');
