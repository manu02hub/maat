<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import CrearNoticiaComponent from '@/Components/carlosComponents/CrearNoticiaComponent.vue'
</script>
<template>
    <Head title="Añadir una noticia nueva" />
    <PrivateLayout>
        <CrearNoticiaComponent/>
    </PrivateLayout>
</template>
