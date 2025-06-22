<script setup>
import ItemList from '../components/ItemList.vue'

import { ref } from 'vue'
const itemListRef = ref()

const onItemAdded = () => {
  itemListRef.value?.loadItems()
}
</script>
<template>
  <div>
    <ItemList ref="itemListRef" />
  </div>
  
</template>