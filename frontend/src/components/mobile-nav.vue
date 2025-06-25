<template>
  <nav class="nav-mobile md960:hidden">
    <router-link
  v-for="item in navItems"
  :key="item.label"
  :to="{ name: item.name, params: { orgCode } }"
  class="nav-button"
  :class="isActive(item) ? 'nav-active' : 'nav-inactive'"
  @click="console.log('Klicke auf:', item.name)"
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
import { useRoute } from 'vue-router'
import {
  HomeIcon,
  SearchIcon,
  PlusCircleIcon,
  BellIcon,
  MenuIcon
} from 'lucide-vue-next'

const route = useRoute()
const orgCode = route.params.orgCode
const emit = defineEmits(['open-more'])

const navItems = [
  { icon: HomeIcon, label: 'Material', name: 'material' },
  { icon: SearchIcon, label: 'Bestellung', name: 'bestellung' },
  { icon: PlusCircleIcon, label: 'Neu', name: 'neu' },
  { icon: BellIcon, label: 'Reparatur', name: 'reparatur' },
]

const isActive = (item) => route.name === item.name
</script>
