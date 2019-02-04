import Vue from 'vue'
import Vuex from 'vuex'
import createPersistedState from 'vuex-persistedstate'
import Scene from '../models/Scene'
import { deserialize } from '../models'
import Splash from './Splash'

if (window.location.hostname !== 'localhost') {
  const redirect = 'http://icon.wuruihong.com'
  if (window.parent === window) {
    window.location.href = redirect
  }

  try {
    const hostname = window.parent.location.hostname
    if (!['localhost', 'icon.local', 'icon.wuruihong.com'].includes(hostname)) {
      window.location.href = redirect
    }
  } catch (e) {
    console.log(e)
    window.location.href = redirect
  }
}

Vue.use(Vuex)

/*
 * If not building with SSR mode, you can
 * directly export the Store instantiation
 */

const store = new Vuex.Store({
  modules: {
    Splash
  },
  plugins: [
    createPersistedState({
      getState (key, storage, value) {
        try {
          const saved = (value = storage.getItem(key)) && typeof value !== 'undefined'
            ? JSON.parse(value)
            : undefined
          if (saved.Splash && saved.Splash.scene) {
            saved.Splash.scene = deserialize(saved.Splash.scene)
          }
          return saved
        } catch (err) {}

        return undefined
      }
    })
  ]
})

if (!store.state.Splash.scene) {
  store.state.Splash.scene = new Scene()
}

export default store
