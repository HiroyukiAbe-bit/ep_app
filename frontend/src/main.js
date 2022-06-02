import Vue from 'vue'
import App from './App.vue'
import router from './router'
import axios from 'axios'
import VueAxios from 'vue-axios'
import vuetify from './plugins/vuetify'
import '@mdi/font/css/materialdesignicons.css'
import * as VueGoogleMaps from 'vue2-google-maps'

Vue.config.productionTip = false

Vue.use(VueAxios,axios)
Vue.use(vuetify)



Vue.use(VueGoogleMaps, {
  load: {
    key: 'AIzaSyBQKIt-vixiCjema6UDJDWm6JPBQPEywfg',
    libraries: 'places',
    region: 'JP',
    language: 'ja'
  }
})

new Vue({
  router,
  vuetify,
  render: h => h(App)
}).$mount('#app')
