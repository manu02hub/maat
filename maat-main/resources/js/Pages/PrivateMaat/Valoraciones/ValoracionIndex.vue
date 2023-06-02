<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import IndexValoracion from '@/Components/Private/Valoraciones/IndexValoracion.vue';
</script>
<template>
    <Head title="info Usuario" />
    <PrivateLayout>
        <IndexValoracion />
    </PrivateLayout>
</template>
