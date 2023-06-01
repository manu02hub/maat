<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import CreateDominio from '@/Components/Private/Dominio/CreateDominio.vue';
</script>
<template>
    <Head title="info Usuario" />
    <PrivateLayout>
        <CreateDominio />
    </PrivateLayout>
</template>
