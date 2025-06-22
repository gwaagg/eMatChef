// src/auth.js
export function getTokenExpiration(token) {
  try {
    const payload = JSON.parse(atob(token.split('.')[1]))
    return payload.exp * 1000 // in ms
  } catch {
    return null
  }
}

export function isTokenExpiringSoon(token, withinMs = 5 * 60 * 1000) {
  const exp = getTokenExpiration(token)
  return exp && exp - Date.now() < withinMs
}
