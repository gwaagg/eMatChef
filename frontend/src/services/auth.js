// src/services/auth.js
export const login = async (email, password) => {
  const res = await fetch(import.meta.env.VITE_API_BASE_URL + '/login', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ email, password })
  })
  const data = await res.json()
  if (!res.ok) throw new Error('Login failed')
  localStorage.setItem('jwt', data.token)
}

export const logout = () => localStorage.removeItem('jwt')

export const isAuthenticated = () => !!localStorage.getItem('jwt')
