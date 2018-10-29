
import Vue from 'vue';
import { store } from './store/index.js';
import App from './components/App.vue';
import router from "./routes/routes.js";
import VueFuse from 'vue-fuse';
import Vuetify from 'vuetify';
import 'material-design-icons-iconfont/dist/material-design-icons.css';
import 'vuetify/dist/vuetify.min.css';

Vue.use(Vuetify);
Vue.use(VueFuse);

window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';



export default new Vue({
    el: "#app",
    router,
    store:store,
    render: h => h(App),
  }).$mount('#app');
  