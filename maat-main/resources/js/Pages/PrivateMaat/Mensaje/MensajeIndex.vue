<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import IndexMensajes from '@/Components/Private/Mensajes/IndexMensajes.vue';
</script>
<template>
    <Head title="info Mensajes" />
    <PrivateLayout>
        <IndexMensajes />
    </PrivateLayout>
</template>
