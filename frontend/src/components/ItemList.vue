<template>
  <div class="max-w-4xl mx-auto mt-10 bg-white shadow rounded-2xl p-6">
    <h2 class="text-xl font-bold mb-4">Materialliste</h2>

    <table class="w-full border-collapse">
      <thead>
        <tr class="bg-gray-100 text-left">
          <th class="p-2 border-b">ID</th>
          <th class="p-2 border-b">Name</th>
          <th class="p-2 border-b">Anzahl</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="item in items" :key="item.id" class="hover:bg-gray-50">
          <td class="p-2 border-b">{{ item.id }}</td>
          <td class="p-2 border-b">{{ item.name }}</td>
          <td class="p-2 border-b">{{ item.anzahl }}</td>
        </tr>
      </tbody>
    </table>

    <p v-if="items.length === 0" class="text-gray-500 mt-4">Keine Einträge gefunden.</p>
  </div>
</template>

<script setup>
import { onMounted, ref } from 'vue'

const items = ref([])

const loadItems = async () => {
  try {
    const response = await fetch('http://localhost:8000/api/items')
    items.value = await response.json()
  } catch (error) {
    console.error('Fehler beim Laden der Items:', error)
  }
}

onMounted(() => {
  loadItems()
})

// Optional für externes Neuladen:
defineExpose({ loadItems })
</script>
