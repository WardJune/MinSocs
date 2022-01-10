import axios from 'axios'

export default {
  namespaced:true,
  state: {
    authenticated: false,
    user:{}
  },
  getters:{
    authenticated(state){
      return state.authenticated
    },
    user(state){
      return state.user
    }
  },
  mutations: {
    SET_AUTHENTICATED (state,value){
      state.authenticated = value
    },
    SET_USER(state,value){
      state.user = value
    }
  },
  actions: {
    async login({dispatch}, data){
      await axios.get('/sanctum/csrf-cookie')
      const response = await axios.post('/login', data)
      return dispatch('attempt', response)
    },

    async register({dispatch}, data){
      await axios.get("/sanctum/csrf-cookie");
      const response = await axios.post('/register',data)
      return dispatch('attempt', response)
    },

    async attempt({commit,state}, data){
      if (data) {
        commit('SET_AUTHENTICATED', true)
      } 

      if (state.authenticated == false) {
        return
      }

      try {
        const response = await axios.get('/api/user')
        commit('SET_USER', response.data)
      } catch (e) {
        commit('SET_USER', {})
        commit('SET_AUTHENTICATED', false)
      }
    },

    async logout({commit}){
      await axios.post('/logout');
      commit('SET_USER', {})
      commit('SET_AUTHENTICATED', false)
    }
  },
}