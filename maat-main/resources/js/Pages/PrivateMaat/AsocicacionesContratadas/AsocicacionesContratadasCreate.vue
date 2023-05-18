<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import CreateAsociaciones from '@/Components/Private/AsociacionesContratadas/CreateAsociaciones.vue';
</script>
<template>
    <Head title="info Usuario" />
    <PrivateLayout>
        <CreateAsociaciones />
    </PrivateLayout>
</template>
