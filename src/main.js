import { createApp } from 'vue'
import router from './router';
import FrameWork from './FrameWork.vue';

const app = createApp(FrameWork);
app.use(router)
app.mount("#app")