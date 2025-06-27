import { createWebHistory, createRouter } from "vue-router";
import App from "@/App.vue";
import BigScreen from "@/BigScreen.vue";
import LandingPage from "@/components/LandingPage.vue";
import ProjectsView from "@/components/ProjectsView.vue"
const routes = [
    {
        path: "/",
        name: "home",
        component: App,
        children: [
            {
                path:"about",
                name: "about",
                component: LandingPage
            },
            {
                path:"projects",
                name: "projects",
                component: ProjectsView
            },
        ]
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