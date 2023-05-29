<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import IndexRol from '@/Components/Private/Rol/IndexRol.vue';
</script>
<template>
    <Head title="info Usuario" />
    <PrivateLayout>
        <IndexRol />
    </PrivateLayout>
</template>
