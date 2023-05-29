<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import EditRol from '@/Components/Private/Rol/EditRol.vue';
</script>
<template>
    <Head title="info Usuario" />
    <PrivateLayout>
        <EditRol />
    </PrivateLayout>
</template>
