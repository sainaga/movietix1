
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue'); 

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('browse', require('./components/browse.vue'));

import VeeValidate from 'vee-validate';

Vue.use(VeeValidate);

const app = new Vue({
    el: '#app',
    data: {
    	 email: '',
    	 name: '',
         firstname: '',
         lastname: '',
    	 password: '',
         confirm_password: '',
         password_match: '',
    	 username: '',
    	 type: 'Card',
         card: '',
    	 car: '',
         ccv: '',
         no_tickets: '1',
    	 total_tickets: '',
    },
    mounted() {
        this.total_tickets = 12 * this.no_tickets
    },
     watch: {
        no_tickets: function (val) {
          this.total_tickets = 12 * this.no_tickets
        }
      },
     methods: {
	    validateBeforeSubmit(e) {
            this.$validator.validateAll();
            if (!this.errors.any()) {
             //   this.submitForm()
             $( "#login-form" ).submit();
             
            }
          },
        validateBookCardSubmit(e) {
            this.$validator.validateAll();
            if (!this.errors.any()) {
             //   this.submitForm()
             $( "#booking-card-form" ).submit();
             
            }
          },
        validateBookPaypalSubmit(e) {
            this.$validator.validateAll();

       //     if (!this.errors.any()) {
             //   this.submitForm()
             $( "#booking-paypal-form" ).submit();
             
       //     }
          },
        validateRegisterSubmit(e) {
	        this.$validator.validateAll();
            if(this.password == this.confirm_password){
    	        if (!this.errors.any()) {
    	         //   this.submitForm()
    	         $( "#register-form" ).submit();
    	         
    	        }else{
                    alert('Please Fix Errors!');
                }
            }else{
                this.password_match = 'Passwords do not match!'
            }
	      },
          keyup() {
            if(this.password == this.confirm_password){
                this.password_match = ''
            }else{
                this.password_match = 'Passwords do not match!'
            }
          }
	  }
});
