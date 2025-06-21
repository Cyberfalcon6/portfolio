import { createWebHistory, createRouter } from "vue-router";
import App from "@/App.vue";
import BigScreen from "@/BigScreen.vue";
const routes = [
    {
        path: "/",
        name: "home",
        component: App
    },
    {
        path: "/big",
        name: "big",
        component: BigScreen
    }
]
const router = createRouter({
    history: createWebHistory(),
    routes
});
export default router;