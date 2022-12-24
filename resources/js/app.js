import './bootstrap';

import { createApp } from 'vue';
import axios from 'axios'
import VueAxios from 'vue-axios'

import router from './router/router';

import App from "./pages/App.vue"


createApp(App).use(VueAxios, axios).use(router).mount('#app')