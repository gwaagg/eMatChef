<script setup>
import { ref, computed, onMounted } from 'vue'
import Header from '@/components/header.vue'
import MobileNav from '@/components/mobile-nav.vue'
import MobileSidebar from '@/components/mobile-sidebar.vue'

const showAdmin = ref(false)
const showMobile = ref(false)
const isDesktop = computed(() => window.innerWidth >= 960)

function toggleAdmin() {
  showAdmin.value = !showAdmin.value
}

onMounted(() => {
  window.addEventListener('resize', () => {
    if (window.innerWidth < 960) showAdmin.value = false
  })
})
</script>

<template>
  <!-- Mobile Bottom Nav -->
  <MobileNav @open-more="showMobile = true" />

  <!-- Mobile Sidebar -->
  <MobileSidebar v-model="showMobile" />

  <div class="layout-root">
    <!-- Admin Sidebar -->
    <aside v-if="showAdmin && isDesktop" class="admin-panel">
      <h2>Admin</h2>
      <ul>
        <li><a href="#">Benutzer</a></li>
        <li><a href="#">Rollen</a></li>
        <li><a href="#">Logs</a></li>
      </ul>
    </aside>

    <!-- Header + Main -->
    <div class="flex-1 flex flex-col">
      <Header @toggle-admin="toggleAdmin" />

      <main :class="['main-content', showAdmin && isDesktop ? 'ml-64' : '']">
        <router-view />
      </main>
    </div>
  </div>
</template>
