<script setup>
import { router, usePage } from '@inertiajs/vue3';

 const props = defineProps({
        data : {
            type : Object,
            required : true
        }
    })
const updatePageNumber = (link) =>{
    let pageNumber = link.url.split("=")[1]
    router.visit('students?page='+ pageNumber,{
        preserveScroll:true
    })
}
</script>
<template>
    <div class="w-full mx-auto py-2">
        <div class="max-w-none mx-auto">
            <div class="bg-white overflow-hidden shadow sm:rounded-lg ">
                <div class="bg-white px-4 py-2 flex items-center justify-between border-t border-gray-200 sm:px-6">
                    <div class="flex-1 flex justify-between">
                        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                            <div>
                                <p class="text-sm text-gray-700">Showing
                                    <span class="font-medium">{{ data.meta.from }}</span>
                                    to
                                    <span class="font-medium"> {{ data.meta.to }} </span>
                                    of
                                    <span class="font-medium"> {{ data.meta.total }} </span>
                                    results
                                </p>
                            </div>
                            <div>
                                <nav class="relative z-0 inline-flex rounded-md shadow-sm-space-x-px" aria-label="Pagination">
                                    <button 
                                     @click.prevent="updatePageNumber(link)"
                                     v-for="(link,index) in data.meta.links"
                                     :disabled="link.active || !link.url"
                                     :key="index"
                                     class="relative inline-flex items-center px-4 py-2 border text-sm font-medium"
                                     :class="{'z-10 bg-indigo-50 border-indigo-500 text-indigo-600':link.active,
                                        'bg-white border-gray-300 text-gray-500 hover:bg-gray-50':false
                                    }">
                                        <span v-html="link.label"></span>
                                    </button>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>