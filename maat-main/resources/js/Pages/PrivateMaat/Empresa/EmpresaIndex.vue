<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import IndexEmpresa from '@/Components/Private/Empresa/IndexEmpresa.vue';
</script>
<template>
    <Head title="info Usuario" />
    <PrivateLayout>
        <IndexEmpresa />
    </PrivateLayout>
</template>
