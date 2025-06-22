import { createApp } from 'vue'
import router from './router';
import FrameWork from './FrameWork.vue';
import { library } from '@fortawesome/fontawesome-svg-core'
import { faBriefcase, faToolbox, faCommentDots, faEnvelope } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

library.add(faBriefcase, faToolbox, faCommentDots, faEnvelope) 
const app = createApp(FrameWork);
app.component('font-awesome-icon', FontAwesomeIcon)
app.use(router)
app.mount("#app")