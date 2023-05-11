<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import listadoNoticias from '@/Components/carlosComponents/listadoNoticias.vue'
</script>
<template>
    <Head title="Noticias" />

    <PrivateLayout>
        <listadoNoticias />
    </PrivateLayout>
</template>
