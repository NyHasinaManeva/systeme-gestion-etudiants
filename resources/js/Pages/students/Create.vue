<script setup>
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { ref, watch } from 'vue';
import axios from 'axios';
import InputError from '@/Components/InputError.vue';

defineProps({
    classes : {
        type : Object,
        required:true
    }
})

const sections = ref({})

const form = useForm({
    'name':"",
    'email':"",
    'class_id': "",
    'section_id': "" 
})

watch(()=>form.class_id,
    (newValue)=>{
        getSections(newValue)
    })

const getSections = (class_id) =>{
    axios.get('/api/sections?class_id='+class_id)
    .then((response)=>{
        sections.value=(response.data)
        console.log(sections)
    })
}

</script>

<template>
    <Head title="Create Student" />
    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Create Student
            </h2>
        </template>
    <div class="container mt-5">
        <h2>Create Student</h2>
        <form >
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" v-model="form.name" required>
                <InputError :message="form.errors.name"class="mt-2"/>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input autocomplete="email" type="email" class="form-control" id="email" v-model="form.email" required>
                <InputError :message="form.errors.email"class="mt-2"/>
            </div>
            <div class="mb-3">
                <label for="class_id" class="form-label">Class</label>
                <select 
                    class="mt-1 block w-full bg-white border border-gray-300 rounded-md
                    focus:ring-indigo-500
                    focus:border-indigo-500 sm:text-sm " 
                    id="class_id"  
                    v-model="form.class_id" 
                    required>
                    <option>Select a class</option>
                    <option v-for="item in classes.data" :key="item.id" :value="item.id">{{ item.name }}</option>
                </select>
                <InputError :message="form.errors.class_id"class="mt-2"/>
            </div>
            <div class="mb-3">
                <label for="section_id" class="form-label">Section</label>
                <select 
                    class="mt-1 block w-full bg-white border border-gray-300 rounded-md
                    focus:ring-indigo-500
                    focus:border-indigo-500 sm:text-sm " 
                    id="class_id"  
                    v-model="form.section_id" 
                    required>
                    <option v-for="section in sections.data" :value="section.id" :key="section.id">{{ section.name }}</option>
                </select>
                <InputError :message="form.errors.section_id"class="mt-2"/>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    </AuthenticatedLayout>
</template>


<style scoped>
/* Add any custom styles here */
</style>