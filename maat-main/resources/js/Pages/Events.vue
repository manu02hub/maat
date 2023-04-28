<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Events" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Eventos</h2>
        </template>



    </AuthenticatedLayout>

</template>

<style scoped>
@import url('./../../css/bootstrap.css');
@import url('./../../css/app.css');
</style>

