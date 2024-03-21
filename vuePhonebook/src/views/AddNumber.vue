<template>
    <div class="md:w-3/5 xs:w-4/5 mx-auto border-2 border-green-600 rounded-xl p-8 mt-10">
        <div class="flex justify-between">
            <h2 class="text-2xl font-bold mb-4 text-slate-400 flex justify-start items-center xs:text-lg sm:text-2xl">Add Phone Number</h2>
            <RouterLink :to="{name: 'home'}" class="bg-gradient-to-r from-cyan-700 to-green-700 flex justify-center items-center p-3 xs:py-4 sm:py-4 h-6 rounded-xl text-white font-black xs:text-xs sm:text-sm">
                Back home
            </RouterLink>
        </div>
      <form @submit.prevent="submitForm" class="space-y-4">
        <div>
            <label for="phone" class="block text-md font-medium text-gray-700">Phone Number</label>
            <input 
                id="phone" 
                v-model="phone"
                v-maska
                data-maska="+### ### ### ###" 
                type="tel" 
                required 
                placeholder="+255 769 323 980" 
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
            />
        </div>
        <div>
          <label for="description" class="block text-md font-medium text-gray-700">Description</label>
          <textarea 
            id="description" 
            rows="3"
            cols="50"
            v-model="description" 
            required 
            placeholder="Describe why I should save your number"
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" >
        </textarea>
        </div>
        <div class="flex justify-center">
          <button type="submit" class="xs:w-full md:w-2/5 flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gradient-to-r from-cyan-700 to-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Add Phone Number
          </button>
        </div>
      </form>
    </div>
  </template>
  
  <script setup>
  import {ref} from 'vue'
  import { useRouter} from 'vue-router'
  import { vMaska } from 'maska'
  import axios from 'axios'
  import { useNotification } from "@kyvg/vue3-notification"
  
    let phone = ref() 
    let description = ref() 
    let router = useRouter()
    const { notify }  = useNotification()
  
    let submitForm = () => {
        axios.post("http://127.0.0.1:8000/api/insert", {phone: phone.value, description:description.value})
            .then(res => {
                notify({
                  title: "Message",
                  text: res.data.message,
                  type: alert,
                  speed: 5000,
                })
                router.push({name: 'home'})

            })
            .catch(err => {
                alert(err.message)
            })
        
    }
  </script>
  