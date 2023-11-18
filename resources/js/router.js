import {createRouter, createWebHistory} from 'vue-router'

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes:[
        {
            path: '/add',
            name: 'AddPerson',
            component: () => import('../js/components/AddPersonComponent.vue')
        },
        {
            path: '/viewPeople',
            name: 'ViewPeople',
            component: () => import('../js/components/ViewPeopleComponent.vue')
        },
        {
            path: '/person/:id',
            name: 'ViewPerson',
            component: () => import('../js/components/ViewPersonComponent.vue')
        },
        {
            path: '/person/:id/edit',
            name: 'EditPerson',
            component: () => import('../js/components/EditPersonComponent.vue')
        },
    ]
})

export default router
