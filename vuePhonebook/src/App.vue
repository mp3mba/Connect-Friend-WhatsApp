<script setup>
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
   <div class="min-h-screen bg-gradient-to-br from-cyan-900 to-green-900 text-center antialiased flex justify-center items-start">
    <notifications position="center" />
    <RouterView />
  </div>
</template>

