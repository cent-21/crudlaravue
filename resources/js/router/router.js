import { createRouter, createWebHashHistory } from "vue-router";
import Installation from "../pages/Installation/Index.vue"

const routes = [
    { path: '/', name: "installations", component: Installation },
]


const router = createRouter({
    history: createWebHashHistory(),
    routes,
})

export default router;