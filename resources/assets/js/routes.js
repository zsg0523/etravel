import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        // {
        //     path: '/',
        //     name: 'head',
        //     component: Vue.component( 'v-head', require( './pages/Head.vue' ) )
        // },
        {
            path: '/',
            name: 'login',
            component: Vue.component( 'login', require( './pages/Login.vue' ) )
        },
        {
            path: '/home',
            name: 'home',
            component: Vue.component( 'home', require( './pages/Login.vue' ) )
        },
        {
            path: '/register',
            name: 'register',
            component: Vue.component( 'register', require( './pages/Register.vue' ) )
        },
        // {
        //     path: '/forgotPsd',
        //     name: 'forgotPsd',
        //     component: Vue.component( 'forgotPsd', require( './pages/ForgotPsd.vue' ) )
        // },
       
    ]
});
