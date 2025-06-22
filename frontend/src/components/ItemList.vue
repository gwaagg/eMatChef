<template>
  <div class="mx-auto mt-10 bg-white shadow rounded-2xl p-6 overflow-auto">
    <table class="min-w-full border-collapse">
      <thead class="bg-gray-100">
      <tr>
        <th class="p-2 border-b">ID</th>
        <th class="p-2 border-b">Artikel</th>
        <th class="p-2 border-b" colspan="2">Menge</th>
        <th class="p-2 border-b" colspan="6">Grösse</th>
        <th class="p-2 border-b">zusatz</th>
        <th class="p-2 border-b">fabe</th>
        <th class="p-2 border-b">material</th>
        <th class="p-2 border-b">lieferant</th>
        <th class="p-2 border-b">beschaffen</th>
        <th class="p-2 border-b" colspan="3"></th>
        <th class="p-2 border-b">Action</th>
      </tr>
      <tr>
        <td class="p-2 border-b"></td>
        <td class="p-2 border-b"></td>
        <td class="p-2 border-b">Anzahl</td>
        <td class="p-2 border-b">Einheit</td>
        <td class="p-2 border-b">länge</td>
        <td class="p-2 border-b">breite</td>
        <td class="p-2 border-b">höhe</td>
        <td class="p-2 border-b">einheit</td>
        <td class="p-2 border-b">gewicht</td>
        <td class="p-2 border-b">einheit</td>
        <td class="p-2 border-b"></td>
        <td class="p-2 border-b"></td>
        <td class="p-2 border-b"></td>
        <td class="p-2 border-b"></td>
        <td class="p-2 border-b"></td>
        <td class="p-2 border-b">an Lager</td>
        <td class="p-2 border-b">Im Einsatz</td>
        <td class="p-2 border-b">Entsorgt</td>
        <td class="p-2 border-b"></td>
      </tr>
      <tr class="newItemRow">
        <td class="p-2 border-b"><input type="text"></td>
        <td class="p-2 border-b"><input type="text"></td>
        <td class="p-2 border-b"><input type="text"></td>
        <td class="p-2 border-b"><input type="text"></td>
        <td class="p-2 border-b"><input type="text"></td>
        <td class="p-2 border-b"><input type="text"></td>
        <td class="p-2 border-b"><input type="text"></td>
        <td class="p-2 border-b"><input type="text"></td>
        <td class="p-2 border-b"><input type="text"></td>
        <td class="p-2 border-b"><input type="text"></td>
        <td class="p-2 border-b"><input type="text"></td>
        <td class="p-2 border-b"><input type="text"></td>
        <td class="p-2 border-b"><input type="text"></td>
        <td class="p-2 border-b"><input type="text"></td>
        <td class="p-2 border-b"><input type="text"></td>
        <td class="p-2 border-b"></td>
        <td class="p-2 border-b"></td>
        <td class="p-2 border-b"></td>
        <td class="p-2 border-b">Action</td>
      </tr>
      </thead>
      <tbody>
        <tr v-for="item in items" :key="item.id" class="hover:bg-gray-50">
         <td class="p-2 border-b">{{ item.id }}</td>
         <td class="p-2 border-b">{{ item.name }}</td>
         <td class="p-2 border-b">{{ item.quantity }}</td>
         <td class="p-2 border-b">{{ item.quantityunit }}</td>
         <td class="p-2 border-b">{{ item.sizelength }}</td>
         <td class="p-2 border-b">{{ item.sizewidth }}</td>
         <td class="p-2 border-b">{{ item.sizedepth }}</td>
         <td class="p-2 border-b">{{ item.sizeunit }}</td>
         <td class="p-2 border-b">{{ item.weight }}</td>
         <td class="p-2 border-b">{{ item.weightunit }}</td>
         <td class="p-2 border-b">{{ item.beschreibung }}</td>
         <td class="p-2 border-b">{{ item.color }}</td>
         <td class="p-2 border-b">{{ item.material }}</td>
         <td class="p-2 border-b">{{ item.lieferant }}</td>
         <td class="p-2 border-b">{{ item.kaufdat }}</td>
         <td class="p-2 border-b">an Lager</td>
         <td class="p-2 border-b">Im Einsatz</td>
         <td class="p-2 border-b">Entsorgt</td>
         <td class="p-2 border-b">Action</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
<script setup>
</script>