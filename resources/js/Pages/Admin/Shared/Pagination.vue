<script setup>
import { Link } from '@inertiajs/vue3';
defineProps({ links: Array,count:Number })
</script>

<template>
      <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4"
                        aria-label="Table navigation">
                        <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                            Showing
                            <span class="font-semibold text-gray-900 dark:text-white">1-10</span>
                            of
                            <span class="font-semibold text-gray-900 dark:text-white">{{count}}</span>
                        </span>
    <ul class="inline-flex items-stretch -space-x-px">
        <li v-for="link in links">
            <Link v-if="link.url" :href="link.url" v-html="link.label" :class="{'font-bold':link.active}"
                class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
            </Link>
            <Link v-else v-html="link.label" 
                class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
            </Link>
        </li>
    </ul>
</nav>
</template>