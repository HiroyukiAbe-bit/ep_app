import Vue from 'vue'
import App from './App.vue'
import router from './router'
import axios from 'axios'
import VueAxios from 'vue-axios'
import vuetify from './plugins/vuetify'
import '@mdi/font/css/materialdesignicons.css'

Vue.config.productionTip = false

Vue.use(VueAxios,axios)
Vue.use(vuetify)

new Vue({
  router,
  vuetify,
  render: h => h(App)
}).$mount('#app')
