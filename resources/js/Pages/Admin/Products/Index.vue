<script setup>
import { onMounted } from 'vue'
import { Link } from '@inertiajs/vue3'
import { initFlowbite } from 'flowbite'
import Master from '../Shared/Master.vue'
import Pagination from '../Shared/Pagination.vue'
import ProductList from './ProductList.vue'
import Breadcrumb from '../Shared/Breadcrumb.vue'
// initialize components based on data attribute selectors
onMounted(() => {
    initFlowbite();
})
defineProps({ 
    products: Object,
    count:Number
})
</script>
<template>
    <Master>
        <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
            <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
                <Breadcrumb>
                    <li>
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 9 4-4-4-4" />
                            </svg>

                            <Link href="/admin/product"
                                class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">
                                Products
                            </Link>
                        </div>
                    </li>
                </Breadcrumb>
                <!-- Start coding here -->
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">                  
                    <ProductList :products = products></ProductList>
                 
                    <Pagination :links="products.links" :count="count"></Pagination>
                </div>
            </div>
        </section>
    </Master>
</template>
