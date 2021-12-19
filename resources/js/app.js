import router from './router';
import App from './layouts/App';
import Vue from 'vue';
require('./bootstrap');

window.Vue = require('vue');


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('edit-Personne',require('./Pages/Edit-Personne.vue').default);

const app = new Vue({
    el: '#app',
    router,
    components:{App}
});
