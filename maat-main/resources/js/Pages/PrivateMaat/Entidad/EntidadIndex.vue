<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import IndexEntidad from '@/Components/Private/Entidad/IndexEntidad.vue';
</script>
<template>
    <Head title="info Entidad" />
    <PrivateLayout>
        <IndexEntidad />
    </PrivateLayout>
</template>
