<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import CreateEmpresa from '@/Components/Private/Empresa/CreateEmpresa.vue';
</script>
<template>
    <Head title="info Usuario" />
    <PrivateLayout>
        <CreateEmpresa />
    </PrivateLayout>
</template>
