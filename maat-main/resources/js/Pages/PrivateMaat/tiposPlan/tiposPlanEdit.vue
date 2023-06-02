<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import EdittiposPlan from '@/Components/Private/tiposPlan/EdittiposPlan.vue';
</script>
<template>
    <Head title="info Usuario" />
    <PrivateLayout>
        <EdittiposPlan />
    </PrivateLayout>
</template>
