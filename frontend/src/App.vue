<template>
  <div class="flex flex-col h-screen">
    <!-- Header -->
    <header class="bg-blue-600 text-white p-4 text-xl font-bold shadow">
      Materialverwaltung
    </header>

    <!-- Main Layout -->
    <div class="flex flex-1">
      <!-- Sidebar -->
      <aside class="w-64 bg-gray-100 p-4 border-r">
        <nav class="space-y-2">
          <a href="#" class="block p-2 rounded hover:bg-blue-200">Dashboard</a>
          <a href="#" class="block p-2 rounded hover:bg-blue-200">Materialien</a>
          <a href="#" class="block p-2 rounded hover:bg-blue-200">Bestellungen</a>
          <a href="#" class="block p-2 rounded hover:bg-blue-200">Einstellungen</a>
        </nav>
      </aside>

      <!-- Main Content -->
      <main class="flex-1 p-6 bg-white">
        <h1 class="text-2xl font-semibold mb-4">Willkommen!</h1>
        <p class="text-gray-600">Bitte wähle eine Option aus der Seitenleiste.</p>
      </main>
    </div>
  </div>
</template>

<script>
export default {
  name: "App",
};
</script>

<style>
/* Falls du globale Styles brauchst, kannst du sie hier ergänzen */
</style>