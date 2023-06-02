<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import IndexTransacciones from '@/Components/Private/Transacciones/IndexTransacciones.vue';
</script>
<template>
    <Head title="info Usuario" />
    <PrivateLayout>
        <IndexTransacciones />
    </PrivateLayout>
</template>
