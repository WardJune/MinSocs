import {createApp} from 'vue'
import Vuex from 'vuex'
import App from '../App.vue'
import auth from './auth'
import createPersistedState from 'vuex-persistedstate'

createApp(App).use(Vuex)

export default new Vuex.Store({
  plugins: [
    createPersistedState()
  ],
  modules: {
    auth
  }
})