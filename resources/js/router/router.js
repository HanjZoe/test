import AdminUser from '../components/Pages/Admin/Users/AdminUserIndex';
import Category from "../components/Pages/Admin/Category/Category";


// import AdminMain from "@/views/SinglePostPage"
import {createRouter,createWebHistory}  from "vue-router";



const routes = [
    {
        path: '/vue/admin/users',
        component: AdminUser,
    },
    {
        path: '/vue/admin/category',
        component: Category
    },


]

const  router = createRouter({
    history:createWebHistory(),
    routes,
});

export default router;
