<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import EditComentario from '@/Components/Private/Comentario/EditComentario.vue';
</script>
<template>
    <Head title="info Usuario" />
    <PrivateLayout>
        <EditComentario />
    </PrivateLayout>
</template>
