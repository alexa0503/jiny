
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

//Vue.component('list', require('./components/Page.vue'));
//Vue.component('index', require('./components/page/Index.vue'));
Vue.component('pagination', require('laravel-vue-pagination'));

import VueRouter from 'vue-router';
import pageIndex from './components/page/Index.vue';
import pageCreate from './components/page/Create.vue';
import pageEdit from './components/page/Edit.vue';
import menu from './components/Menu.vue';
import index from './components/Index.vue';
Vue.use(VueRouter);
let router = new VueRouter({
    hashbang: false,
    history: true,
    mode: 'history',
    routes: [
        {
            path: '/admin/dashboard',
            name: 'index',
            components:{
                default:index,
                menu:menu
            }
        },
        {
            path: '/admin/page',
            name: 'pageIndex',
            components:{
                default:pageIndex,
                menu:menu
            }
        },
        {
            path: '/admin/page/trashed',
            name: 'pageIndexTrashed',
            components:{
                default:pageIndex,
                menu:menu
            }
        },
        {
            path: '/admin/page/create',
            components:{
                default:pageCreate,
                menu:menu
            },
            name: 'pageCreate'
        },
        {
            path: '/admin/page/:id/edit',
            components:{
                default:pageEdit,
                menu:menu
            },
            name: 'pageEdit'
        }
    ]
})

window.axios.interceptors.response.use(
    response => {
        return response;
    },
    error => {
        if (error.response) {
            switch (error.response.status) {
                case 401:
                window.location.href = '/login'
            }
        }
        return Promise.reject(error)   // 返回接口返回的错误信息
    }
);
const app = new Vue({
    el: '#wrapper',
    router
});
