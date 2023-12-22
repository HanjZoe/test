import AdminUser from '../components/Pages/AdminUserIndex';
// import AdminMain from "@/views/SinglePostPage"
import {createRouter,createWebHistory} from "vue-router";


const routes = [
    {
        path: '/vue/vue',
        component: AdminUser
    },


]

const  router = createRouter({
    routes,
    history:createWebHistory(process.env.BASE_URL)
})

export default router;
