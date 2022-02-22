
require('./bootstrap');
import 'bootstrap-icons/font/bootstrap-icons.css';

window.Vue = require('vue');

import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import VuePaginate from 'vue-paginate';

Vue.use(VuePaginate)

Vue.use(VueSweetalert2);

const moment = require('moment');
require('moment/locale/es');
Vue.use(require('vue-moment'), { moment });

Vue.component('user-edit', require('./components/User/UserEdit.vue').default);

Vue.component('last-links', require('./components/Links/LastLinks/LastLinks.vue').default);
Vue.component('links-list', require('./components/Links/LinksList/LinksList.vue').default);
Vue.component('links-create', require('./components/Links/LinksCreate/LinksCreate.vue').default);
Vue.component('links-edit', require('./components/Links/LinksEdit/LinksEdit.vue').default);

Vue.component('last-categories', require('./components/Categories/LastCategories/LastCategories.vue').default);
Vue.component('categories-list', require('./components/Categories/CategoriesList/CategoriesList.vue').default);
Vue.component('categories-create', require('./components/Categories/CategoriesCreate/CategoriesCreate.vue').default);
Vue.component('categories-edit', require('./components/Categories/CategoriesEdit/CategoriesEdit.vue').default);
Vue.component('categories-action', require('./components/Categories/CategoriesAction/CategoriesAction.vue').default);

Vue.config.productionTip = false
Vue.config.devtools = false

const app = new Vue({
    el: '#app',
});
