<template>
  <div class="flex justify-center">
    <table class="border-collapse border border-slate-500 p-2 mt-10">
    <thead>
      <tr>
        <th class="border border-slate-500 p-2">WhatsApp Number</th>
        <th class="border border-slate-500 p-2">Description</th>
        <th class="border border-slate-500 p-2">Save To PhoneBook</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="user in users" :key="user.id">
        <td class="border border-slate-500 p-2">{{ user.phone }}</td>
        <td class="border border-slate-500 p-2">{{ user.description }}</td>
        <td class="border border-slate-500 p-2">
          <a  
            :href="`tel: ${ user.phone }`"
            class="bg-green-600 hover:bg-green-600 text-white font-bold py-2 px-4 rounded"
          >
            Click me
        </a>
        </td>
      </tr>
    </tbody>
    </table>
  </div>
</template>

<script setup>
import { onMounted, ref } from 'vue'
import axios from 'axios'

  let users = ref([]) 

  onMounted(() => {
    axios.get("http://127.0.0.1:8000/api/users")
        .then((response) => {
          console.log(response.data.users)
          users.value = response.data.users
        })
  })

  const saveToPhone = (userId) => {
    console.log(userId)
  }
</script>
