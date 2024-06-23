import './bootstrap';
import { createApp } from 'vue';
import Notifications from '@kyvg/vue3-notification';
import router from './router';
import App from './components/App.vue';

const app = createApp(
    {
        components: {
            App
        }
    }
)
app.use(Notifications);
app.use(router);
app.mount('#app');



