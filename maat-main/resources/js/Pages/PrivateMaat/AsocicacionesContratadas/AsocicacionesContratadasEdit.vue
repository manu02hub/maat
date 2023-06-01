<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import EditAsociaciones from '@/Components/Private/AsociacionesContratadas/EditAsociaciones.vue';
</script>
<template>
    <Head title="info Usuario" />
    <PrivateLayout>
        <EditAsociaciones />
    </PrivateLayout>
</template>
