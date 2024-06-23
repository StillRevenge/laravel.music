import { createWebHistory, createRouter } from 'vue-router'
import SongsComponent from './components/SongsComponent.vue'

const routes = [
    { path: '/', component: () => import('./components/HomeComponent.vue') },
    { path: '/home', component: () => import('./components/HomeComponent.vue') },
    { path: '/albums', component: SongsComponent },
    { path: '/songs', name: 'songs.all', component: () => import('./components/Song/Index.vue') },
    { path: '/songs/create', component: () => import('./components/Song/Create.vue') },
    {
        path: '/songs/:id',
        name: 'song.get', component: () => import('./components/Song/Show.vue')
    },
    {
        path: '/songs/edit/:id',
        name: 'song.edit', component: () => import('./components/Song/Edit.vue')
    },
    {
        path: '/artist/get/:id', name: 'artist.get', component: () => import('./components/artist/Artistget.vue')
    },
    {
        path: '/artist/add/:id', name: 'artist.add', component: () => import('./components/artist/addSong.vue')
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router;