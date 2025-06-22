<template>
  <div v-if="visible" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded-xl shadow-xl w-[400px]">
      <h2 class="text-xl font-semibold mb-4">Neuen Artikel erstellen</h2>

      <form @submit.prevent="submitForm">
        <div class="mb-3">
          <label class="block text-sm font-medium">Name</label>
          <input v-model="form.name" type="text" class="border rounded w-full px-3 py-2" required />
        </div>

        <div class="mb-3">
          <label class="block text-sm font-medium">Anzahl</label>
          <input v-model="form.quantity" type="number" class="border rounded w-full px-3 py-2" required />
        </div>

        <div class="flex justify-end space-x-2 mt-4">
          <button type="button" @click="$emit('close')" class="text-gray-500">Abbrechen</button>
          <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Speichern</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup>
import { ref, watch } from 'vue'
import apiClient from '@/axios'

const props = defineProps({
  visible: Boolean
})
const emit = defineEmits(['close', 'saved'])

const form = ref({
  name: '',
  quantity: null
})

const resetForm = () => {
  form.value = { name: '', quantity: null }
}

watch(() => props.visible, (newVal) => {
  if (!newVal) resetForm()
})

const submitForm = async () => {
  try {
    await apiClient.post('/material_items', form.value)
    emit('saved')
    emit('close')
  } catch (err) {
    console.error('Fehler beim Speichern:', err)
  }
}
</script>
