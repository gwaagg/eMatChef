<!-- src/pages/login.vue -->
<template>
  <div class="max-w-sm mx-auto mt-20 p-4 border rounded shadow">
    <h1 class="text-xl mb-4">Login</h1>
    <input v-model="email" placeholder="E-Mail" class="mb-2 w-full p-2 border" />
    <input v-model="password" type="password" placeholder="Passwort" class="mb-4 w-full p-2 border" />
    <button @click="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Login</button>
    <p v-if="error" class="text-red-500 mt-2">{{ error }}</p>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { login } from '@/services/auth'
import { useRouter } from 'vue-router'

const router = useRouter()
const email = ref('')
const password = ref('')
const error = ref(null)

const submit = async () => {
  try {
    await login(email.value, password.value)
    router.push('/')
  } catch {
    error.value = 'Login fehlgeschlagen'
  }
}
</script>
