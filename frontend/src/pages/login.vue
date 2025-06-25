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
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import { login, fetchUser } from '@/services/auth'

const email = ref('')
const password = ref('')
const router = useRouter()

const doLogin = async () => {
  console.log('Login ausgelöst') // ← Debug-Ausgabe
  try {
    await login(email.value, password.value)  // ⬅ 1. Login + JWT speichern
    const user = await fetchUser()            // ⬅ 2. Benutzer + orgCode holen

    const orgCode = user.organisation.orgCode
    router.push(`/${orgCode}/material`)
  } catch (err) {
    console.error('Login fehlgeschlagen:', err)
  }
}
</script>
