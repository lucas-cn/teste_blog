
require('./bootstrap');
window.Vue = require('vue');

import moment from 'moment';

window.moment = moment;

moment.locale('pt-br');

//Components
import list_posts from './components/post/list.vue';
//Vue.component('list_posts', require('./components/ValorConsulta.vue'));

const app = new Vue({
    el: '#app',
    components: {
        list_posts
    }
});