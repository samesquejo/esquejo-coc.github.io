import { createRouter, createWebHistory } from 'vue-router'
import HomePage from '../views/Home'
import ClanPage from '../views/Clan'

const routes = [
    {
        path: '/',
        name: 'Home',
        component: HomePage
    },
    {
        path: '/clans',
        name: 'Clan',
        component: ClanPage
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router