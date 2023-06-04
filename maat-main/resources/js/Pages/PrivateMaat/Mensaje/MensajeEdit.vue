<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import EditMensajes from '@/Components/Private/Mensajes/EditMensajes.vue';
</script>
<template>
    <Head title="info Mensajes" />
    <PrivateLayout>
        <EditMensajes />
    </PrivateLayout>
</template>
