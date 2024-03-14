<template>
    <div class="md:w-3/5 xs:w-4/5 mx-auto border-2 border-green-600 rounded-xl p-8 mt-10">
        <div class="flex justify-between">
            <h2 class="text-2xl font-bold mb-4">Add Phone Number</h2>
            <RouterLink :to="{name: 'home'}" class="bg-green-600 flex justify-center items-center p-3 xs:py-6 sm:py-4 h-6 rounded-xl text-white font-black">
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
        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          Add Phone Number
        </button>
      </form>
    </div>
  </template>
  
  <script setup>
  import {ref} from 'vue'
  import { useRouter} from 'vue-router'
  import { vMaska } from 'maska'
  import axios from 'axios'

    let phone = ref() 
    let description = ref() 
    let router = useRouter()
  
    let submitForm = () => {
        axios.post("http://127.0.0.1:8000/api/insert", {phone: phone.value, description:description.value})
            .then(res => {
                alert(res.data.message)
                router.push({name: 'home'})

            })
            .catch(err => {
                alert(err.message)
            })
        
    }
  </script>
  