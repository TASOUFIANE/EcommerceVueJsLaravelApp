<script setup>
import NavBar from './NavBar.vue'
import TopBar from './TopBar.vue'

</script>

<template>
     <div class="antialiased bg-gray-50 dark:bg-gray-900">
        <NavBar></NavBar>
        <TopBar></TopBar>
        <main class="p-4 md:ml-64 h-auto pt-20">
            <slot></slot>
        </main>


     </div>
</template>