import apiClient from '@/services/apiClient'

export async function login(email, password) {
  const response = await apiClient.post('/api/login', { email, password })
  const token = response.data.token
  localStorage.setItem('token', token)
  apiClient.defaults.headers.common['Authorization'] = `Bearer ${token}`
  console.log('Token gespeichert:', token)
}

export async function fetchUser() {
  try {
    const response = await apiClient.get('/api/me')
    return response.data.user
  } catch (error) {
    console.error('Fehler beim Laden des Benutzers:', error)
    throw new Error('Fehler beim Laden des Benutzers')
  }
}
