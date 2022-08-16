import { createStore } from 'vuex'

export default createStore({
  state: {
    userId: '',
    userToken: ''
  },
  getters: {
    getToken: state => state.userToken,
    getId : state => state.userId
  },
  mutations: {
  },
  actions: {
    setToken: ({state}, value) => state.userToken = value,
    setId : ({state}, value) => state.userId = value
  },
  modules: {
  }
})
