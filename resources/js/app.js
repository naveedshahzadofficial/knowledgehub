require('./bootstrap')
import { createApp } from "vue"
import {store} from "./store/store"
import {router} from "./router/router"
import App from './App.vue'
import './plugins/sweetaler2'
import pagination from 'v-pagination-3'
import Select2 from 'vue3-select2-component';
import print from 'vue3-print-nb'
import vSelect from 'vue-select'


import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { library } from '@fortawesome/fontawesome-svg-core'
import {faStar, faDownload, faFolder, faArrowUp, faFile, faExpand, faPrint} from '@fortawesome/free-solid-svg-icons'
library.add(faStar,faFolder, faDownload, faArrowUp, faFile, faExpand, faPrint)

const app = createApp(App);

app.use(store);
app.use(router);
app.component('pagination', pagination);
app.component('Select2', Select2);
app.component('v-select', vSelect)
app.component('font-awesome-icon', FontAwesomeIcon)
app.use(print)

app.mount('#app');

document.title = store.state.app_title
