import { createApp } from 'vue'
import App from './app.vue'
import router from './router'
import './assets/styles/navigation.css'

createApp(App).use(router).mount('#app')