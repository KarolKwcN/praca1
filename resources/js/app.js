

require('./bootstrap');

window.Vue = require('vue');

import Vuetify from 'vuetify'

Vue.use(Vuetify)

import 'vuetify/dist/vuetify.min.css'



Vue.component('example', require('./components/ExampleComponent.vue').default);
Vue.component('chat', require('./components/Chat.vue').default);



const app = new Vue({
    el: '#app',
});
