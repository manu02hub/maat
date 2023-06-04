<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import EditEntidad from '@/Components/Private/Entidad/EditEntidad.vue';
</script>
<template>
    <Head title="info Entidad" />
    <PrivateLayout>
        <EditEntidad />
    </PrivateLayout>
</template>
