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
router.beforeEach((to, from, next) => {
  const isLoggedIn = !!localStorage.getItem('jwt')

  if (to.path !== '/login' && !isLoggedIn) {
    next('/login')
  } else {
    next()
  }
})

export default router
