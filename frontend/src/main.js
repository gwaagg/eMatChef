import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import './assets/styles/navigation.css'
import { isTokenExpiringSoon } from './auth'
import apiClient from './axios'

createApp(App).use(router).mount('#app')
setInterval(async () => {
  const token = localStorage.getItem('jwt')
  if (token && isTokenExpiringSoon(token)) {
    try {
      const response = await apiClient.post('/token/refresh') // musst du bereitstellen
      localStorage.setItem('jwt', response.data.token)
      console.log('🔁 Token verlängert')
    } catch (err) {
      console.warn('⚠️ Token konnte nicht verlängert werden', err)
    }
  }
}, 60 * 1000) // alle 60 Sekunden prüfen