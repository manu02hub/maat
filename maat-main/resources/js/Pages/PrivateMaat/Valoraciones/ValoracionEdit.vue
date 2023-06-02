<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import EditValoracion from '@/Components/Private/Valoraciones/EditValoracion.vue';
</script>
<template>
    <Head title="info Usuario" />
    <PrivateLayout>
        <EditValoracion />
    </PrivateLayout>
</template>
