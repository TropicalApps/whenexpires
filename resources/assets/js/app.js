
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

Vue.component('example', require('./components/Example.vue'));

Vue.component('modal', {
    template: '#modal-template',
    data() {
        return {
            isCompleted: false,
            expires: '',
            domainName: '',
            link: '',
            isValid: false,
            status: false,
            errorMessage: ''
        };
    },
    mounted() {
        if (this.$parent.domain.length > 1) {
            axios.post('/domain', {
                domain: this.$parent.domain,
            }).then(response => {
                if (response.data.status) {
                    this.expires = response.data.date;
                    this.link = `http://${response.data.domain}`;
                    this.status = response.data.status;
                } else {
                    this.errorMessage = response.data.message;
                }
                this.domainName = response.data.domain;
                this.isCompleted = true;
            }).catch(error => {
                console.error(error.response.data.errors);
                this.errorMessage = error.response.data.errors.domain[0];
                this.isCompleted = true;
            });
            this.isValid = true;
        } else {
            this.isValid = false;
        }
    },
});

const app = new Vue({
    el: '#app',
    data: {
        showModal: false,
        domain: ''
    }
});
