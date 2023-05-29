<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import CreateRol from '@/Components/Private/Rol/CreateRol.vue';
</script>
<template>
    <Head title="info Usuario" />
    <PrivateLayout>
        <CreateRol />
    </PrivateLayout>
</template>
