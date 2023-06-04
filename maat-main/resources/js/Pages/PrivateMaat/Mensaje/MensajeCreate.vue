<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import CreateMensajes from '@/Components/Private/Mensajes/CreateMensajes.vue';
</script>
<template>
    <Head title="info Mensajes" />
    <PrivateLayout>
        <CreateMensajes />
    </PrivateLayout>
</template>
