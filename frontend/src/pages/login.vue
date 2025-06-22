<template>
  <div>
    <h1 class="text-3xl font-bold text-center mt-10">E Mat Chef</h1>
  <div class="max-w-md mx-auto mt-20 p-6 bg-white rounded-xl shadow">
    <h2 class="text-2xl font-bold mb-4">Login</h2>
    <form @submit.prevent="login">
      <input v-model="email" type="email" placeholder="Email" class="input" />
      <input v-model="password" type="password" placeholder="Passwort" class="input mt-2" />
      <button type="submit" class="btn mt-4">Einloggen</button>
      <p v-if="error" class="text-red-600 mt-2">Login fehlgeschlagen</p>
    </form>
  </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import apiClient from '@/axios'
import { useRouter } from 'vue-router'

const email = ref('')
const password = ref('')
const error = ref(false)
const router = useRouter()

const login = async () => {
  error.value = false
  try {
    const res = await apiClient.post('/login', {
      email: email.value,
      password: password.value
    })
    localStorage.setItem('jwt', res.data.token)
    router.push('/material')
  } catch (err) {
    error.value = true
    console.error('Login fehlgeschlagen:', err)
  }
}
</script>

<style scoped>
.input {
  width: 100%;
  padding: 0.5rem;
  border: 1px solid #2e8609;
  border-radius: 0.5rem;
}
.btn {
  background-color: #3b82f6;
  color: white;
  padding: 0.5rem 1rem;
  border-radius: 0.5rem;
}
</style>
