

require('./bootstrap');

window.Vue = require('vue');



//Vue.component('example', require('./components/ExampleComponent.vue').default);

Vue.component('taskiii' , {

    template: '<li>Foobar</li>'

});



const app = new Vue({
    el: '#app',

    data: {

        title: 'papapapapapaappa'
    }
    
});
