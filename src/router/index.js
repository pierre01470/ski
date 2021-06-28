import Vue from 'vue'
import VueRouter from 'vue-router'
import Inscription from '../views/Inscription.vue'
import Resultat from '../views/Resultat.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Inscription',
    component: Inscription
  },
  {
    path: '/resultat',
    name: 'Resultat',
    component: Resultat
  }
]

const router = new VueRouter({
  routes
})

export default router
