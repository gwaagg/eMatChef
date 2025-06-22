<script setup>
import { ref } from 'vue'
import ItemList from '@/components/ItemList.vue'
const itemListRef = ref(null)

const reloadList = () => {
  itemListRef.value?.loadItems?.()
}
</script>

<template>
  <div class="p-6">
    <ItemList ref="itemListRef" />
  </div>
</template>