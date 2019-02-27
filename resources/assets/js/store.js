import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    userInfo: {},
    travels: {},
    token: '',
    links:[{link:'/home',linkName:'项目'}],
  },
  getters: {
    userInfo: state => state.userInfo,
    travels: state => state.travels,
    token: state => state.token,
  },
  mutations: {
    userInfo(state, theme) {
      state.userInfo = theme;
      sessionStorage.setItem('userId', theme.id)
    },
    travels(state, theme) {
      state.travels = theme
    },
    token(state, theme) {
      state.token = theme
      sessionStorage.setItem('token', theme)
    },
  },
  actions: {
    setUserInfo({ commit }, theme) {
      commit('userInfo', theme)
    },
    setTravels({ commit }, theme) {
      commit('travels', theme)
    },
    setToken({ commit }, theme) {
      commit('token', theme)
    },
  }
})
