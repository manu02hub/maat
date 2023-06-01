<script setup>
import { Head } from '@inertiajs/vue3';
import PrivateLayout from '@/Layouts/PrivateLayout.vue';
import IndexComentario from '@/Components/Private/Comentario/IndexComentario.vue';
</script>
<template>
    <Head title="info Usuario" />
    <PrivateLayout>
        <IndexComentario />
    </PrivateLayout>
</template>
