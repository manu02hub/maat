<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import CreateEntidad from '@/Components/Private/Entidad/CreateEntidad.vue';
</script>
<template>
    <Head title="info Entidad" />
    <PrivateLayout>
        <CreateEntidad />
    </PrivateLayout>
</template>
