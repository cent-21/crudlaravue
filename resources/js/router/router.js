import { createRouter, createWebHashHistory } from "vue-router";
import Index from "../pages/Installation/Index.vue"
import Edit from "../pages/Installation/Edit.vue"
import Create from "../pages/Installation/Create.vue"

const routes = [
    { path: '/', name: "index", component: Index },
    { path: '/create', name: "create", component: Create },
    { path: '/edit/:id', name: "edit", component: Edit },
]


const router = createRouter({
    history: createWebHashHistory(),
    routes,
})

export default router;