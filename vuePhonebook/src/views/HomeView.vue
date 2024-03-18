<template>
  <div class="md:w-4/5 xs:w-4/5 flex flex-col justify-center mt-10">
    <div class="flex justify-end">
      <button class="bg-gradient-to-r from-cyan-700 to-green-700 text-white font-black p-2 font-bold rounded-xl">
        <RouterLink :to="{name: 'add-number'}">
          Add Contact
        </RouterLink>
      </button>
    </div>
    <div v-if="users.length > 0">
      <table class="border-collapse border border-green-300 w-full p-2 mt-10">
      <thead>
        <tr class="text-slate-400">
          <th class="border border-green-100 p-2">WhatsApp Number</th>
          <th class="border border-green-100 p-2">Description</th>
          <th class="border border-green-100 p-2">Save To PhoneBook</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="user in users" :key="user.id" class="text-slate-400">
          <td class="border border-green-100 p-2">{{ user.phone }}</td>
          <td class="border border-green-100 p-2">{{ user.description }}</td>
          <td class="border border-green-100 xs:p-0 md:p-2 text-sm">
            <a  
              :href="`tel: ${ user.phone }`"
              class="bg-gradient-to-r from-cyan-700 to-green-700 text-white font-bold py-2 px-4 rounded"
            >
              Click me
          </a>
          </td>
        </tr>
      </tbody>
      </table>
    </div>
    <div v-else>
      <h1 class="uppercase font-black">
        no contacts yet!
      </h1>
    </div>
  </div>
</template>

<script setup>
import { onMounted, ref, reactive } from 'vue'
import axios from 'axios'

  let users = ref([]) 

  onMounted(() => {
    axios.get("http://127.0.0.1:8000/api/users")
        .then((response) => {
          console.log(response.data.users)
          users.value = response.data.users
        })
        .catch(err => {
          console.log(err)
        })
  })

  const saveToPhone = (userId) => {
    console.log(userId)
  }
</script>
