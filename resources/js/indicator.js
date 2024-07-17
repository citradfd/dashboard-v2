
require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('indicator-list', require('./components/indicator/indicator.vue').default);
Vue.component('indicator-add', require('./components/indicator/addindicator.vue').default);
Vue.component('indicator-edit', require('./components/indicator/editindicator.vue').default);

import config from './config.js';

// /* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'

// /* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

// /* import specific icons */
import { faEdit, faPencil, faTrash, faUser, faUserSecret } from '@fortawesome/free-solid-svg-icons'

// /* add icons to the library */
library.add(faUserSecret,faPencil,faTrash)

Vue.component("font-awesome-icon", FontAwesomeIcon);

import Vue from 'vue';
import $ from 'jquery';
import 'select2/dist/css/select2.min.css';
import 'select2';

window.$ = window.jQuery = $;
Vue.component('select2-component', require('./components/Select2Component.vue').default);


const app = new Vue({
    el: '#app',
    data: {
        baseurl: config.baseurl,
    }
});