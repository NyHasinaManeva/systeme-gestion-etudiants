<script setup>
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap'
import Pagination from '@/Components/Pagination.vue';
import { Link, useForm } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import axios from 'axios';

const props =defineProps({
    students: {
        type: Object,
        required: true
    }  
});
const formdelete= useForm({})
const deleteStudent=(student_id)=>{
    console.log(student_id)
    console.log(formdelete)
    if (confirm("Are you sure you want to delete this student?")) {
        formdelete.delete(route("students.destroy",student_id))
    }
}
</script>
<template>
    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
               Student List
            </h2>
        </template>
        <div class="container mt-4">
            <!-- Header Section -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1>Liste des Étudiants</h1>
                <Link :href="route('students.create')" class="btn btn-primary">
                    Ajouter un étudiant
                </Link>
            </div>

            <!-- Table Section -->
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Class</th>
                                <th>Section</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="student in students.data" :key="student.id">
                                <td>{{ student.id }}</td>
                                <td>{{ student.name }}</td>
                                <td>{{ student.email }}</td>
                                <td>{{ student.class.name }}</td>
                                <td>{{ student.section.name }}</td>
                                <td>{{ student.created_at }}</td>
                                <td>
                                    <div class="btn-group">
                                        <Link 
                                           :href="route('students.edit',student.id)"
                                            class="btn btn-sm btn-warning me-2"
                                        >
                                            Modifier
                                        </Link>
                                        <button 
                                            @click="deleteStudent(student.id)"
                                            class="btn btn-sm btn-danger"
                                        >
                                            Supprimer
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <Pagination :data="students"/>
            </div>
        </div>
    </AuthenticatedLayout>
</template>