require('./bootstrap');
window.Vue = require('vue');
const app = new Vue({
    el: "#steps",
    data: {
        apartment: {
          step: '',
          image: '',
          description: ''
        },
        apartments: [],
      },
      mounted: function () {
        /*
         * The "data-apartments" could come from serverside (already saved apartments)
         */
        this.apartments = JSON.parse(this.$el.dataset.apartments)
      },
      methods: {
        addNewApartment: function () {
          this.apartments.push(Vue.util.extend({}, this.apartment))
        },
        
        removeApartment: function (index) {
          Vue.delete(this.apartments, index);
        },
        sumbitForm: function () {
          /*
           * You can remove or replace the "submitForm" method.
           * Remove: if you handle form sumission on server side.
           * Replace: for example you need an AJAX submission.
           */
          console.info('<< Form Submitted >>')
          console.info('Vue.js apartments object:', this.apartments)
          window.testSumbit()
        }
      }
    })
    
    