<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import EditTransacciones from '@/Components/Private/Transacciones/EditTransacciones.vue';
</script>
<template>
    <Head title="info Usuario" />
    <PrivateLayout>
        <EditTransacciones />
    </PrivateLayout>
</template>
