import './bootstrap';
import router from './router';
import Index from './components/Index.vue';
import { createApp } from 'vue';
import store from './store';

createApp(Index).use(router).use(store).mount('#app');
