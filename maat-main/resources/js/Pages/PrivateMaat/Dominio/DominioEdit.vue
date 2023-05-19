<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import EditDominio from '@/Components/Private/Dominio/EditDominio.vue';
</script>
<template>
    <Head title="info Usuario" />
    <PrivateLayout>
        <EditDominio />
    </PrivateLayout>
</template>
