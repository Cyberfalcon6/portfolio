import { createWebHistory, createRouter } from "vue-router";
import App from "@/App.vue";
import BigScreen from "@/BigScreen.vue";
import LandingPage from "@/components/LandingPage.vue";
import ProjectsView from "@/components/ProjectsView.vue"
import ContactForm from "@/components/ContactForm.vue";
import BraNds from "@/components/BraNds.vue";
const routes = [
    {
        path: "/",
        name: "home",
        component: App,
        redirect: "/about",
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
            {
                path:"build",
                name: "build",
                component: ContactForm
            },
            {
                path:"brands",
                name: "brands",
                component: BraNds
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