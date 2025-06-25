<template>
  <transition name="slide">
    <aside v-if="modelValue" class="mobile-sidebar">
      <h2 class="font-bold text-lg mb-4">Mehr</h2>
      <ul class="space-y-2">
        <li><router-link :to="{ name: 'buchhaltung', params: { orgCode } }" @click="close">Buchhaltung</router-link></li>
        <li><router-link :to="{ name: 'admin', params: { orgCode } }" @click="close">Admin</router-link></li>
        <li>
          <button class="close-button" @click="close">Menü schließen</button>
        </li>
      </ul>
    </aside>
  </transition>

  <transition name="fade">
    <div
      v-if="modelValue"
      class="mobile-overlay"
      @click.self="close"
    />
  </transition>
</template>

<script setup>
import { useRoute } from 'vue-router'

defineProps({
  modelValue: Boolean
})
const emit = defineEmits(['update:modelValue'])

const route = useRoute()
const orgCode = route.params.orgCode

function close() {
  emit('update:modelValue', false)
}
</script>
