import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

const router = new VueRouter({
    routes: [
        {
            path: '/',
            name: 'login',
            component: Vue.component( 'login', require( './pages/Login.vue' ) ),
            meta: { through: true },
        },
        {
            path: '/layout',
            name: 'layout',
            component: Vue.component( 'layout', require( './pages/Layout.vue' ) ),
            children:[
                {
                    path: '/home',
                    name: 'home',
                    component: Vue.component( 'home', require( './pages/Home.vue' ) )
                },
                {
                    path: '/projectDetail/:id',
                    name: 'projectDetail',
                    component: Vue.component( 'projectDetail', require( './pages/ProjectDetail.vue' ) )
                },
                {
                    path: '/photo',
                    name: 'photo',
                    component: Vue.component( 'photo', require( './pages/Photo.vue' ) )
                },
                {
                    path: '/students',
                    name: 'students',
                    component: Vue.component( 'students', require( './pages/Students.vue' ) )
                },
                {
                    path: '/linkSchool',
                    name: 'linkSchool',
                    component: Vue.component( 'linkSchool', require( './pages/LinkSchool.vue' ) )
                },
            ],
        },
        {
            path: '/dataBank',
            name: 'dataBank',
            component: Vue.component( 'dataBank', require( './databank/DataBank.vue' ) ),
            children:[
                {
                    path: '/dataBankInfo',
                    name: 'dataBankInfo',
                    component: Vue.component( 'dataBankInfo', require( './databank/DataBankInfo.vue' ) ),
                },
                {
                    path: '/dataBankGroup',
                    name: 'dataBankGroup',
                    component: Vue.component( 'dataBankGroup', require( './databank/DataBankGroup.vue' ) ),
                },
                {
                    path: '/dataBankHouseTable',
                    name: 'dataBankHouseTable',
                    component: Vue.component( 'dataBankHouseTable', require( './databank/DataBankHouseTable.vue' ) ),
                },
                {
                    path: '/dataBankJourney',
                    name: 'dataBankJourney',
                    component: Vue.component( 'dataBankJourney', require( './databank/DataBankJourney.vue' ) ),
                },
                {
                    path: '/dataBankJourneyInfo',
                    name: 'dataBankJourneyInfo',
                    component: Vue.component( 'dataBankJourneyInfo', require( './databank/DataBankJourneyInfo.vue' ) ),
                },
                {
                    path: '/dataBankLocalCulture',
                    name: 'dataBankLocalCulture',
                    component: Vue.component( 'dataBankLocalCulture', require( './databank/DataBankLocalCulture.vue' ) ),
                },
                {
                    path: '/dataBankLuggageList',
                    name: 'dataBankLuggageList',
                    component: Vue.component( 'dataBankLuggageList', require( './databank/DataBankLuggageList.vue' ) ),
                },
                {
                    path: '/dataBankMealsInfo',
                    name: 'dataBankMealsInfo',
                    component: Vue.component( 'dataBankMealsInfo', require( './databank/DataBankMealsInfo.vue' ) ),
                },
                {
                    path: '/dataBankPhone',
                    name: 'dataBankPhone',
                    component: Vue.component( 'dataBankPhone', require( './databank/DataBankPhone.vue' ) ),
                },
                {
                    path: '/dataBankPromise',
                    name: 'dataBankPromise',
                    component: Vue.component( 'dataBankPromise', require( './databank/DataBankPromise.vue' ) ),
                },
                {
                    path: '/dataBankRules',
                    name: 'dataBankRules',
                    component: Vue.component( 'dataBankRules', require( './databank/DataBankRules.vue' ) ),
                },
                {
                    path: '/dataBankRulesInfo',
                    name: 'dataBankRulesInfo',
                    component: Vue.component( 'dataBankRulesInfo', require( './databank/DataBankRulesInfo.vue' ) ),
                },
            ],
        },
        {
            path: '/register',
            name: 'register',
            component: Vue.component( 'register', require( './pages/Register.vue' ) ),
            meta: { through: true },
        },
        // {
        //     path: '/forgotPsd',
        //     name: 'forgotPsd',
        //     component: Vue.component( 'forgotPsd', require( './pages/ForgotPsd.vue' ) )
        // },
       
    ]
});

router.beforeEach((to, from, next) => {
    if (
        sessionStorage.token ||
        to.matched.some(record => record.meta.through)
    ) {
        next()
    } else {
        return next({ path: '/' })
    }
});

export default router