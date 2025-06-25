// src/services/auth.js
import jwtDecode from 'jwt-decode'

export const login = async (email, password) => {
  const res = await fetch(import.meta.env.VITE_API_BASE_URL + '/login', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ email, password }) // ← kein username!
  })

  if (!res.ok) {
    const errorText = await res.text()
    throw new Error(`Login fehlgeschlagen: ${res.status} ${errorText}`)
  }

  const data = await res.json()
  localStorage.setItem('jwt', data.token)
  console.log('Token gespeichert:', data.token)

  // Token direkt auslesen und orgCode extrahieren
  const decoded = jwtDecode(data.token)
  return decoded // enthält u.a. orgCode und orgId
}
