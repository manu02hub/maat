<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import EditEmpresa from '@/Components/Private/Empresa/EditEmpresa.vue';
</script>
<template>
    <Head title="info Usuario" />
    <PrivateLayout>
        <EditEmpresa />
    </PrivateLayout>
</template>
