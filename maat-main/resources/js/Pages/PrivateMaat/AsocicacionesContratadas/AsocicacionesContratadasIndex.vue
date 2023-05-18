<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import IndexAsociaciones from '@/Components/Private/AsociacionesContratadas/IndexAsociaciones.vue';
</script>
<template>
    <Head title="info Usuario" />
    <PrivateLayout>
        <IndexAsociaciones />
    </PrivateLayout>
</template>
