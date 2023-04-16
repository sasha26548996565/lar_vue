import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: '/persons',
        component: import('./components/Person/IndexComponent.vue'),
        name: 'person.index'
    },
    {
        path: '/persons/create',
        component: import('./components/Person/CreateComponent.vue'),
        name: 'person.create'
    },
    {
        path: '/persons/edit/:person',
        component: import('./components/Person/EditComponent.vue'),
        name: 'person.edit'
    },
    {
        path: '/persons/show/:person',
        component: import('./components/Person/ShowComponent.vue'),
        name: 'person.show'
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router;
