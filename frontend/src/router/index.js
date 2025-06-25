import { createRouter, createWebHistory } from 'vue-router'
import DefaultLayout from '@/layouts/default.vue'
import Login from '@/pages/login.vue'
import { isAuthenticated } from '@/services/auth'

import Material from '@/pages/material.vue'
import Bestellung from '@/pages/bestellung.vue'
import Buchhaltung from '@/pages/buchhaltung.vue'
import Admin from '@/pages/admin.vue'

const routes = [
  {
    path: '/login',
    name: 'login',
    component: Login
  },
  {
    path: '/:orgCode',
    component: DefaultLayout,
    children: [
      { path: 'material', name: 'material', component: Material },
      { path: 'bestellung', name: 'bestellung', component: Bestellung },
      { path: 'buchhaltung', name: 'buchhaltung', component: Buchhaltung },
      { path: 'admin', name: 'admin', component: Admin },
    ]
  },
  {
    path: '/',
    redirect: '/login'
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

router.beforeEach((to, from, next) => {
  if (!isAuthenticated() && to.name !== 'login') {
    next({ name: 'login' })
  } else {
    next()
  }
})

export default router
