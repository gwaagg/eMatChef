<template>
  <header class="desktop-header">
    <div class="header-left">
      <router-link to="/" class="logo">Logo</router-link>
      <nav class="desktop-nav">
        <ul class="flex gap-2 h-full">
          <li v-for="item in menuItems" :key="item.label" class="h-full">
            <router-link
              :to="item.route"
              class="desktop-link h-full flex items-center"
              :class="isActive(item) ? 'desktop-active' : 'desktop-inactive'"
            >
              {{ item.label }}
            </router-link>
          </li>
        </ul>
      </nav>
    </div>

    <div class="user-dropdown">
      <button @click="toggleDropdown">{{ username }}</button>
      <div v-if="dropdownOpen" class="dropdown-box">
        <router-link to="/profil">Profil</router-link>
        <button @click="logout" class="bg-red-500 px-3 py-1 rounded hover:bg-red-600">Logout</button>
      </div>
    </div>
  </header>
</template>

<script setup>
import { ref, watch } from 'vue'
import { useRoute } from 'vue-router'

const route = useRoute()
const dropdownOpen = ref(false)
const username = ref('Max Mustermann')

const menuItems = [
  { label: 'Material', route: '/material' },
  { label: 'Bestellung', route: '/bestellung' },
  { label: 'Buchhaltung', route: '/buchhaltung' },
  { label: 'Einstellungen', route: '/admin' }
]

const isActive = (item) => route.path.startsWith(item.route)

function toggleDropdown() {
  dropdownOpen.value = !dropdownOpen.value
}

const logout = () => {
  localStorage.removeItem('jwt')
  router.push('/login')
}

// Optional: Dropdown automatisch schließen bei Route-Wechsel
watch(() => route.path, () => {
  dropdownOpen.value = false
})
</script>
