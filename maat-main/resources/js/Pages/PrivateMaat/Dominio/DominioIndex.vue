<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import IndexDominio from '@/Components/Private/Dominio/IndexDominio.vue';
</script>
<template>
    <Head title="info Usuario" />
    <PrivateLayout>
        <IndexDominio />
    </PrivateLayout>
</template>
