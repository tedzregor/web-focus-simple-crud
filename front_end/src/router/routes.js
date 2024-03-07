import {createRouter, createWebHistory} from 'vue-router'

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/admin/student_management',
            component: () => import('../pages/Admin/StudentManagement/StudentManagement.vue')
        },
        {
            path: '/admin/about',
            component: () => import('../pages/Admin/About/About.vue')
        }
    ]
    
})

export default router;