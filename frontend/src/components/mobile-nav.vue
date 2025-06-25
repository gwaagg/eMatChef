<template>
  <nav class="nav-mobile md960:hidden">
    <router-link
  v-for="item in navItems"
  :key="item.label"
  :to="item.route"
  class="nav-button"
  :class="isActive(item.route) ? 'nav-active' : 'nav-inactive'"
  @click="console.log('Klicke auf:', item.route)"
>
      <component :is="item.icon" class="nav-icon" />
      <span class="nav-label">{{ item.label }}</span>
    </router-link>

    <!-- Mehr-Button -->
    <button @click="$emit('open-more')" class="nav-button nav-inactive">
        <MenuIcon class="nav-icon" />
        <span class="nav-label">Mehr</span>
    </button>
  </nav>
</template>

<script setup>
import { computed } from 'vue'
import { useRoute } from 'vue-router'
import {
  HomeIcon,
  SearchIcon,
  PlusCircleIcon,
  BellIcon,
  MenuIcon
} from 'lucide-vue-next'

const route = useRoute()
const emit = defineEmits(['open-more'])
const orgCode = computed(() => route.params.orgCode)

const navItems = computed(() => [
  { icon: HomeIcon, label: 'Material', route: `/${orgCode.value}/material` },
  { icon: SearchIcon, label: 'Bestellung', route: `/${orgCode.value}/bestellung` },
  { icon: PlusCircleIcon, label: 'Neu', route: `/${orgCode.value}/neu` },
  { icon: BellIcon, label: 'Reparatur', route: `/${orgCode.value}/reparatur` },
])

const isActive = (r) => route.path.startsWith(r)
</script>
