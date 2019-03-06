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
            path: '/personal',
            name: 'personal',
            component: Vue.component( 'personal', require( './personal/Personal.vue' ) ),
            children:[
                {
                    path: '/personalInfo',
                    name: 'personalInfo',
                    component: Vue.component( 'personalInfo', require( './personal/PersonalInfo.vue' ) ),
                },
                {
                    path: '/personalSetting',
                    name: 'personalSetting',
                    component: Vue.component( 'personalSetting', require( './personal/PersonalSetting.vue' ) ),
                },
                {
                    path: '/personalCoin',
                    name: 'personalCoin',
                    component: Vue.component( 'personalCoin', require( './personal/PersonalCoin.vue' ) ),
                },
                {
                    path: '/personalInformation',
                    name: 'personalInformation',
                    component: Vue.component( 'personalInformation', require( './personal/PersonalInformation.vue' ) ),
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
                    path: '/dataBankPhone',
                    name: 'dataBankPhone',
                    component: Vue.component( 'dataBankPhone', require( './databank/DataBankPhone.vue' ) ),
                },
                {
                    path: '/rule',
                    name: 'rule',
                    component: Vue.component( 'rule', require( './components/Rule.vue' ) ),
                    redirect: '/rule/dataBankRules',
                    children:[
                        {
                            path: '/rule/dataBankRules',
                            name: 'dataBankRules',
                            component: Vue.component( 'dataBankRules', require( './databank/DataBankRules.vue' ) ),
                        },
                        {
                            path: '/rule/dataBankRulesInfo/:id',
                            name: 'dataBankRulesInfo',
                            component: Vue.component( 'dataBankRulesInfo', require( './databank/DataBankRulesInfo.vue' ) ),
                        },
                    ],
                },
                {
                    path: '/promise',
                    name: 'promise',
                    component: Vue.component( 'promise', require( './components/Promise.vue' ) ),
                    redirect: '/promise/dataBankPromises',
                    children:[
                        {
                            path: '/promise/dataBankPromises',
                            name: 'dataBankPromises',
                            component: Vue.component( 'dataBankPromises', require( './databank/DataBankPromises.vue' ) ),
                        },
                        {
                            path: '/promise/dataBankPromisesInfo/:id',
                            name: 'dataBankPromisesInfo',
                            component: Vue.component( 'dataBankPromisesInfo', require( './databank/DataBankPromisesInfo.vue' ) ),
                        },
                    ],
                },
                // {
                //     path: '/dataBankPromise',
                //     name: 'dataBankPromise',
                //     component: Vue.component( 'dataBankPromise', require( './databank/DataBankPromise.vue' ) ),
                // },
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
                    path: '/journey',
                    name: 'journey',
                    component: Vue.component( 'journey', require( './components/Journey.vue' ) ),
                    redirect: '/journey/dataBankJourney',
                    children:[
                        {
                            path: '/journey/dataBankJourney',
                            name: 'dataBankJourney',
                            component: Vue.component( 'dataBankJourney', require( './databank/DataBankJourney.vue' ) ),
                        },
                        {
                            path: '/journey/dataBankJourneyInfo/:id',
                            name: 'dataBankJourneyInfo',
                            component: Vue.component( 'dataBankJourneyInfo', require( './databank/DataBankJourneyInfo.vue' ) ),
                        },
                        {
                            path: '/journey/dataBankMealsInfo/:id',
                            name: 'dataBankMealsInfo',
                            component: Vue.component( 'dataBankMealsInfo', require( './databank/DataBankMealsInfo.vue' ) ),
                        },
                    ],
                },
                {
                    path: '/study',
                    name: 'study',
                    component: Vue.component( 'study', require( './components/Study.vue' ) ),
                    redirect: '/study/dataBankStudy',
                    children:[
                        {
                            path: '/study/dataBankStudy',
                            name: 'dataBankStudy',
                            component: Vue.component( 'dataBankStudy', require( './databank/dataBankStudy.vue' ) ),
                        },
                        {
                            path: '/study/dataBankStudySheet/:id',
                            name: 'dataBankStudySheet',
                            component: Vue.component( 'dataBankStudySheet', require( './databank/DataBankStudySheet.vue' ) ),
                        },
                        {
                            path: '/study/dataBankStudySheetInfo/:id',
                            name: 'dataBankStudySheetInfo',
                            component: Vue.component( 'dataBankStudySheetInfo', require( './databank/DataBankStudySheetInfo.vue' ) ),
                        },
                    ],
                },
                {
                    path: '/dataBankLocalCulture',
                    name: 'dataBankLocalCulture',
                    component: Vue.component( 'dataBankLocalCulture', require( './databank/DataBankLocalCulture.vue' ) ),
                },
                {
                    path: '/luggage',
                    name: 'luggage',
                    component: Vue.component( 'luggage', require( './components/Luggage.vue' ) ),
                    redirect: '/luggage/dataBankLuggageList',
                    children:[
                        {
                            path: '/luggage/dataBankLuggageList',
                            name: 'dataBankLuggageList',
                            component: Vue.component( 'dataBankLuggageList', require( './databank/dataBankLuggageList.vue' ) ),
                        },
                        {
                            path: '/luggage/dataBankLuggageListInfo/:id',
                            name: 'dataBankLuggageListInfo',
                            component: Vue.component( 'dataBankLuggageListInfo', require( './databank/dataBankLuggageListInfo.vue' ) ),
                        },
                    ],
                },
                {
                    path: '/topic',
                    name: 'topic',
                    component: Vue.component( 'topic', require( './components/Topic.vue' ) ),
                    redirect: '/topic/dataBankEvaluation',
                    children:[
                        {
                            path: '/topic/dataBankEvaluation',
                            name: 'dataBankEvaluation',
                            component: Vue.component( 'dataBankEvaluation', require( './databank/dataBankEvaluation.vue' ) ),
                        },
                        {
                            path: '/topic/dataBankEvaluationInfo/:id',
                            name: 'dataBankEvaluationInfo',
                            component: Vue.component( 'dataBankEvaluationInfo', require( './databank/DataBankEvaluationInfo.vue' ) ),
                        },
                    ],
                },
                {
                    path: '/dataBankSelfPerception',
                    name: 'dataBankSelfPerception',
                    component: Vue.component( 'dataBankSelfPerception', require( './databank/DataBankSelfPerception.vue' ) ),
                },
                {
                    path: 'answer',
                    name: 'answer',
                    component: Vue.component( 'answer', require( './components/Answer.vue' ) ),
                    redirect: '/answer/dataBankAnswerList',
                    children:[
                        {
                            path: '/answer/dataBankAnswerList',
                            name: 'dataBankAnswerList',
                            component: Vue.component( 'dataBankAnswerList', require( './databank/DataBankAnswerList.vue' ) ),
                        },
                        {
                            path: '/answer/DataBankAnswerInfo/:id',
                            name: 'DataBankAnswerInfo',
                            component: Vue.component( 'DataBankAnswerInfo', require( './databank/DataBankAnswerInfo.vue' ) ),
                        },
                    ],
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