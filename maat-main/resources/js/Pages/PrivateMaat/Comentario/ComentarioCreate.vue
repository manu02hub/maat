<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import CreateComentario from '@/Components/Private/Comentario/CreateComentario.vue';
</script>
<template>
    <Head title="info Usuario" />
    <PrivateLayout>
        <CreateComentario />
    </PrivateLayout>
</template>
