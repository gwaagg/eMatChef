<template>
  <div class="flex justify-center items-center h-screen bg-gray-100">
    <form @submit.prevent="doLogin" class="bg-white p-6 rounded shadow-md w-96">
      <h2 class="text-2xl mb-4 font-semibold text-center">Login</h2>
      <input
        v-model="email"
        type="text"
        placeholder="E-Mail"
        class="w-full mb-4 p-2 border rounded"
      />
      <input
        v-model="password"
        type="password"
        placeholder="Passwort"
        class="w-full mb-4 p-2 border rounded"
      />
      <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
        Login
      </button>
    </form>
    <p v-if="errorMessage" class="text-red-500 mt-2">{{ errorMessage }}</p>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import { login } from '@/services/auth'

const email = ref('')
const password = ref('')
const errorMessage = ref('')
const router = useRouter()

const doLogin = async () => {
  try {
    const userData = await login(email.value, password.value) // ⬅ enthält orgCode
    const orgCode = userData.orgCode

    if (!orgCode) {
      throw new Error('orgCode fehlt im Token')
    }

    router.push(`/${orgCode}/material`)
    errorMessage.value = ''
  } catch (err) {
    console.error('Login fehlgeschlagen:', err)
    errorMessage.value = err.message || 'Login fehlgeschlagen'
  }
}
</script>