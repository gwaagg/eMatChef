// src/router/index.js
import { createRouter, createWebHistory } from 'vue-router'
import DefaultLayout from '@/layouts/default.vue'
import Login from '@/pages/login.vue'
import { isAuthenticated } from '@/services/auth'

// Seiten
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
    path: '/',
    component: DefaultLayout,
    beforeEnter: (to, from, next) => {
      if (!isAuthenticated()) return next('/login')
      next()
    },
    children: [
      { path: '', redirect: '/material' },
      { path: 'material', name: 'material', component: Material },
      { path: 'bestellung', name: 'bestellung', component: Bestellung },
      { path: 'buchhaltung', name: 'buchhaltung', component: Buchhaltung },
      { path: 'admin', name: 'admin', component: Admin },
    ]
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

export default router
