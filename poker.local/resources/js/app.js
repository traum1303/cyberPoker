import './bootstrap';
import { createApp } from "vue";
import AuthForm from './components/AuthForm.vue';

import.meta.glob([
    '../img/**' /*,
    '../fonts/**', */
]);

createApp(AuthForm).mount('#app');

