<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import CreateTransacciones from '@/Components/Private/Transacciones/CreateTransacciones.vue';
</script>
<template>
    <Head title="info Usuario" />
    <PrivateLayout>
        <CreateTransacciones />
    </PrivateLayout>
</template>
